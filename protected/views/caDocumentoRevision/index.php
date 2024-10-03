<?php
/* @var $this CaDocumentoRevisionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ca Documento Revisions',
);

$this->menu=array(
	array('label'=>'Create CaDocumentoRevision', 'url'=>array('create')),
	array('label'=>'Manage CaDocumentoRevision', 'url'=>array('admin')),
);
?>

<h1>Ca Documento Revisions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
