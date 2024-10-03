<?php
/* @var $this UnidadOrganizativaController */
/* @var $model UnidadOrganizativa */

$this->p2_PageTitle("house", "Unidades Organizativas", "Detalles", "Gestión de Unidades Organizativas");
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'nombre',
		'siglas',
		'old',
	),
)); 
?>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/resources_admin/js/jquery-1.10.2.js"></script>
