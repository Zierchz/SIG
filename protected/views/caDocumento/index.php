<?php
/* @var $this CaDocumentoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ca Documentos',
);

$this->menu=array(
	array('label'=>'Create CaDocumento', 'url'=>array('create')),
	array('label'=>'Manage CaDocumento', 'url'=>array('admin')),
);
?>

<h1> Documentos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
