<?php

/* @var $this CaProcesoController */
/* @var $model CaProceso */

$this->PPaudit('CaRevisionDireccion','LISTADO DE PROGRAMAS');

$this->myHeader1("tasks","Procesos");
echo $this->renderPartial('_form', array('model'=>$model)); ?>