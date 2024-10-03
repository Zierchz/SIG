<?php
/* @var $this CaCriteriosEvaluacionesController */
/* @var $model CaCriteriosEvaluaciones */
$this->p2_PageTitle("person-check-fill", "Criterios de Evaluaciones", "Listado", "Gestión de Criterios de Evaluaciones");
$uni=Yii::app()->user->areaid;
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ca-criterios-evaluaciones-grid',
	'dataProvider'=>$model->search($uni),
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
		// 'id',
		'nombre',
		'descripcion',
		// 'usuario',
		'observaciones',
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