<?php
/* @var $this CaPlanAuditoriaController */
/* @var $data CaPlanAuditoria */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area')); ?>:</b>
	<?php echo CHtml::encode($data->area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_plan')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_plan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('objetivo_plan')); ?>:</b>
	<?php echo CHtml::encode($data->objetivo_plan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alcance')); ?>:</b>
	<?php echo CHtml::encode($data->alcance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plan_elaborado_por')); ?>:</b>
	<?php echo CHtml::encode($data->plan_elaborado_por); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('plan_revisado_por')); ?>:</b>
	<?php echo CHtml::encode($data->plan_revisado_por); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plan_aprobado_por')); ?>:</b>
	<?php echo CHtml::encode($data->plan_aprobado_por); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auditoria')); ?>:</b>
	<?php echo CHtml::encode($data->auditoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lider_auditor')); ?>:</b>
	<?php echo CHtml::encode($data->lider_auditor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('equipo_auditor')); ?>:</b>
	<?php echo CHtml::encode($data->equipo_auditor); ?>
	<br />

	*/ ?>

</div>