<?php
/* @var $this CaProgramaAuditoriaController */
/* @var $data CaProgramaAuditoria */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unidad_rectora')); ?>:</b>
	<?php echo CHtml::encode($data->unidad_rectora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unidad_a_auditar')); ?>:</b>
	<?php echo CHtml::encode($data->unidad_a_auditar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('anno')); ?>:</b>
	<?php echo CHtml::encode($data->anno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('objetivos_programa')); ?>:</b>
	<?php echo CHtml::encode($data->objetivos_programa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('riesgos_programa')); ?>:</b>
	<?php echo CHtml::encode($data->riesgos_programa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auditoria_enero')); ?>:</b>
	<?php echo CHtml::encode($data->auditoria_enero); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('auditoria_febrero')); ?>:</b>
	<?php echo CHtml::encode($data->auditoria_febrero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auditoria_marzo')); ?>:</b>
	<?php echo CHtml::encode($data->auditoria_marzo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auditoria_abril')); ?>:</b>
	<?php echo CHtml::encode($data->auditoria_abril); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auditoria_mayo')); ?>:</b>
	<?php echo CHtml::encode($data->auditoria_mayo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auditoria_junio')); ?>:</b>
	<?php echo CHtml::encode($data->auditoria_junio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auditoria_julio')); ?>:</b>
	<?php echo CHtml::encode($data->auditoria_julio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auditoria_agosto')); ?>:</b>
	<?php echo CHtml::encode($data->auditoria_agosto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auditoria_septiembre')); ?>:</b>
	<?php echo CHtml::encode($data->auditoria_septiembre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auditoria_octubre')); ?>:</b>
	<?php echo CHtml::encode($data->auditoria_octubre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auditoria_noviembre')); ?>:</b>
	<?php echo CHtml::encode($data->auditoria_noviembre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auditoria_diciembre')); ?>:</b>
	<?php echo CHtml::encode($data->auditoria_diciembre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_unidad')); ?>:</b>
	<?php echo CHtml::encode($data->id_unidad); ?>
	<br />

	*/ ?>

</div>