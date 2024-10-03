<?php
/* @var $this CaProgramaAuditoriaController */
/* @var $model CaProgramaAuditoria */
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
		<?php echo $form->label($model,'unidad_rectora'); ?>
		<?php echo $form->textField($model,'unidad_rectora',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unidad_a_auditar'); ?>
		<?php echo $form->textField($model,'unidad_a_auditar',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'anno'); ?>
		<?php echo $form->textField($model,'anno',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'objetivos_programa'); ?>
		<?php echo $form->textField($model,'objetivos_programa',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'riesgos_programa'); ?>
		<?php echo $form->textField($model,'riesgos_programa',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Enero'); ?>
		<?php echo $form->textField($model,'auditoria_enero',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Febrero'); ?>
		<?php echo $form->textField($model,'auditoria_febrero',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Marzo'); ?>
		<?php echo $form->textField($model,'auditoria_marzo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Abril'); ?>
		<?php echo $form->textField($model,'auditoria_abril',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Mayo'); ?>
		<?php echo $form->textField($model,'auditoria_mayo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Junio'); ?>
		<?php echo $form->textField($model,'auditoria_junio',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Julio'); ?>
		<?php echo $form->textField($model,'auditoria_julio',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Agosto'); ?>
		<?php echo $form->textField($model,'auditoria_agosto',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Septiembre'); ?>
		<?php echo $form->textField($model,'auditoria_septiembre',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Octubre'); ?>
		<?php echo $form->textField($model,'auditoria_octubre',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Noviembre'); ?>
		<?php echo $form->textField($model,'auditoria_noviembre',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Diciembre'); ?>
		<?php echo $form->textField($model,'auditoria_diciembre',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_unidad'); ?>
		<?php echo $form->textField($model,'id_unidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observaciones'); ?>
		<?php echo $form->textField($model,'observaciones'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->