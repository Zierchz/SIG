<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
$this->p2_PageTitle("people", "Usuarios del Sistema", "Crear", "Gestión de Usuarios");
echo $this->renderPartial('_form', array('model'=>$model));
?>