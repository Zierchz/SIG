
<?php


/* @var $this CaActividadController */
/* @var $model CaActividad */
/* @var $form CActiveForm */




$form=$this->beginWidget('CActiveForm', array(
	'id'=>'ca-actividad-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
		'enctype' => 'multipart/form-data',
		'class'=>'row g-3',
	), 
))
 ?>
 
<?php
echo '<div class=" row col-md-12">';
$this->p2_MyInput(6, $form, $model,'fecha','date',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));

$this->p2_MyInput(2, $form, $model, 'hora', 'text', array('size' => 50,'maxlength' => 50,'class' => 'form-control','placeholder' => '00:00'));
$this->p2_MyInput(1, $form, $model, 'dia', 'select', array('class' => 'form-control', 'prompt' => ''), array(
	
	"a.m" => "a.m",
	"p.m" => "p.m",
	
));
$this->p2_MyInput(2, $form, $model, 'hora_fin', 'text', array('size' => 50,'maxlength' => 50,'class' => 'form-control','placeholder' => '00:00'));
$this->p2_MyInput(1, $form, $model, 'dia_fin', 'select', array('class' => 'form-control', 'prompt' => ''), array(
	
	"a.m" => "a.m",
	"p.m" => "p.m",
	
));
echo '</div>';

$this->myInput(6, $form, $model,'actividad','textArea',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control'));
	
$this->myInput(6, $form, $model,'objetivo','textArea',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control'));
	
// $this->myInput(6, $form, $model,'plan','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
$this->myFlashMessage(); 

?>

	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>
</div>
</div>
</div>
</div>
</div>
