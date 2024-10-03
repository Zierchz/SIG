<?php

/* @var $this CaPreguntasController */
/* @var $model CaPreguntas */
$this->p2_PageTitle2("question-circle", "Preguntas","Datos","Auditorías / Lista de verificación / Gestión de Preguntas");
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'id',
		'pregunta',
		'referencia',
		'conformidad',
		'observaciones',
		// 'lista_id',
	),
)); ?>
</div>
</div>
</div>
</div>
</div>