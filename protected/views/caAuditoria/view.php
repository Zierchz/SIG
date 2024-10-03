<?php
/* @var $this CaAuditoriaController */
/* @var $model CaAuditoria */



$this->p2_PageTitle2("search", "Auditorías","Detalles","Gestión de Auditorías");
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'id',
		// 'unidad_aud',
		// 'unidad_rec',
		'Anno',
		array(
            'name' => 'unidad_rec',
            'value' => $model->idUnidadRectora1->siglas,
			
        ),
		array(
            'name' => 'unidad_aud',
            'value' => $model->idUnidadAAuditar1->siglas,
        ),
		'tipo',
		'objetivo',
		// 'programa',
		'observaciones',
	),
)); ?>
</div>
</div>
</div>
</div>
</div>