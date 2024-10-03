<?php
/* @var $this CaPlanAuditoriaController */
/* @var $model CaPlanAuditoria */
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
		<?php echo $form->label($model,'area'); ?>
		<?php echo $form->textField($model,'area',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_plan'); ?>
		<?php echo $form->textField($model,'fecha_plan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'objetivo_plan'); ?>
		<?php echo $form->textField($model,'objetivo_plan',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alcance'); ?>
		<?php echo $form->textField($model,'alcance',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	
	<div class="row">
		<?php echo $form->label($model,'plan_elaborado_por'); ?>
		<?php echo $form->textField($model,'plan_elaborado_por',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'plan_revisado_por'); ?>
		<?php echo $form->textField($model,'plan_revisado_por',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'plan_aprobado_por'); ?>
		<?php echo $form->textField($model,'plan_aprobado_por',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'auditoria'); ?>
		<?php echo $form->textField($model,'auditoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lider_auditor'); ?>
		<?php echo $form->textField($model,'lider_auditor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'equipo_auditor'); ?>
		<?php echo $form->textField($model,'equipo_auditor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->