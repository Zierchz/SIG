<?php
/* @var $this CaDocumentoInformeController */
/* @var $model CaDocumentoInforme */
$this->p2_PageTitle("Ca Documento Informes","Datos del CaDocumentoInforme ","View","CaDocumentoInforme",$model->id);
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'url',
		'descripcion',
		'id_informe',
	),
)); ?>
</div>
</div>
</div>
</div>
</div>