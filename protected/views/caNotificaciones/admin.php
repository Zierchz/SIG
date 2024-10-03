<?php
/* @var $this CaNotificacionesController */
/* @var $model CaNotificaciones */
$this->myBreadCrumb("Ca Notificaciones","CaNotificaciones","Listado de Ca Notificaciones");
$this->myHeader1("signal","Ca Notificaciones");
$this->myTableHeader1("Ca Notificaciones", "Admin","CaNotificaciones","");
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ca-notificaciones-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'summaryText' => 'Mostrando {start} a {end} de {count} resultados',
	'emptyText' => '', 
	'pager'=>array(
		'header' => 'Ir a la pagina:',
		'firstPageLabel' => '< <',
		'prevPageLabel' => 'Anterior',
		'nextPageLabel' => 'Siguiente',
		'lastPageLabel' => '>>;'
	),
	'columns'=>array(
				array('header'=>'No.',
						'value'=>'++$row',
				),
		'id',
		'nombre',
		'tipo',
		'autor',
		'receptor',
		'fecha',
		/*
		'contenido',
		'evento',
		'resumen',
		'hora',
		'icono',
		'estado',
		*/
		array(
				'class'=>'CButtonColumn',
				'deleteConfirmation'=>"js:'¿Seguro que desea eliminar este elemento?'",
				'buttons'=>				['delete'=>['label'=>'Eliminar',
									'imageUrl' => Yii::app()->baseUrl . './images/delete.png',
									'options'=>['class'=>'btn delete']],
									'update'=>['label'=>'Modificar',
									'imageUrl' => Yii::app()->baseUrl . './images/update.png',
									'options'=>['class'=>'btn update']],
									'view'=>['label'=>'Mostrar datos',
									'imageUrl' => Yii::app()->baseUrl . './images/view.png',
									'options'=>['class'=>'btn view']],
				]
		),
	),
)); ?>
</div>
</div>
</div>
</div>
</div>