<?php
/* @var $this CaAuditoriaController */
/* @var $data CaAuditoria */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Anno')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unidad_aud')); ?>:</b>
	<?php echo CHtml::encode($data->unidad_aud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unidad_rec')); ?>:</b>
	<?php echo CHtml::encode($data->unidad_rec); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('programa')); ?>:</b>
	<?php echo CHtml::encode($data->programa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />

	



</div>