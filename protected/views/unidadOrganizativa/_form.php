<?php
$unidades=UnidadOrganizativa::model()->findAll();

/* @var $this UnidadOrganizativaController */
/* @var $model UnidadOrganizativa */
/* @var $form CActiveForm */

?>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'unidad-organizativa-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>['class'=>'row g-3'],

)); ?>

	<div class="col-lg-8">
		<div class="form-group">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>250,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>

	<div class="col-lg-2">
		<div class="form-group">
		<?php echo $form->labelEx($model,'siglas'); ?>
		<?php echo $form->textField($model,'siglas',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'siglas'); ?>
		</div>
	</div>
	
	<div class="col-lg-2">
		<div class="form-group">
		<?php echo $form->labelEx($model,'old'); ?>
		<?php echo $form->textField($model,'old',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'old'); ?>
		</div>
	</div>
	<div><br></div>
	<?php
	if (!$model->getIsNewRecord()) {
		echo '<br><div class="d-flex d-flex justify-content-center align-items-center"><H2 class="col-md-12 " style="align:center;text-align: center;border-radius:30px;font-size:x-large;border-right:double #454545 10px;border-left:double #454545 10px;background-color:white;border-bottom:double #454545 2px;border-top:double #454545 2px; color: #454545;font-family:Bahnschrift">Unidades Subordinadas a la '.$model->siglas.':</H2> 
		</div>';
	
	
		foreach($unidades as $unidad){
			// Check if a CaRelacionUnidad exists with the current unidad's id
			$exists = CaRelacionUnidad::model()->exists('id_rectora = :rectora AND id_auditada = :auditada', array(
				':rectora' => $model->id,
				':auditada' => $unidad->id
			));
	
			// If a CaRelacionUnidad exists, the checkbox should be checked
			$checked = $exists ? 'checked' : '';
			echo '<div class="col-lg-6 d-flex  align-items-end align-left form-check form-switch">';
			echo '<input class="form-check-input checkBoxClassSeguridad" type="checkbox" name="unidadid['.$unidad->id.']" value="'.CHtml::encode($unidad->id).'"'.$checked.' style="width: 35px; height: 18px;"/>&nbsp';
			echo '<label  style="font-size: 16px;">' . CHtml::encode($unidad->nombre) . ' (' . CHtml::encode($unidad->siglas) . ')</label>';
			echo '</div>';
		}
	}
?>
	

<?php 
$this->myButton($model);
$this->endWidget();


?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.js"></script>