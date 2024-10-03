<?php
/* @var $this CaDocumentoInformeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ca Documento Informes',
);

$this->menu=array(
	array('label'=>'Create CaDocumentoInforme', 'url'=>array('create')),
	array('label'=>'Manage CaDocumentoInforme', 'url'=>array('admin')),
);
?>

<h1>Ca Documento Informes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
