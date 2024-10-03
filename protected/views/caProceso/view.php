<?php
$this->PPaudit('CaRevisionDireccion','LISTADO DE PROGRAMAS');
/* @var $this CaProcesoController */
/* @var $model CaProceso */

$this->myHeader1("tasks","Procesos");
$this->myTableHeader2("Procesos","View","CaProceso",$model->id);
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'id',
		'nombre',
		'fecha_programada',
		'fecha_efectuada',
		'responsable',
		// 'revision'
	),
)); ?>
</div>
</div>
</div>
</div>
</div>