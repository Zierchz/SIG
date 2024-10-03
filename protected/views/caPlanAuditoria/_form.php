<?php
/* @var $this CaPlanAuditoriaController */
/* @var $model CaPlanAuditoria */
/* @var $form CActiveForm */




 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ca-plan-auditoria-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' =>['class'=>'row g-3'],

)); 

// $this->myInput(6, $form, $model,'area','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
// $this->myInput(6, $form, $model,'fecha_plan','date',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->p2_MyInput(6, $form, $model,'objetivo_plan','textArea',array('size'=>50,'maxlength'=>5000,'rows'=>1, 'class'=>'form-control'));
	
$this->p2_MyInput(6, $form, $model,'alcance','textArea',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control'));
	
	
// $this->myInput(6, $form, $model,'plan_elaborado_por','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->p2_MyInput(6, $form, $model,'plan_revisado_por', 'select', array('class' => 'filtro form-control', 'prompt' => 'Seleccione:'), CHtml::listData(Usuario::model()->findAll('nombre!="Administrador"'), 'nombre', 'nombre'));
	
$this->p2_MyInput(6, $form, $model,'plan_aprobado_por', 'select', array('class' => 'filtro form-control', 'prompt' => 'Seleccione:'), CHtml::listData(Usuario::model()->findAll('nombre!="Administrador"'), 'nombre', 'nombre'));
	
// $this->myInput(6, $form, $model,'auditoria','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
$this->p2_MyInput(6, $form, $model,'periodo','textArea',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control'));

	
?>
	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>

    