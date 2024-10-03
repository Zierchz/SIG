<?php
/* @var $this CaProcesoController */
/* @var $model CaProceso */
/* @var $form CActiveForm */
if($model->getIsNewRecord()==false)
	$this->myTableHeader1("Modificar Proceso","Update","CaProceso", $model->id);
else
	$this->myTableHeader1("Nuevo Proceso","Create","CaProceso", null);
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ca-proceso-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php

$this->myInput(3, $form, $model,'nombre','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
// $this->myInput(3, $form, $model,'fecha_programada','date',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->myInput(3, $form, $model,'fecha_efectuada','date',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->myInput(3, $form, $model,'responsable', 'select', array('class' => 'filtro form-control'), CHtml::listData(Usuario::model()->findAll(), 'fullname', 'fullname'));
	
?>
	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>
</div>
</div>
</div>
</div>
</div>
<script src="js/jquery-1.10.2.js"></script>