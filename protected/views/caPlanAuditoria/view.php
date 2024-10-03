<?php


$pro=new CaActividad('search');
$au=new CaEquipoAuditor('search');
$uni=UnidadOrganizativa::model()->findByPk($model->area);

/* @var $this CaPlanAuditoriaController */
/* @var $model CaPlanAuditoria */
$this->p2_PageTitle2("briefcase", "Plan de Auditorías","Datos","Gestión de Auditorías / Gestión de Planes");
?>

		<?php
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'id',
		array(
			'name'=>'area',
			'value'=>$uni->siglas,
		),
		'fecha_plan',
		'objetivo_plan',
		'alcance',
		
		'plan_elaborado_por',
		'plan_revisado_por',
		'plan_aprobado_por',
		// 'auditoria',
		
		
	),
));
?>

 