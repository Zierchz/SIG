<?php
/* @var $this CaAuditoriaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ca Auditorias',
);

$this->menu=array(
	array('label'=>'Create CaAuditoria', 'url'=>array('create')),
	array('label'=>'Manage CaAuditoria', 'url'=>array('admin')),
);
?>

<h1>Ca Auditorias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
