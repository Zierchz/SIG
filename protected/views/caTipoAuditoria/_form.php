<?php
/* @var $this CaTipoAuditoriaController */
/* @var $model CaTipoAuditoria */
/* @var $form CActiveForm */

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ca-tipo-auditoria-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' =>['class'=>'row g-3'],
)); ?>
<?php
$this->p2_myInput(6, $form, $model,'nombre','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->p2_myInput(6, $form, $model,'siglas','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
?>
	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>
</div>
</div>
</div>
</div>
</div>
