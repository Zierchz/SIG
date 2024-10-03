<?php

/* @var $this CaListaVerificacionController */
/* @var $model CaListaVerificacion */
/* @var $form CActiveForm */
 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ca-lista-verificacion-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' =>['class'=>'row g-3'],

)); ?>
<?php
$this->myFlashMessage();
	
// $this->myInput(6, $form, $model,'id_plan_lista','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->p2_MyInput(6, $form, $model,'fecha','date',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
// $this->myInput(6, $form, $model,'lider','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
// $this->myInput(6, $form, $model,'auditoria_id','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
// $this->myInput(6, $form, $model,'area_audit','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
?>

	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>
</div>
</div>
</div>
</div>
</div>
<script src="js/jquery-1.10.2.js"></script>