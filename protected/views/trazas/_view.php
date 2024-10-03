<?php
/* @var $this TrazasController */
/* @var $data Trazas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora')); ?>:</b>
	<?php echo CHtml::encode($data->hora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('evento')); ?>:</b>
	<?php echo CHtml::encode($data->evento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resumen')); ?>:</b>
	<?php echo CHtml::encode($data->resumen); ?>
	<br />


</div>