<?php
/* @var $this CaEvaluacionAuditorController */
/* @var $data CaEvaluacionAuditor */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_plan_ev')); ?>:</b>
	<?php echo CHtml::encode($data->id_plan_ev); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_evaluacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_evaluacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('evaluacion_final')); ?>:</b>
	<?php echo CHtml::encode($data->evaluacion_final); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aceptado')); ?>:</b>
	<?php echo CHtml::encode($data->aceptado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conforme')); ?>:</b>
	<?php echo CHtml::encode($data->conforme); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('auditor')); ?>:</b>
	<?php echo CHtml::encode($data->auditor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area')); ?>:</b>
	<?php echo CHtml::encode($data->area); ?>
	<br />

	*/ ?>

</div>