<?php
/* @var $this CaEquipoAuditorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ca Equipo Auditors',
);

$this->menu=array(
	array('label'=>'Create CaEquipoAuditor', 'url'=>array('create')),
	array('label'=>'Manage CaEquipoAuditor', 'url'=>array('admin')),
);
?>

<h1>Ca Equipo Auditors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
