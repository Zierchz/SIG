<?php
/* @var $this CaPlanAuditoriaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ca Plan Auditorias',
);

$this->menu=array(
	array('label'=>'Create CaPlanAuditoria', 'url'=>array('create')),
	array('label'=>'Manage CaPlanAuditoria', 'url'=>array('admin')),
);
?>

<h1>Ca Plan Auditorias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
