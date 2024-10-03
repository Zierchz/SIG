<?php $this->PPcalidad();
/* @var $this CaAuditorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ca Auditors',
);

$this->menu=array(
	array('label'=>'Create CaAuditor', 'url'=>array('create')),
	array('label'=>'Manage CaAuditor', 'url'=>array('admin')),
);
?>

<h1>Ca Auditors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
