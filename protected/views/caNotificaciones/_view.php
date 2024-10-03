<?php
/* @var $this CaNotificacionesController */
/* @var $data CaNotificaciones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('autor')); ?>:</b>
	<?php echo CHtml::encode($data->autor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receptor')); ?>:</b>
	<?php echo CHtml::encode($data->receptor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contenido')); ?>:</b>
	<?php echo CHtml::encode($data->contenido); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('evento')); ?>:</b>
	<?php echo CHtml::encode($data->evento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resumen')); ?>:</b>
	<?php echo CHtml::encode($data->resumen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora')); ?>:</b>
	<?php echo CHtml::encode($data->hora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('icono')); ?>:</b>
	<?php echo CHtml::encode($data->icono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	*/ ?>

</div>