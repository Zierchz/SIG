<?php
/* @var $this CaNotificacionesController */
/* @var $model CaNotificaciones */
$this->myBreadCrumb("Ca Notificaciones","CaNotificaciones","Mostrar datos de CaNotificaciones");
$this->myHeader1("signal","Ca Notificaciones");
$this->myTableHeader1("Ca Notificaciones","View","CaNotificaciones",$model->id);
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'tipo',
		'autor',
		'receptor',
		'fecha',
		'contenido',
		'evento',
		'resumen',
		'hora',
		'icono',
		'estado',
	),
)); ?>
</div>
</div>
</div>
</div>
</div>