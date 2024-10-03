<?php
/* @var $this UnidadOrganizativaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Unidad Organizativas',
);

$this->menu=array(
	array('label'=>'Create UnidadOrganizativa', 'url'=>array('create')),
	array('label'=>'Manage UnidadOrganizativa', 'url'=>array('admin')),
);
?>

<h1>Unidad Organizativas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
