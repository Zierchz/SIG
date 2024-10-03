<?php
/* @var $this CaEquipoAuditorController */
/* @var $data CaEquipoAuditor */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auditor')); ?>:</b>
	<?php echo CHtml::encode($data->auditor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('funcion')); ?>:</b>
	<?php echo CHtml::encode($data->funcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plan_audit')); ?>:</b>
	<?php echo CHtml::encode($data->plan_audit); ?>
	<br />


</div>