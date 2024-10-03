<?php
/* @var $this UnidadOrganizativaBdutController */
/* @var $model UnidadOrganizativaBdut */
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
		<?php echo $form->label($model,'uo_nombre'); ?>
		<?php echo $form->textField($model,'uo_nombre',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'uo_siglas'); ?>
		<?php echo $form->textField($model,'uo_siglas',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'uo_categoria'); ?>
		<?php echo $form->textField($model,'uo_categoria',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sap_code'); ?>
		<?php echo $form->textField($model,'sap_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'direccion'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'provincia'); ?>
		<?php echo $form->textField($model,'provincia',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_area'); ?>
		<?php echo $form->textField($model,'tipo_area',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->