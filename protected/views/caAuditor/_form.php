<?php 

// $this->PPcalidad();
/* @var $this CaAuditorController */
/* @var $model CaAuditor */
/* @var $form CActiveForm */

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'documentos-form',
    'enableAjaxValidation' => false,
    'htmlOptions' =>['class'=>'row g-3'],
)); 

if ($model->getIsNewRecord()) {

    $excludedNames = CaAuditor::model()->findAll('nombre_apellido IS NOT NULL');

    $criteria = new CDbCriteria();
    $criteria->addNotInCondition('nombre_apellidos', CHtml::listData($excludedNames, 'nombre_apellido', 'nombre_apellido'));
    $trabajadores = Trabajador::model()->findAll($criteria);

    $this->p2_MyInput(6, $form, $model, 'nombre', 'select', array('class' => 'form-control','id'=>'auditor_nombre','prompt' => 'Seleccione el trabajador:'), CHtml::listData($trabajadores, 'codigo', 'nombre_apellidos'));

   

    Yii::app()->clientScript->registerScript('nombre_select2', "
        $('#auditor_nombre').select2({
            minimumInputLength: 3
        });
    ");
} else {
        $nombreActual = $model->nombre_apellido;
        $this->p2_MyInput(6, $form, $model, 'nombre', 'text', array('class' => 'form-control','value'=>$nombreActual,'disabled'=>true));
}

Yii::app()->clientScript->registerScript('unidad_select2', "
    $('#auditor_unidad').select2({
        minimumInputLength: 1
    });
");


$this->myInput(6, $form, $model, 'unidad', 'select', array('class' => 'form-control', 'id' => 'auditor_unidad', 'prompt' => 'Seleccione la unidad:'), CHtml::listData(UnidadOrganizativa::model()->findAll(), 'id', 'siglas'));

$this->myInput(6, $form, $model, 'region', 'select', array('class' => 'form-control', 'id' => 'auditor_region', 'prompt' => 'Seleccione la región:'), array(
    "Occidente" => "Occidente",
    "Centro" => "Centro",
    "Oriente" => "Oriente",
));

$this->myInput(6, $form, $model, 'alcance', 'select', array('class' => 'form-control', 'id' => 'auditor_alcance', 'prompt' => 'Seleccione el alcance:'), array(
    "empresarial" => "Empresarial",
    "propio" => "Propio",
));
$this->myInput(6, $form, $model,'competencia','textArea',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control'));
	
$this->myInput(6, $form, $model,'observaciones','textArea',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control'));
	
if (!$model->getIsNewRecord()) {
    $this->myInput(6, $form, $model,'telf_movil','text',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control'));

    $this->myInput(6, $form, $model,'telf_fijo','text',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control'));

}


$this->myButton($model);

$this->endWidget(); 

?>
