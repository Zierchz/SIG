<?php
/* @var $this PermisoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Permisos',
);

$this->menu=array(
	array('label'=>'Create Permiso', 'url'=>array('create')),
	array('label'=>'Manage Permiso', 'url'=>array('admin')),
);
?>

<h1>Permisos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
