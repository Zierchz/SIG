<?php
/* @var $this CaEquipoAuditorController */
/* @var $model CaEquipoAuditor */
/* @var $form CActiveForm */


 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ca-equipo-auditor-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php
$this->myInput(6, $form, $model, 'auditor', 'select', array('class' => 'filtro form-control', 'prompt' => 'Seleccione auditor:'), CHtml::listData(CaAuditor::model()->findAllByAttributes(array('disponibilidad'=> 1, 'es_papelera'=> 0)), 'id', 'nombre_apellido'));

$equipos = CaEquipoAuditor::model()->findAllByAttributes(array('plan_audit' => $plan_id));
$aux = '0';

foreach ($equipos as $equipo) {
    if ($equipo->funcion == 'jefe') {
        $aux = "1";
    }
}

$options = array();


if ($aux === '0') {
    $options["jefe"] = "Líder Auditor";
} else {
   
    $options["miembro"] = "Auditor";
    $options["formacion"] = "Auditor en formación";
}

$this->myInput(6, $form, $model, 'funcion', 'select', array('class' => 'form-control'), $options);

	
?>
	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>
</div>
</div>
</div>
</div>
</div>
<script src="js/jquery-1.10.2.js"></script>