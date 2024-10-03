<?php
/* @var $this CaListaVerificacionController */
/* @var $model CaListaVerificacion */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>



	<div class="row">
		<?php echo $form->label($model,'id_plan_lista'); ?>
		<?php echo $form->textField($model,'id_plan_lista'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lider'); ?>
		<?php echo $form->textField($model,'lider'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'auditoria_id'); ?>
		<?php echo $form->textField($model,'auditoria_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'area_audit'); ?>
		<?php echo $form->textField($model,'area_audit',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->