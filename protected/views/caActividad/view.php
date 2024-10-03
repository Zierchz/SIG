<?php

/* @var $this CaActividadController */
/* @var $model CaActividad */
$this->p2_PageTitle2("columns-gap", "Actividades","Datos","Auditorías / Plan de Auditoría / Gestión de Actividades");

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'id',
		'fecha',
		'actividad',
		'objetivo',
		// 'plan',
		array('name'=>'hora',
	'value'=>"$model->hora $model->dia"),
	),
)); ?>
</div>
</div>
</div>
</div>
</div>