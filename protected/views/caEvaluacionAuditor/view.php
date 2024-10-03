<?php
$audi = CaAuditor::model()->findbyPK($model->auditor);
// $a = $audi->nombre_apellido;
/* @var $this CaEvaluacionAuditorController */
/* @var $model CaEvaluacionAuditor */
$this->p2_PageTitle2("person-vcard-fill", "Evaluación de Auditor","Datos","Gestión de Auditorías / Gestión de Evaluaciones");
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        // 'id',
        // 'id_plan_ev',
        // 'auditor',
        'nombre_auditor',

        'area',
        'fecha_evaluacion',
        'evaluacion_final',
        'observaciones',
        'auditoria_realizada',
        // 'aceptado',
        // 'conforme',
    ),
));
$fecha_inicial = $model->fecha_evaluacion;
$fecha_obj = DateTime::createFromFormat('d-m-y', $fecha_inicial);
$fecha_obj->modify('+10 days');
$nueva_fecha = $fecha_obj->format('d-m-y');
$fecha_actual = (new DateTime())->format('d-m-y');
if ($fecha_actual <= $nueva_fecha) {
  
}

// Obtener todas las instancias de CaNotaCriterioEvaluacionAuditor asociadas a la evaluación actual
$criteria = new CDbCriteria();
$criteria->compare('id_evaluacion', $model->id);
$nombre_lider_usuario_evaluador=null;
$notas = CaNotaCriterioEvaluacionAuditor::model()->findAll($criteria);


foreach ($notas as $notass) {
$usuario_evaluador=$notass->id_usuario_evaluador;
$nombre_usuario_evaluador= Usuario::model()->findByPk($usuario_evaluador);
	$nombre_lider_usuario_evaluador=$nombre_usuario_evaluador->username;

}
echo '<br>';
// Mostrar las instancias en una tabla

// echo '<h3 style="align:center;text-align: center;border-radius:30px;font-size:22px;border-right:double #454545 10px;border-left:double #454545 10px;background-color:white;border-bottom:double #454545 2px;border-top:double #454545 2px; color: #454545;font-family:Bahnschrift">Evaluador - '.$nombre_lider_usuario_evaluador.':</h3>';
echo'<br>';
echo '<h3 style="align:center;text-align: center;border-radius:30px;font-size:22px;border-right:double #454545 10px;border-left:double #454545 10px;background-color:white;border-bottom:double #454545 2px;border-top:double #454545 2px; color: #454545;font-family:Bahnschrift">Notas de Criterios de Evaluacion:</h3>';
echo'<br>';
if (!empty($notas)) {
    echo '<table class="table table-striped detail-view" style="text-align:center">';
    echo '<tr><th style="text-align:center;border-right:6px solid white">Nombre del Criterio</th><th style="text-align:center">Nota</th></tr>';
    foreach ($notas as $nota) {
        echo '<tr >';
        echo '<td style="text-align:center;border-right:6px solid white">' . $nota->nombre_criterio . '</td>';
        echo '<td>' . $nota->nota . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo '<p>No hay notas de criterios asociadas a esta evaluación.</p>';
}

?>
