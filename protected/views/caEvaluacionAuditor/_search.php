<?php
/* @var $this CaEvaluacionAuditorController */
/* @var $model CaEvaluacionAuditor */
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
		<?php echo $form->label($model,'id_plan_ev'); ?>
		<?php echo $form->textField($model,'id_plan_ev'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_evaluacion'); ?>
		<?php echo $form->textField($model,'fecha_evaluacion',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'evaluacion_final'); ?>
		<?php echo $form->textField($model,'evaluacion_final'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observaciones'); ?>
		<?php echo $form->textField($model,'observaciones',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'aceptado'); ?>
		<?php echo $form->textField($model,'aceptado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'conforme'); ?>
		<?php echo $form->textField($model,'conforme'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'auditor'); ?>
		<?php echo $form->textField($model,'auditor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'area'); ?>
		<?php echo $form->textField($model,'area',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->