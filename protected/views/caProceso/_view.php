<?php
/* @var $this CaProcesoController */
/* @var $data CaProceso */

?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_programada')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_programada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_efectuada')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_efectuada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('responsable')); ?>:</b>
	<?php echo CHtml::encode($data->responsable); ?>
	<br />


</div>