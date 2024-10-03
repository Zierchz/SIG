<?php
/* @var $this CaCriteriosEvaluacionesController */
/* @var $model CaCriteriosEvaluaciones */
/* @var $form CActiveForm */

$this->myFlashMessage();
?>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ca-criterios-evaluaciones-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' =>['class'=>'row g-3'],

	
)); ?>
<?php
$this->p2_MyInput(6, $form, $model,'nombre','textArea',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control'));
	
$this->p2_MyInput(6, $form, $model,'descripcion','textArea',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control'));
	
// $this->myInput(6, $form, $model,'usuario','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->p2_MyInput(6, $form, $model,'observaciones','number',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
?>
	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>
</div>
</div>
</div>
</div>
</div>
<script src="js/jquery-1.10.2.js"></script>