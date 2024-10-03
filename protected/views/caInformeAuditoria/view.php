<?php

/* @var $this CaInformeAuditoriaController */
/* @var $model CaInformeAuditoria */
$this->p2_PageTitle2("card-checklist", "Informe de Auditoría","Datos","Gestión de Auditorías / Gestión de Informes");
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'id',
		'fecha_informe',
		'objetivo_auditoria',
		'alcance',
		'representantes',
		'representantes1',
		'rutas',
		'hallazgos',
		'evaluacion',
		// 'conclusiones',
		// 'audit_id',
	),
)); 
?>
</div>
</div>
</div>
</div>
</div>