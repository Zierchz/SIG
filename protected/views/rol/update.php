<?php
/* @var $this RolController */
/* @var $model Rol */
$this->p2_PageTitle("person-badge", "Roles del Sistema", "Actualizar", "Gestión de Roles");
echo $this->renderPartial('_form', array('model'=>$model, 'listaPermiso'=>$listaPermiso,'labels'=>$labels));
?>