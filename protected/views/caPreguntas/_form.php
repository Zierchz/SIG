<?php
/* @var $this CaPreguntasController */
/* @var $model CaPreguntas */
/* @var $form CActiveForm */
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'ca-preguntas-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' =>['class'=>'row g-3'],
));
 ?>
<?php
$this->p2_MyInput(3, $form, $model,'pregunta','textArea',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control'));
	
$this->p2_MyInput(3, $form, $model,'referencia','textArea',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control'));
	
$this->p2_MyInput(3, $form, $model, 'conformidad', 'select', array('class' => 'form-control'), array(
	null=>"No establecido",
	"Si" => "Sí",
	"No" => "No",
	
));		
$this->p2_MyInput(3, $form, $model,'observaciones','textArea',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control'));
	
// $this->myInput(6, $form, $model,'lista_id','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
?>
	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>