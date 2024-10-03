<?php
/* @var $this CaRevisionDireccionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ca Revision Direccions',
);

$this->menu=array(
	array('label'=>'Create CaRevisionDireccion', 'url'=>array('create')),
	array('label'=>'Manage CaRevisionDireccion', 'url'=>array('admin')),
);
?>

<h1>Ca Revision Direccions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
