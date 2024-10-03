<?php
/* @var $this CaListaVerificacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ca Lista Verificacions',
);

$this->menu=array(
	array('label'=>'Create CaListaVerificacion', 'url'=>array('create')),
	array('label'=>'Manage CaListaVerificacion', 'url'=>array('admin')),
);
?>

<h1>Ca Lista Verificacions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
