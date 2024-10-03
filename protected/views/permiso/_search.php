<?php
/* @var $this PermisoController */
/* @var $model Permiso */
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
		<?php echo $form->label($model,'permiso'); ?>
		<?php echo $form->textField($model,'permiso',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'icono'); ?>
		<?php echo $form->textField($model,'icono',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'menu'); ?>
		<?php echo $form->textField($model,'menu',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modelo'); ?>
		<?php echo $form->textField($model,'modelo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'padre'); ?>
		<?php echo $form->textField($model,'padre',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->