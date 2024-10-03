<style>
    .bold {
        font-weight: bold;
    }
	
</style>
<?php

/* @var $this CaProgramaAuditoriaController */
/* @var $model CaProgramaAuditoria */
/* @var $form CActiveForm */



 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ca-programa-auditoria-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' =>['class'=>'row g-3'],
)); ?>
<?php
$this->myFlashMessage(); 



$disabled=false;
if(Yii::app()->user->areaid!=7){
	$model->unidad_rectora = Yii::app()->user->areaid;
    $disabled=true;
}
if(isset($_GET['uni'])){
    $uni=$_GET['uni'];
    $model->unidad_rectora=$uni;
}
if(isset($_GET['uni2'])){
    $uni2=$_GET['uni2'];
    $model->unidad_a_auditar=$uni2;
}
if(isset($_GET['riesgo'])){
    $riesgo=$_GET['riesgo'];
    if($riesgo!=''){
    $model->riesgos_programa=$riesgo;}
}
if(isset($_GET['obj'])){
    $obj=$_GET['obj'];
    if($obj!=''){
    $model->objetivos_programa=$obj;}
}
if(isset($_GET['anno'])){
    $anno=$_GET['anno'];
    if($anno!=''){
    $model->anno=$anno;}
}
$hide=false;
$p=null;

if($model->unidad_rectora!=null&&$model->anno!=null&&$model->getIsNewRecord()){
$p = CaProgramaAuditoria::model()->findByAttributes(array('unidad_rectora' => $uni, 'anno' => $anno));
if($p!=null){
    $model->aprobado_por=$p->aprobado_por;
    $model->riesgos_programa=$p->riesgos_programa;
    $model->objetivos_programa=$p->objetivos_programa;
    $hide=true;
}}

