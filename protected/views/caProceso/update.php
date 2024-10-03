<?php
$this->PPaudit('CaRevisionDireccion','LISTADO DE PROGRAMAS');
/* @var $this CaProcesoController */
/* @var $model CaProceso */

$this->myHeader1("tasks","Procesos");
echo $this->renderPartial('_form', array('model'=>$model)); ?>