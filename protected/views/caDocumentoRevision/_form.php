<?php
/* @var $this CaDocumentoRevisionController */
/* @var $model CaDocumentoRevision */
/* @var $form CActiveForm */

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ca-documento-revision-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' =>['class'=>'row g-3'],
)); ?>
<?php
$this->myInput(6, $form, $model,'url','file',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->myInput(6, $form, $model,'descripcion','textArea',array('size'=>50,'rows'=>1,'maxlength'=>50, 'class'=>'form-control'));
		
?>
	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>
</div>

