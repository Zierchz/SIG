<?php
/* @var $this CaDocumentoInformeController */
/* @var $model CaDocumentoInforme */
/* @var $form CActiveForm */

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ca-documento-informe-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' =>['class'=>'row g-3'],
)); ?>
<?php
$this->myInput(6, $form, $model,'url','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->myInput(6, $form, $model,'descripcion','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
		
?>
	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>
</div>

