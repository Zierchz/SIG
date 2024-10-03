<?php
/* @var $this CaCriteriosEvaluacionesController */
/* @var $model CaCriteriosEvaluaciones */
$this->p2_PageTitle("person-check-fill", "Criterios de Evaluaciones", "Detalles", "Gestión de Criterios de Evaluaciones");

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'id',
		'nombre',
		'descripcion',
		// 'usuario',
		'observaciones',
	),
)); ?>
</div>
</div>
</div>
</div>
</div>