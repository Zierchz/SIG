<?php
/* @var $this CaEstructuraProcesoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ca Estructura Procesos',
);

$this->menu=array(
	array('label'=>'Create CaEstructuraProceso', 'url'=>array('create')),
	array('label'=>'Manage CaEstructuraProceso', 'url'=>array('admin')),
);
?>

<h1>Ca Estructura Procesos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
