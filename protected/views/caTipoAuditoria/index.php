<?php
/* @var $this CaTipoAuditoriaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ca Tipo Auditorias',
);

$this->menu=array(
	array('label'=>'Create CaTipoAuditoria', 'url'=>array('create')),
	array('label'=>'Manage CaTipoAuditoria', 'url'=>array('admin')),
);
?>

<h1>Ca Tipo Auditorias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
