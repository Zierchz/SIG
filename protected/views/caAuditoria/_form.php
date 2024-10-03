<?php
/* @var $this CaAuditoriaController */
/* @var $model CaAuditoria */
/* @var $form CActiveForm */





$form=$this->beginWidget('CActiveForm', array(
	'id'=>'ca-auditoria-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' =>['class'=>'row g-3'],

)); 

$this->p2_MyInput(6, $form, $model,'unidad_aud','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->p2_MyInput(6, $form, $model,'unidad_rec','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->p2_MyInput(6, $form, $model,'tipo','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->p2_MyInput(6, $form, $model,'programa','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->p2_MyInput(6, $form, $model,'observaciones','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
?>
	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>
</div>
</div>
</div>
</div>
</div>
<script src="js/jquery-1.10.2.js"></script>