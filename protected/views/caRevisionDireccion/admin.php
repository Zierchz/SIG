<style>
	tr {
        text-align: center;
    }
	</style>

<?php 
$template='{view}{update}{delete}';
$uo=Yii::app()->user->areaid;
// $filter=true;
// if($uo!=7){$filter=false;}

/* @var $this CaRevisionDireccionController */
/* @var $model CaRevisionDireccion */
$this->p2_PageTitle("clipboard-check", "Programa Anual de Revisión por la Dirección", "Listado", "Gestión de Programas Anuales de Revisión por la Dirección");
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ca-revision-direccion-grid',
	'dataProvider'=>$model->search($uo),
	'filter'=>$model,
	'summaryText' => 'Mostrando {start} a {end} de {count} resultados',
    'emptyText' => 'No se encontraron elementos', 
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
				($uo == 7) ? array(
					'name'=>'uo',
					'value'=>'$data->Unidades1->siglas',
				) : 
		'fecha_emision',
		'fecha_elaborado',
		'fecha_aprobado',
		'revision_elaborado_por',
		'revision_aprobado_por',
		
		// 'observaciones',
		
		// 'proceso',
		
		array(
				'class'=>'CButtonColumn',
				'template'=>$template,
				'deleteConfirmation'=>"js:'¿Seguro que desea eliminar este elemento?'",
				'afterDelete'=>"function(link,success,data){
					if(success){
						alert('Se ha eliminado el programa correctamente.');
					}
									}",
				
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
		array(
			'class' => 'CButtonColumn',
			'template' => '{proceso}',
			'buttons' => [
				'proceso' => [
					'label' => '<span class="bi bi-card-list btn btn-secondary custom-btn custom-tooltip" title="" style="font-size:19px"><div class="custom-tooltiptext" style="font-size:15px">Procesos</div></span >',
					'url' => 'Yii::app()->createUrl("caProceso/admin", array("rev" => $data->id))',
					'buttonOptions' => [
						'class' => 'btn', 
					
					],
				],
			],
		),array(
			'class' => 'CButtonColumn',
			'template' => '{documento}',
			'buttons' => [
				'documento' => [
					'label' => '<span class="bi bi-archive btn btn-secondary custom-btn custom-tooltip" title="" style="font-size:19px"><div class="custom-tooltiptext" style="font-size:15px">Documentos de la Revisión</div></span >',
					'url' => 'Yii::app()->createUrl("caDocumentoRevision/admin", array("id_revision" => $data->id))',
					'buttonOptions' => [
						'class' => 'btn ', 
					
					],
				],
			],
		),array(
			'class' => 'CButtonColumn',
			'template' => '{reporterev}',
			'buttons' => [
				'reporterev' => [
					'label' => '<div class="btn btn-secondary custom-btn" title="">Exportar</div >',
					'url' => 'Yii::app()->createUrl("site/ca_reporte_revision_direccion", array("revision" => $data->id))',
					'buttonOptions' => [
						'class' => 'btn', 
					
					],
				],
			],
		),	
		
	),
)); 

$this->myFlashMessage();


?>
</div>
</div>
</div>
</div>
</div>