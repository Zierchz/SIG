<?php
/* @var $this PermisoController */
/* @var $model Permiso */
/* @var $form CActiveForm */
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'permiso-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>['class'=>'row g-3'],
)); 
$this->p2_MyInput(6, $form, $model,'permiso','text',array('size'=>60,'maxlength'=>250, 'class'=>'form-control'));
$this->p2_MyInput(6, $form, $model,'descripcion','text',array('size'=>60,'maxlength'=>250, 'class'=>'form-control'));

$this->p2_MyInput(6, $form, $model,'url','select',array('class'=>'form-control'),array('Admin'=>'Admin','Create'=>'Create', 'Update'=>'Update','View'=>'View', 'Delete'=>'Delete'), 91);

$this->p2_MyInput(6, $form, $model,'icono','text',array('size'=>60,'maxlength'=>150, 'class'=>'form-control'));
$this->p2_MyInput(6, $form, $model,'menu','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
$this->p2_MyInput(6, $form, $model,'modelo','select',array('class'=>'form-control','prompt'=>'Seleccione...'), $modelos);
$this->p2_MyInput(6, $form, $model,'padre','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
$this->p2_MyInput(6, $form, $model,'visible','select',array('class'=>'form-control','prompt'=>'Seleccione...'),array('0'=>'Si','1'=>'No'));
$this->myButton($model);
$this->endWidget(); 
?>
</div>
</div>
</div>
</div>
</div>
<script src="js/jquery-1.10.2.js"></script>
<script type="text/javascript">
	x=jQuery(document);
	x.ready(inicializar);
	function inicializar()
	{
		$('#Permiso_icono').iconpicker('#Permiso_icono');
	}
</script>