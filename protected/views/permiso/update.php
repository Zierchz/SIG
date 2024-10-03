<?php
/* @var $this PermisoController */
/* @var $model Permiso */
$this->p2_PageTitle("list-check", "Permisos del Sistema", "Actualizar", "Gestión de Permisos");
echo $this->renderPartial('_form', array('model'=>$model, 'modelos'=>$modelos,)); ?>