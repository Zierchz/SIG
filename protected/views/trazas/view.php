<?php
/* @var $this TrazasController */
/* @var $model Trazas */
$this->myBreadCrumb("Trazases","Trazas","Mostrar datos de Trazas");
$this->myHeader("Trazases");
$this->myTableHeader("Trazases","Datos del Trazas ","View","Trazas",$model->id);
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'fecha',
		'hora',
		'usuario',
		'evento',
		'resumen',
	),
)); ?>
</div>
</div>
</div>
</div>
</div>