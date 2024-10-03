<?php
/* @var $this UnidadOrganizativaBdutController */
/* @var $model UnidadOrganizativaBdut */
/* @var $form CActiveForm */
if($model->getIsNewRecord()==false)
	$this->myTableHeader1("Unidad Organizativa Bduts","Update","UnidadOrganizativaBdut", $model->id);
else
	$this->myTableHeader1("Unidad Organizativa Bduts","Create","UnidadOrganizativaBdut", null);
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'unidad-organizativa-bdut-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php
$this->myInput(6, $form, $model,'uo_nombre','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->myInput(6, $form, $model,'uo_siglas','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->myInput(6, $form, $model,'uo_categoria','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->myInput(6, $form, $model,'sap_code','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->myInput(6, $form, $model,'direccion','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->myInput(6, $form, $model,'provincia','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->myInput(6, $form, $model,'tipo_area','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
?>
	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>
</div>
</div>
</div>
</div>
</div>
<script src="js/jquery-1.10.2.js"></script>