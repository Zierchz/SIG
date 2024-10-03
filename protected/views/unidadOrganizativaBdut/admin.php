<?php
/* @var $this UnidadOrganizativaBdutController */
/* @var $model UnidadOrganizativaBdut */
$this->myBreadCrumb("Unidad Organizativa Bduts","UnidadOrganizativaBdut","Listado de Unidad Organizativa Bduts");
$this->myHeader1("signal","Unidad Organizativa Bduts");
$this->myTableHeader1("Unidad Organizativa Bduts", "Admin","UnidadOrganizativaBdut","");
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'unidad-organizativa-bdut-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'summaryText' => 'Mostrando {start} a {end} de {count} resultados',
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
		'uo_nombre',
		'uo_siglas',
		'uo_categoria',
		'sap_code',
		'direccion',
		/*
		'provincia',
		'tipo_area',
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