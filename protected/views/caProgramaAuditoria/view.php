<?php
/* @var $this CaProgramaAuditoriaController */
/* @var $model CaProgramaAuditoria */


$this->p2_PageTitle("calendar-event", "Programa Anual de Auditorías","Detalles","Gestión de Programas Anuales");
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'id',
		// 'unidad_rectora',
		// 'unidad_a_auditar',
		array(
            'name' => 'unidad_rectora',
            'value' => $model->idUnidad->siglas,
			
        ),
		array(
            'name' => 'unidad_a_auditar',
            'value' => $model->idUnidadAAuditar->siglas,
        ),
		'anno',
		'objetivos_programa',
		'riesgos_programa',
        'observaciones',
        'aprobado_por',
		array(
            'name' => 'Enero',
            'value' => $model->Enero !== '' ? $model->Enero : 'No Asignado',
        ),
        array(
            'name' => 'Febrero',
            'value' => $model->Febrero !== '' ? $model->Febrero : 'No Asignado',
        ),
        array(
            'name' => 'Marzo',
            'value' => $model->Marzo !== '' ? $model->Marzo : 'No Asignado',
        ),
        array(
            'name' => 'Abril',
            'value' => $model->Abril !== '' ? $model->Abril : 'No Asignado',
        ),
        array(
            'name' => 'Mayo',
            'value' => $model->Mayo !== '' ? $model->Mayo : 'No Asignado',
        ),
        array(
            'name' => 'Junio',
            'value' => $model->Junio !== '' ? $model->Junio : 'No Asignado',
        ),
        array(
            'name' => 'Julio',
            'value' => $model->Julio !== '' ? $model->Julio : 'No Asignado',
        ),
        array(
            'name' => 'Agosto',
            'value' => $model->Agosto !== '' ? $model->Agosto : 'No Asignado',
        ),
        array(
            'name' => 'Septiembre',
            'value' => $model->Septiembre !== '' ? $model->Septiembre : 'No Asignado',
        ),
        array(
            'name' => 'Octubre',
            'value' => $model->Octubre !== '' ? $model->Octubre : 'No Asignado',
        ),
        array(
            'name' => 'Noviembre',
            'value' => $model->Noviembre !== '' ? $model->Noviembre : 'No Asignado',
        ),
        array(
            'name' => 'Diciembre',
            'value' => $model->Diciembre !== '' ? $model->Diciembre : 'No Asignado',
        ),
        
		// 'id_unidad',
	),
)); ?>
</div>
</div>
</div>
</div>
</div>