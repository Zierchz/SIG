<?php
/* @var $this CaEvaluacionAuditorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ca Evaluacion Auditors',
);

$this->menu=array(
	array('label'=>'Create CaEvaluacionAuditor', 'url'=>array('create')),
	array('label'=>'Manage CaEvaluacionAuditor', 'url'=>array('admin')),
);
?>

<h1>Ca Evaluacion Auditors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
