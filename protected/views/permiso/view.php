<?php
/* @var $this PermisoController */
/* @var $model Permiso */
$this->p2_PageTitle("list-check", "Permisos del Sistema", "Detalles", "Gestión de Permisos", $model->id);
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'permiso',
		'descripcion',
		'url',
		'icono',
		'menu',
		'modelo',
		'padre',
		'visible'
	),
)); ?>
</div>
</div>
</div>
</div>
</div>