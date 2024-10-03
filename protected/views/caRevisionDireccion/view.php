<?php
$pro=new CaProceso('search');
$uni=UnidadOrganizativa::model()->findByPk($model->uo);

/* @var $this CaRevisionDireccionController */
/* @var $model CaRevisionDireccion */
$this->p2_PageTitle("clipboard-check", "Revisión por la Dirección", "Detalles", "Gestión de Programas Anuales de Revisión por la Dirección");

?>
<!-- <div class="container">
<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item col-md-6" role="presentation">
					<button class="nav-link active " id="a-tab" data-bs-toggle="tab" data-bs-target="#a" type="button" role="tab" aria-controls="a" aria-selected="true" style="color:#454545;font-size:25px;width:400px;font-family:Bahnschrift"><strong>Datos de la Revisión</strong></button>
				</li>
<li class="nav-item col-md-6" role="presentation">
		          	<button class="nav-link " id="b-tab" data-bs-toggle="tab" data-bs-target="#b" type="button" role="tab" aria-controls="b" aria-selected="false" style="color:#454545;font-size:25px;width:400px;font-family:Bahnschrift"><strong>Procesos Asignados</strong> </button>
		        </li>
    </ul>

    
    <div class="tab-content pt-2" id="myTabContent">  
	<div class="tab-pane fade show active" id="a">   -->
            
            <?php
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'id',
		array(
			'name'=>'uo',
			'value'=>$uni->siglas,
		),
		'fecha_emision',
		// 'proceso',
		'fecha_aprobado',
		'revision_elaborado_por',
		'revision_aprobado_por',
		'observaciones',
		'fecha_elaborado',
	),
)); 
?>
         <!-- </div>
        <div class="tab-pane fade show" id="b">
         
		
			<?php
			$uni=Yii::app()->user->areaid;
			$this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'ca-proceso-grid',
				'dataProvider'=>$pro->search1($model->id,$uni),
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
					
					'nombre',
					// 'fecha_programada',
					'fecha_efectuada',
					'responsable',
					
					array(
							'class'=>'CButtonColumn',
							'template'=>'{update}{delete}',
							'deleteConfirmation'=>"js:'¿Seguro que desea eliminar este elemento?'",
							'buttons'=>['delete'=>['label'=>'Eliminar'],
									'update'=>['label'=>'Modificar'],
									'view'=>['label'=>'Mostrar datos'],
							]
					),
				),
			));
			?>
		
			<?php
			
			?>
			

			
			
			</div>
			</div>
			</div>
			</div>
			</div> -->