<?php
/* @var $this UnidadOrganizativaBdutController */
/* @var $model UnidadOrganizativaBdut */
$this->myBreadCrumb("Unidad Organizativa Bduts","UnidadOrganizativaBdut","Mostrar datos de UnidadOrganizativaBdut");
$this->myHeader1("signal","Unidad Organizativa Bduts");
$this->myTableHeader1("Unidad Organizativa Bduts","View","UnidadOrganizativaBdut",$model->id);
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'uo_nombre',
		'uo_siglas',
		'uo_categoria',
		'sap_code',
		'direccion',
		'provincia',
		'tipo_area',
	),
)); ?>
</div>
</div>
</div>
</div>
</div>