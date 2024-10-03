<?php
/* @var $this UnidadOrganizativaBdutController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Unidad Organizativa Bduts',
);

$this->menu=array(
	array('label'=>'Create UnidadOrganizativaBdut', 'url'=>array('create')),
	array('label'=>'Manage UnidadOrganizativaBdut', 'url'=>array('admin')),
);
?>

<h1>Unidad Organizativa Bduts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
