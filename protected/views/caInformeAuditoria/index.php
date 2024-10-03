<?php
/* @var $this CaInformeAuditoriaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ca Informe Auditorias',
);

$this->menu=array(
	array('label'=>'Create CaInformeAuditoria', 'url'=>array('create')),
	array('label'=>'Manage CaInformeAuditoria', 'url'=>array('admin')),
);
?>

<h1>Ca Informe Auditorias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
