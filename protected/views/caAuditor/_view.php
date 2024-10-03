<?php
/* @var $this CaAuditorController */
/* @var $data CaAuditor */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unidad')); ?>:</b>
	<?php echo CHtml::encode($data->unidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correo')); ?>:</b>
	<?php echo CHtml::encode($data->correo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cargo')); ?>:</b>
	<?php echo CHtml::encode($data->cargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area')); ?>:</b>
	<?php echo CHtml::encode($data->area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('region')); ?>:</b>
	<?php echo CHtml::encode($data->region); ?>
	<br />

	
	<?php 
	<b><?php echo CHtml::encode($data->getAttributeLabel('telf_movil')); ?>:</b>
	<?php echo CHtml::encode($data->telf_movil); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telf_fijo')); ?>:</b>
	<?php echo CHtml::encode($data->telf_fijo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('competencia')); ?>:</b>
	<?php echo CHtml::encode($data->competencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expediente')); ?>:</b>
	<?php echo CHtml::encode($data->expediente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disponibilidad')); ?>:</b>
	<?php echo CHtml::encode($data->disponibilidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('equipo_de_auditores')); ?>:</b>
	<?php echo CHtml::encode($data->equipo_de_auditores); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('es_jefe')); ?>:</b>
	<?php echo CHtml::encode($data->es_jefe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('evaluacion')); ?>:</b>
	<?php echo CHtml::encode($data->evaluacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alcance')); ?>:</b>
	<?php echo CHtml::encode($data->alcance); ?>
	<br />
   
	
/*
	<b><?php echo CHtml::encode($data->getAttributeLabel('es_papelera')); ?>:</b>
	<?php echo CHtml::encode($data->es_papelera); ?>
	<br />

	*/ ?>

</div>