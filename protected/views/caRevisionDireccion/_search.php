<?php
/* @var $this CaRevisionDireccionController */
/* @var $model CaRevisionDireccion */
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
		<?php echo $form->label($model,'fecha_emision'); ?>
		<?php echo $form->textField($model,'fecha_emision'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'proceso'); ?>
		<?php echo $form->textField($model,'proceso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_aprobado'); ?>
		<?php echo $form->textField($model,'fecha_aprobado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'revision_elaborado_por'); ?>
		<?php echo $form->textField($model,'revision_elaborado_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'revision_aprobado_por'); ?>
		<?php echo $form->textField($model,'revision_aprobado_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observaciones'); ?>
		<?php echo $form->textField($model,'observaciones',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_elaborado'); ?>
		<?php echo $form->textField($model,'fecha_elaborado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->