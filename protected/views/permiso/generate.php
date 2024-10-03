<?php
/* @var $this PermisoController */
/* @var $model Permiso */
/* @var $form CActiveForm */
$this->p2_PageTitle("layer-forward", "Permisos del Sistema", "Generador", "Gestión de Permisos");
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'permiso-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>['class'=>'row g-3'],
)); 
$this->myInput(6, $form, $model,'modelo','select',array('class'=>'form-control','prompt'=>'Seleccione...'), $modelos);
$this->myInput(6, $form, $model,'menu','select',array('class'=>'form-control','prompt'=>'Seleccione...'),array('Nomencladores'=>'Nomencladores','Lateral'=>'Lateral', 'Administración'=>'Administración'));
$this->myButton($model); 
$this->endWidget(); 
?>
</div>
</div>
</div>
</div>
</div>
