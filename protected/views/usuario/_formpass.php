<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */


$this->myTableHeader1("Actualizar Contrase&ntilde;a","","Usuario", $model->id);

?>
<div class="row" style="text-align: left">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',	
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="col-lg-4">
		<div class="form-group">
		<label class="required">Contrase&ntilde;a Actual <span class="required">*</span></label>
		<?php //echo $form->labelEx($model,'old_password'); ?>
		<?php echo $form->passwordField($model,'old_password',array('size'=>60,'maxlength'=>250,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'old_password'); ?>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="form-group">
		<label class="required">Nueva Contrase&ntilde;a <span class="required">*</span></label>
		<?php //echo $form->labelEx($model,'new_password'); ?>
		<?php echo $form->passwordField($model,'new_password',array('size'=>60,'maxlength'=>250,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'new_password'); ?>
		</div>
	</div>
	
	<div class="col-lg-4">
		<div class="form-group">
		<label class="required">Confirmar Contrase&ntilde;a <span class="required">*</span></label>
		<?php //echo $form->labelEx($model,'repeat_password'); ?>
		<?php echo $form->passwordField($model,'repeat_password',array('size'=>60,'maxlength'=>250,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'repeat_password'); ?>
		</div>
	</div>	

	<div class="col-lg-12">
		<div class="form-group" align="right">
			<button name='yt0' id='yt0' type="submit" class="btn btn-primary">Aceptar</button>
			<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		</div>
	</div>

<?php $this->endWidget();
$this->table_Footer();
?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.js"></script>
