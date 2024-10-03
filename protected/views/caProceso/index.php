<?php
/* @var $this CaProcesoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ca Procesos',
);

$this->menu=array(
	array('label'=>'Create CaProceso', 'url'=>array('create')),
	array('label'=>'Manage CaProceso', 'url'=>array('admin')),
);
?>

<h1>Ca Procesos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
