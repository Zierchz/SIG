<?php
/* @var $this UnidadOrganizativaBdutController */
/* @var $data UnidadOrganizativaBdut */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uo_nombre')); ?>:</b>
	<?php echo CHtml::encode($data->uo_nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uo_siglas')); ?>:</b>
	<?php echo CHtml::encode($data->uo_siglas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uo_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->uo_categoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sap_code')); ?>:</b>
	<?php echo CHtml::encode($data->sap_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('provincia')); ?>:</b>
	<?php echo CHtml::encode($data->provincia); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_area')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_area); ?>
	<br />

	*/ ?>

</div>