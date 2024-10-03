<?php
/* @var $this CaEstructuraProcesoController */
/* @var $data CaEstructuraProceso */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_uo')); ?>:</b>
	<?php echo CHtml::encode($data->id_uo); ?>
	<br />


</div>