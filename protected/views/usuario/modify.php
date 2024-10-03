<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
$this->myBreadCrumb("Usuario","Modificar Contraseña");
$this->myHeader("Gestionar Usuarios");
?>

<?php echo $this->renderPartial('_form1', array('model'=>$model)); ?>