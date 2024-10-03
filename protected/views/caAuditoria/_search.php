<?php
/* @var $this CaAuditoriaController */
/* @var $model CaAuditoria */
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
		<?php echo $form->label($model,'unidad_aud'); ?>
		<?php echo $form->textField($model,'unidad_aud',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unidad_rec'); ?>
		<?php echo $form->textField($model,'unidad_rec',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'programa'); ?>
		<?php echo $form->textField($model,'programa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Anno'); ?>
		<?php echo $form->textField($model,'Anno'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observaciones'); ?>
		<?php echo $form->textField($model,'observaciones',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->