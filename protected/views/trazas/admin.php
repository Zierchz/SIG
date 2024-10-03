<?php
/* @var $this TrazasController */
/* @var $model Trazas */
$this->p2_PageTitle("search", "Trazas del Sistema", "Listado", "Gestión de Trazas");
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'trazas-grid',
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
						'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
				),
		//'id',
		'fecha',
		'hora',
		'usuario',
		'evento',
		'resumen',
	),
)); ?>
</div>
</div>
</div>
</div>
</div>