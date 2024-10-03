<?php
/* @var $this TrazasController */
/* @var $model Trazas */
/* @var $form CActiveForm */
if($model->getIsNewRecord()==false)
	$this->myTableHeader("cogs","Trazases","Actualizar Trazas","Update","Trazas", $model->id);
else
	$this->myTableHeader("cogs","Trazases","Adicionar Trazas","Create","Trazas", null);
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'trazas-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php
$this->myInput(6, $form, $model,'fecha','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
echo $form->textField($model,'fecha');
	
$this->myInput(6, $form, $model,'hora','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
echo $form->textField($model,'hora');
	
$this->myInput(6, $form, $model,'usuario','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
echo $form->textField($model,'usuario',array('size'=>45,'maxlength'=>45));
	
$this->myInput(6, $form, $model,'evento','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
echo $form->textField($model,'evento',array('size'=>45,'maxlength'=>45));
	
$this->myInput(6, $form, $model,'resumen','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
echo $form->textField($model,'resumen',array('size'=>60,'maxlength'=>250));
	
?>
	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>
</div>
</div>
</div>
</div>
</div>
<script src="js/jquery-1.10.2.js"></script>