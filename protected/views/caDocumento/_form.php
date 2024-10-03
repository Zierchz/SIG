<?php
/* @var $this CaDocumentoController */
/* @var $model CaDocumento */
/* @var $form CActiveForm */
if(isset($_GET['audit']))
			$audit=$_GET['audit'];
			if(isset($_GET['audit_nombre']))
			$audit_nombre=$_GET['audit_nombre'];
			if(isset($_GET['url'])){
				$url=$_GET['url'];
	$model->url=$url;
			}	


?>

<div class="row" style="text-align: left">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'documentos-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
))); ?>
<?php
$this->p2_MyInput(6, $form, $model,'url','file',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));

// $this->myInput(6, $form, $model,'auditor','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
?>	
<!-- <div class="col-lg-6">
		<div class="form-group">
			<?php echo $form->labelEx($model,'auditor'); ?>
			<?php //echo $form->textField($model,'seccion',array('size'=>60,'maxlength'=>250,'class'=>'form-control')); ?>
			<?php echo $form->dropDownList($model, 'auditor', CHtml::listData(trabajador::model()->findAll(), 'codigo', 'nombre_apellidos'), array('class' => 'form-control')); ?>


			<?php echo $form->error($model,'auditor'); ?>
		</div>
	</div> -->
	<?php	
// $this->myInput(6, $form, $model,'fecha_creacion','date',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
// $this->myInput(6, $form, $model,'autor','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
// $this->myInput(6, $form, $model,'unidad_o','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
// $this->myInput(6, $form, $model,'observaciones','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
// $this->myInput(6, $form, $model,'categoria','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$categoria="Curso";
$this->p2_MyInput(6, $form, $model, 'categoria', 'select', array('class' => 'form-control','prompt' => 'Seleccione la categoría'), array(
	"Curso" => "Curso",
	"Certificaciones" => "Certificaciones",
	"Evaluaciones" => "Evaluaciones",
	"Otros" => "Otros",
	
));


?>
	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>
</div>
</div>
</div>
</div>
</div>
<script src="js/jquery-1.10.2.js"></script>