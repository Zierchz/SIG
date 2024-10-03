<?php
/* @var $this CaProgramaAuditoriaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ca Programa Auditorias',
);

$this->menu=array(
	array('label'=>'Create CaProgramaAuditoria', 'url'=>array('create')),
	array('label'=>'Manage CaProgramaAuditoria', 'url'=>array('admin')),
);
?>

<h1>Ca Programa Auditorias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
