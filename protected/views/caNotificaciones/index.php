<?php
/* @var $this CaNotificacionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ca Notificaciones',
);

$this->menu=array(
	array('label'=>'Create CaNotificaciones', 'url'=>array('create')),
	array('label'=>'Manage CaNotificaciones', 'url'=>array('admin')),
);
?>

<h1>Ca Notificaciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
