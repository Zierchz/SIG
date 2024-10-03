<?php
/* @var $this CaPreguntasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ca Preguntases',
);

$this->menu=array(
	array('label'=>'Create CaPreguntas', 'url'=>array('create')),
	array('label'=>'Manage CaPreguntas', 'url'=>array('admin')),
);
?>

<h1>Ca Preguntases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
