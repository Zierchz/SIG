<?php
/* @var $this CaActividadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ca Actividads',
);

$this->menu=array(
	array('label'=>'Create CaActividad', 'url'=>array('create')),
	array('label'=>'Manage CaActividad', 'url'=>array('admin')),
);
?>

<h1>Ca Actividads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
