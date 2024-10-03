<?php
/* @var $this CaInformeAuditoriaController */
/* @var $model CaInformeAuditoria */
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
		<?php echo $form->label($model,'fecha_informe'); ?>
		<?php echo $form->textField($model,'fecha_informe'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'objetivo_auditoria'); ?>
		<?php echo $form->textField($model,'objetivo_auditoria',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alcance'); ?>
		<?php echo $form->textField($model,'alcance',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'representantes'); ?>
		<?php echo $form->textField($model,'representantes',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'representantes1'); ?>
		<?php echo $form->textField($model,'representantes1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rutas'); ?>
		<?php echo $form->textField($model,'rutas',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hallazgos'); ?>
		<?php echo $form->textField($model,'hallazgos',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'evaluacion'); ?>
		<?php echo $form->textField($model,'evaluacion',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'conclusiones'); ?>
		<?php echo $form->textField($model,'conclusiones',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'audit_id'); ?>
		<?php echo $form->textField($model,'audit_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->