$months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
foreach ($months as $month) {
    if (isset($_GET[$month])) {
        $monthValue = $_GET[$month];
        if($monthValue!=''){
        $model->$month = $monthValue;}
    }
}

        if($model->getIsNewRecord()){
    ?><div class="col-md-2">
        <?php echo $form->labelEx($model,'Unidad rectora *'); ?>
        <?php echo $form->dropDownList($model, 'unidad_rectora', CHtml::listData(UnidadOrganizativa::model()->findAll(), 'id', 'siglas'), array('class' => 'form-control', 'prompt' => ' ', 'id' => 'unidad-rectora', 'disabled'=> $disabled)); ?>
        <?php echo $form->error($model,'unidad_rectora'); ?>
    </div>
    
    <?php
    
    Yii::app()->clientScript->registerScript('updateUnidadRectora', "
    $('#unidad-rectora').change(function() {
        var selectedValue = $(this).val();
        var riesgoValue = encodeURIComponent($('#CaProgramaAuditoria_riesgos_programa').val());
        var objetivosValue = encodeURIComponent($('#CaProgramaAuditoria_objetivos_programa').val());
        var anno = encodeURIComponent($('#CaProgramaAuditoria_anno').val());
        var newUrl = '" . CHtml::normalizeUrl(array('CaProgramaAuditoria/create')) . "' + '&obj=' + objetivosValue + '&riesgo=' + riesgoValue + '&uni=' + selectedValue + '&anno=' + anno;

        // Add values for each month
        var monthFields = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        for (var i = 0; i < monthFields.length; i++) {
            var monthValue = encodeURIComponent($('#CaProgramaAuditoria_' + monthFields[i]).val());
            newUrl += '&' + monthFields[i] + '=' + monthValue;
        }

        window.location.href = newUrl;
    });
");
Yii::app()->clientScript->registerScript('updateAnno', "
    $('#anno').change(function() {
        var selectedValue = encodeURIComponent($('#unidad-rectora').val());
        var selectedValue2 = encodeURIComponent($('#CaProgramaAuditoria_unidad_a_auditar').val());
        var riesgoValue = encodeURIComponent($('#CaProgramaAuditoria_riesgos_programa').val());
        var objetivosValue = encodeURIComponent($('#CaProgramaAuditoria_objetivos_programa').val());
        var anno = $(this).val();
        var newUrl = '" . CHtml::normalizeUrl(array('CaProgramaAuditoria/create')) . "' + '&obj=' + objetivosValue + '&riesgo=' + riesgoValue + '&uni=' + selectedValue + '&uni2=' + selectedValue2 + '&anno=' + anno;

        // Add values for each month
        var monthFields = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        for (var i = 0; i < monthFields.length; i++) {
            var monthValue = encodeURIComponent($('#CaProgramaAuditoria_' + monthFields[i]).val());
            newUrl += '&' + monthFields[i] + '=' + monthValue;
        }

        window.location.href = newUrl;
    });
");

    // Agregar un campo oculto para enviar el valor de $model->unidad_rectora cuando $disabled es true
    if ($disabled) {
        echo $form->hiddenField($model, 'unidad_rectora');
    }
    Yii::app()->clientScript->registerScript('unidad_rectora_select2', "
    $('#unidad-rectora').select2({
        minimumInputLength: 1
    });
");
    ?>
        <div class="col-md-2">
            <?php echo $form->labelEx($model, 'Unidad Auditada *'); ?>
            <?php
            // Query to get all CaRelacionUnidad records where id_rectora equals $uo->id
            $criteria = new CDbCriteria;
            $criteria->compare('id_rectora', $model->unidad_rectora);
            $relationList = CaRelacionUnidad::model()->findAll($criteria);
    
            // Extract the id_auditada values into an array
            $idAuditadaValues = array();
            foreach ($relationList as $relation) {
                $idAuditadaValues[] = $relation->id_auditada;
            }
    
            // Use listData to create an array of UnidadOrganizativa objects that match the id_auditada values
            $unidadList = UnidadOrganizativa::model()->findAllByPk($idAuditadaValues);
            $unidadData = CHtml::listData($unidadList, 'id', 'siglas');
    
            echo $form->dropDownList($model, 'unidad_a_auditar', $unidadData, array('class' => 'form-control', 'prompt' => ' '));
            ?>
            <?php echo $form->error($model, 'unidad_a_auditar'); ?>
            </div>
    
    <?php	
}else{
    $hide=true;
    ?><div class="col-md-2">
    <?php echo $form->labelEx($model,'Unidad rectora *'); ?>
    <?php echo $form->dropDownList($model, 'unidad_rectora', CHtml::listData(UnidadOrganizativa::model()->findAll(), 'id', 'siglas'), array('class' => 'form-control', 'id' => 'unidad-rectora', 'disabled'=>true)); ?>
    <?php echo $form->error($model,'unidad_rectora'); ?>
</div>

<?php
?>
    <div class="col-md-2">
        <?php echo $form->labelEx($model, 'Unidad Auditada *'); ?>
        <?php
        // Query to get all CaRelacionUnidad records where id_rectora equals $uo->id
        $criteria = new CDbCriteria;
        $criteria->compare('id_rectora', $model->unidad_rectora);
        $relationList = CaRelacionUnidad::model()->findAll($criteria);

        // Extract the id_auditada values into an array
        $idAuditadaValues = array();
        foreach ($relationList as $relation) {
            $idAuditadaValues[] = $relation->id_auditada;
        }

        // Use listData to create an array of UnidadOrganizativa objects that match the id_auditada values
        $unidadList = UnidadOrganizativa::model()->findAllByPk($idAuditadaValues);
        $unidadData = CHtml::listData($unidadList, 'id', 'siglas');

        echo $form->dropDownList($model, 'unidad_a_auditar', $unidadData, array('class' => 'form-control', 'disabled'=>true));
        ?>
        <?php echo $form->error($model, 'unidad_a_auditar'); ?>
        </div>
        <?php

	}
$anno = date("Y");

    $this->p2_MyInput(1, $form, $model, 'anno', 'select', array('class' => 'form-control', 'id'=>'anno', 'prompt'=>''), array(
        $anno - 2 => $anno - 2,
        $anno - 1 => $anno - 1,
        $anno => $anno,
	    $anno + 1 => $anno + 1,
        $anno + 2 => $anno + 2,
       
	));
    Yii::app()->clientScript->registerScript('aprobado_por_select2', "
    $('#aprobado_por').select2({
        minimumInputLength: 3
    });
");
    $trabajadores = Trabajador::model()->findAll();
    $this->p2_MyInput(4, $form, $model, 'aprobado_por', 'select', array('class' => 'form-control','id'=>'aprobado_por','prompt' => 'Seleccione el trabajador:', 'disabled' => $hide), CHtml::listData($trabajadores, 'nombre_apellidos', 'nombre_apellidos'));
   
	$this->p2_MyInput(3, $form, $model,'observaciones','textArea',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control'));	

    $this->p2_MyInput(6, $form, $model,'objetivos_programa','textArea',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control', 'disabled' => $hide));
	
    $this->p2_MyInput(6, $form, $model,'riesgos_programa','textArea',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control', 'disabled' => $hide));	


echo '<h6 style="color:white">a</h6>';

$nulo="";
	$labels=array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
echo '<div class="row col-md-12 bold d-flex  justify-content-between align-items-center " style="margin:1px;"';	
echo '<br><br><H2 class="col-md-12 " style="text-align: center;border-radius:30px;font-size:x-large;background-color:white; color: #454545;font-family:Bahnschrift">CALENDARIO  DE  AUDITORÍAS</H2> 
';
	for($i=0;$i<count($labels);$i++){	
	echo '<div class="row col-lg-3 input" style="text-align:center;border-top:12px #353535 double;border-left:3px lightgrey solid;
    border-right:3px lightgrey solid;margin-bottom:10px;border-bottom-left-radius:20px;border-bottom-right-radius:20px;
    height:240px;">';
    $this->p2_MyInput(12, $form, $model, $labels[$i], 'select', array('class' => 'form-control','prompt'=>''), CHtml::listData(CaTipoAuditoria::model()->findAll(), 'siglas', 'nombre'));

echo '<br></br><br></br>';

$this->p2_MyInput(12, $form, $model,"f_$labels[$i]",'date',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
$this->p2_MyInput(12, $form, $model,"fin_$labels[$i]",'date',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
echo '<h4 style="color:white">.</h4>';
echo '</div>';
}
echo '</div>';

// $this->myInput(6, $form, $model,'id_unidad','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
?>
	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>


