<?php
/* @var $this CaDocumentoRevisionController */
/* @var $model CaDocumentoRevision */
$this->p2_PageTitle("Ca Documento Revisions","Datos del CaDocumentoRevision ","View","CaDocumentoRevision",$model->id);
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'url',
		'descripcion',
		'id_revision',
	),
)); ?>
</div>
</div>
</div>
</div>
</div>