<?php
/* @var $this CaTipoAuditoriaController */
/* @var $model CaTipoAuditoria */

$this->p2_PageTitle("cogs","Ca Tipo Auditorias","Listado", "Tipos de Auditoría","CaTipoAuditoria","");
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ca-tipo-auditoria-grid',
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
		'nombre',
		'siglas',
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