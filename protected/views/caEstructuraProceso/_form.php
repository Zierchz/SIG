<?php
/* @var $this CaEstructuraProcesoController */
/* @var $model CaEstructuraProceso */
/* @var $form CActiveForm */


$form=$this->beginWidget('CActiveForm', array(
	'id'=>'ca-estructura-proceso-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' =>['class'=>'row g-3'],
)); ?>
<?php
$this->p2_MyInput(6, $form, $model,'nombre','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
// $this->p2_MyInput(6, $form, $model,'id_uo','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
?>
	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>
</div>
</div>
</div>
</div>
</div>
<script src="js/jquery-1.10.2.js"></script>