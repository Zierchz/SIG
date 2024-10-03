<?php
/* @var $this TrazasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Trazases',
);

$this->menu=array(
	array('label'=>'Create Trazas', 'url'=>array('create')),
	array('label'=>'Manage Trazas', 'url'=>array('admin')),
);
?>

<h1>Trazases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
