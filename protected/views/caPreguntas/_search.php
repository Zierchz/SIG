<?php
/* @var $this CaPreguntasController */
/* @var $model CaPreguntas */
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
		<?php echo $form->label($model,'pregunta'); ?>
		<?php echo $form->textField($model,'pregunta',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'referencia'); ?>
		<?php echo $form->textField($model,'referencia',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'conformidad'); ?>
		<?php echo $form->textField($model,'conformidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observaciones'); ?>
		<?php echo $form->textField($model,'observaciones',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lista_id'); ?>
		<?php echo $form->textField($model,'lista_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->