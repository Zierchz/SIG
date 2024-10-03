<?php
/* @var $this CaCriteriosEvaluacionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ca Criterios Evaluaciones',
);

$this->menu=array(
	array('label'=>'Create CaCriteriosEvaluaciones', 'url'=>array('create')),
	array('label'=>'Manage CaCriteriosEvaluaciones', 'url'=>array('admin')),
);
?>

<h1>Ca Criterios Evaluaciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
