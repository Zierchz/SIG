<?php
/* @var $this CaNotificacionesController */
/* @var $model CaNotificaciones */
/* @var $form CActiveForm */
if($model->getIsNewRecord()==false)
	$this->myTableHeader1("Ca Notificaciones","Update","CaNotificaciones", $model->id);
else
	$this->myTableHeader1("Ca Notificaciones","Create","CaNotificaciones", null);
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ca-notificaciones-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php
$this->myInput(6, $form, $model,'nombre','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->myInput(6, $form, $model,'tipo','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->myInput(6, $form, $model,'autor','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->myInput(6, $form, $model,'receptor','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->myInput(6, $form, $model,'fecha','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->myInput(6, $form, $model,'contenido','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->myInput(6, $form, $model,'evento','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->myInput(6, $form, $model,'resumen','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->myInput(6, $form, $model,'hora','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->myInput(6, $form, $model,'icono','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->myInput(6, $form, $model,'estado','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
?>
	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>
</div>
</div>
</div>
</div>
</div>
<script src="js/jquery-1.10.2.js"></script>