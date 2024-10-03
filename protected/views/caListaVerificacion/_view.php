<?php
/* @var $this CaListaVerificacionController */
/* @var $data CaListaVerificacion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_plan_lista')); ?>:</b>
	<?php echo CHtml::encode($data->id_plan_lista); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lider')); ?>:</b>
	<?php echo CHtml::encode($data->lider); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auditoria_id')); ?>:</b>
	<?php echo CHtml::encode($data->auditoria_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area_audit')); ?>:</b>
	<?php echo CHtml::encode($data->area_audit); ?>
	<br />


</div>