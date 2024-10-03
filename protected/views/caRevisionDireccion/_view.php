<?php
/* @var $this CaRevisionDireccionController */
/* @var $data CaRevisionDireccion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_emision')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_emision); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proceso')); ?>:</b>
	<?php echo CHtml::encode($data->proceso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_aprobado')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_aprobado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('revision_elaborado_por')); ?>:</b>
	<?php echo CHtml::encode($data->revision_elaborado_por); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('revision_aprobado_por')); ?>:</b>
	<?php echo CHtml::encode($data->revision_aprobado_por); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_elaborado')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_elaborado); ?>
	<br />

	*/ ?>

</div>