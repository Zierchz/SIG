
<?php
$id_plan_ev = null;
if (isset($_GET['id_plan_ev'])) {
    $id_plan_ev = $_GET['id_plan_ev'];
}
/* @var $this CaEvaluacionAuditorController */
/* @var $model CaEvaluacionAuditor */
/* @var $form CActiveForm */
$this->myFlashMessage();

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'ca-evaluacion-auditor-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => ['class' => 'row g-3'],
)); 


// Obtener los auditores que ya están asignados para el id_plan_ev dado
$asignados = CaEvaluacionAuditor::model()->findAllByAttributes(array("id_plan_ev" => $id_plan_ev));
$idsAsignados = array();
foreach ($asignados as $asignado) {
    $idsAsignados[] = $asignado->auditor;
}

// Construir la condición y parámetros para la consulta
$criteria = new CDbCriteria;
if (Yii::app()->user->areaid != 7) {

    $criteria->addCondition('equipo_de_auditores = :equipo_de_auditores');
    $criteria->params[':equipo_de_auditores'] = $id_plan_ev;
}

$criteria->addCondition('es_jefe = :es_jefe');
$criteria->params[':es_jefe'] = 0;

if (Yii::app()->user->roleid == 34) {
    $criteria->params[':es_jefe'] = 1;
    if (Yii::app()->user->areaid != 7) {
        $criteria->addCondition('unidad = :unidad');
        $criteria->params[':unidad'] = Yii::app()->user->areaid;
    }
}

// Excluir auditores asignados si hay alguno
if (!empty($idsAsignados)) {
    $criteria->addNotInCondition('id', $idsAsignados);
}

$a = CaAuditor::model()->findAll($criteria);

$this->p2_MyInput(12, $form, $model, 'auditor', 'select', array('class' => 'filtro form-control', 'prompt' => 'Seleccione el auditor a evaluar:'), CHtml::listData($a, 'id', 'nombre_apellido'));

// Variable para almacenar los valores de los criterios
$criterios = CaCriteriosEvaluaciones::model()->findAll();

echo '<br><br><br><br><br><div class="row"><H2 class="col-md-12" style="text-align: center; border-radius:30px; font-size:x-large; background-color:white; color: #454545; font-family:Bahnschrift">CRITERIOS DE EVALUACIÓN:</H2></div><br>';
?>
<div class="row">
    <?php foreach ($criterios as $key): ?>
        <div class="col-md-4 d-flex flex-column align-items-center">
            <?php
            $nombre_criterio = $key->nombre;
            echo CHtml::label($nombre_criterio . '&nbsp&nbsp(0 - ' . $key->observaciones . ')', 'nota_' . $nombre_criterio, array('class' => 'row')); // Etiqueta del campo
            // Campo de formulario para el valor del criterio
            echo CHtml::textField('nota[' . $nombre_criterio . ']', '', array('class' => 'form-control row', 'style' => 'width:300px'));
            ?>
        </div>
    <?php endforeach; ?>
</div>

<?php
$this->p2_MyInput(6, $form, $model, 'observaciones', 'textArea', array('size' => 50, 'maxlength' => 1000, 'rows' => 1, 'class' => 'form-control'));

$this->p2_MyInput(6, $form, $model, 'auditoria_realizada', 'textArea', array('size' => 50, 'maxlength' => 1000, 'rows' => 1, 'class' => 'form-control'));

?>
<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>
