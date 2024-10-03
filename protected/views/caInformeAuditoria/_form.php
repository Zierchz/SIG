<?php
/* @var $this CaInformeAuditoriaController */
/* @var $model CaInformeAuditoria */
/* @var $form CActiveForm */
 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ca-informe-auditoria-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' =>['class'=>'row g-3'],

)); ?>
<?php

// $this->myInput(6, $form, $model,'fecha_informe','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->p2_MyInput(6, $form, $model,'objetivo_auditoria','textArea',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control'));
	
$this->p2_MyInput(6, $form, $model,'alcance','textArea',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control'));
	
$trabajadores = Trabajador::model()->findAll();

$this->p2_MyInput(6, $form, $model, 'representantes', 'select', array('class' => 'form-control','id'=>'repre','prompt' => 'Seleccione el trabajador:'), CHtml::listData($trabajadores, 'nombre_apellidos', 'nombre_apellidos'));

$this->p2_MyInput(6, $form, $model, 'representantes1', 'select', array('class' => 'form-control','id'=>'repre1','prompt' => 'Seleccione el trabajador:'), CHtml::listData($trabajadores, 'nombre_apellidos', 'nombre_apellidos'));


$this->p2_MyInput(12, $form, $model,'rutas','textArea',array('size'=>50,'maxlength'=>5000,'rows'=>1, 'class'=>'form-control'));

$this->p2_MyInput(12, $form, $model,'hallazgos','textArea',array('size'=>50,'maxlength'=>5000,'rows'=>1, 'class'=>'form-control'));

$this->p2_MyInput(12, $form, $model,'evaluacion','textArea',array('size'=>50,'maxlength'=>5000,'rows'=>1, 'class'=>'form-control'));

Yii::app()->clientScript->registerScript('repre_select2', "
    $('#repre').select2({
        minimumInputLength: 3
    });
");
Yii::app()->clientScript->registerScript('repre1_select2', "
    $('#repre1').select2({
        minimumInputLength: 3
    });
");
// $this->myInput(6, $form, $model,'conclusiones','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));

// $this->myInput(2, $form, $model,'aprobado','checkbox',array('class'=>'form-control'));
	
// $this->myInput(2, $form, $model,'revisado','checkbox',array('class'=>'form-control'));
	

	
// $this->myInput(6, $form, $model,'audit_id','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
?>
	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>
</div>
</div>
</div>
</div>
</div>



