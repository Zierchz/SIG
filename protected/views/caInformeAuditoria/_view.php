<?php
/* @var $this CaInformeAuditoriaController */
/* @var $data CaInformeAuditoria */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_informe')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_informe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('objetivo_auditoria')); ?>:</b>
	<?php echo CHtml::encode($data->objetivo_auditoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alcance')); ?>:</b>
	<?php echo CHtml::encode($data->alcance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('representantes')); ?>:</b>
	<?php echo CHtml::encode($data->representantes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('representantes1')); ?>:</b>
	<?php echo CHtml::encode($data->representantes1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rutas')); ?>:</b>
	<?php echo CHtml::encode($data->rutas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hallazgos')); ?>:</b>
	<?php echo CHtml::encode($data->hallazgos); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('evaluacion')); ?>:</b>
	<?php echo CHtml::encode($data->evaluacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conclusiones')); ?>:</b>
	<?php echo CHtml::encode($data->conclusiones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('audit_id')); ?>:</b>
	<?php echo CHtml::encode($data->audit_id); ?>
	<br />

	*/ ?>

</div>