<?php 
/* @var $this CaRevisionDireccionController */
/* @var $model CaRevisionDireccion */
/* @var $form CActiveForm */




$this->myFlashMessage();


$form=$this->beginWidget('CActiveForm', array(
	'id'=>'ca-revision-direccion-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' =>['class'=>'row g-3'],


)); ?>
<?php
$this->p2_MyInput(6, $form, $model,'fecha_emision','date',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->p2_MyInput(6, $form, $model,'fecha_aprobado','date',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));

// $this->myInput(6, $form, $model,'fecha_elaborado','date',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
// $this->myInput(6, $form, $model,'revision_elaborado_por','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->p2_MyInput(6, $form, $model,'revision_aprobado_por', 'select', array('class' => 'filtro form-control', 'prompt' => 'Seleccione:'), CHtml::listData(Usuario::model()->findAll('nombre!="Administrador"'), 'nombre', 'nombre'));
	
$this->myInput(6, $form, $model,'observaciones','textArea',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control'));

//$this->myInput(6, $form, $model,'proceso','text',array('size'=>50,'maxlength'=>50,'multiple' => true, 'class'=>'form-control'));

	








?>
	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>

</div>
</div>
</div>
</div>
</div>
<script src="js/jquery-1.10.2.js"></script>