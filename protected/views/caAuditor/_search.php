<?php 
/* @var $this CaAuditorController */
/* @var $model CaAuditor */
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
		<?php echo $form->label($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unidad'); ?>
		<?php echo $form->textField($model,'unidad',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'correo'); ?>
		<?php echo $form->textField($model,'correo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cargo'); ?>
		<?php echo $form->textField($model,'cargo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'area'); ?>
		<?php echo $form->textField($model,'area',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'region'); ?>
		<?php echo $form->textField($model,'region',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telf_movil'); ?>
		<?php echo $form->textField($model,'telf_movil'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telf_fijo'); ?>
		<?php echo $form->textField($model,'telf_fijo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'competencia'); ?>
		<?php echo $form->textField($model,'competencia',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observaciones'); ?>
		<?php echo $form->textField($model,'observaciones',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'expediente'); ?>
		<?php echo $form->textField($model,'expediente',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'disponibilidad'); ?>
		<?php echo $form->textField($model,'disponibilidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'equipo_de_auditores'); ?>
		<?php echo $form->textField($model,'equipo_de_auditores'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'es_jefe'); ?>
		<?php echo $form->textField($model,'es_jefe'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'evaluacion'); ?>
		<?php echo $form->textField($model,'evaluacion',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->label($model,'es_papelera'); ?>
		<?php echo $form->textField($model,'es_papelera'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->label($model,'alcance'); ?>
		<?php echo $form->textField($model,'alcance',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->