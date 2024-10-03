<?php

$pro=new CaPreguntas('search');
/* @var $this CaListaVerificacionController */
/* @var $model CaListaVerificacion */
$this->p2_PageTitle2("list-check", "Lista de Verificación","Datos","Gestión de Auditorías / Gestión de Listas");
?>

		<?php
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'id',
		// 'id_plan_lista',
		'fecha',
		// 'lider',
		array(
			'name'=>'lider',
            'value'=>$model->audi->nombre_apellido),
		// 'auditoria_id',
		// 'area_audit',
	),
)); 
?>
