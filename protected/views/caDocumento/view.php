<?php
$this->PPaudit('CaAuditor','LISTADO DE AUDITORES');
/* @var $this CaDocumentoController */
/* @var $model CaDocumento */

$this->myHeader1("file","Documentos");
$this->myTableHeader2("Datos del Documento","View","CaDocumento",$model->id);
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'id',
		'url',
		'auditor',
		'fecha_creacion',
		'autor',
		// 'unidad_o',
		'observaciones',
		'categoria',
	),
)); ?>
</div>
</div>
</div>
</div>
</div>
