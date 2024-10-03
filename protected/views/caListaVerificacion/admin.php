<style>
	tr {
        text-align: center;
    }
	</style>

<?php
$template='{delete}{update}';
$lista=null;

if(isset($_GET['lista']))
$lista=$_GET['lista'];
/* @var $this CaListaVerificacionController */
/* @var $model CaListaVerificacion */
$this->p2_PageTitle2("list-check", "Lista de Verificación","Listado","Gestión de Auditorías / Gestión de Listas");

$this->PPaudit('CaAuditoria','','','Regresar al Listado de Auditorías');


$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ca-lista-verificacion-grid',
	'dataProvider'=>$model->search1($lista),
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
		// 'id',
		// 'id_plan_lista',
		'fecha',
		// 'lider',
		array(
			'name'=>'lider',
            'value'=>'$data->audi->nombre_apellido'),
		// 'auditoria_id',
		/*
		'area_audit',
		*/
		array(
				'class'=>'CButtonColumn',
				'template'=>$template,
				'deleteConfirmation'=>"js:'¿Seguro que desea eliminar este elemento?'",
				'afterDelete'=>"function(link,success,data){
					if(success){
						location.reload();
						alert('Se ha eliminado la lista correctamente.');
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
					'label' => '<span class="bi bi-question btn btn-secondary custom-btn custom-tooltip" title="" style="font-size:19px"><div class="custom-tooltiptext" style="font-size:15px">Preguntas</div></span >',
					'url' => 'Yii::app()->createUrl("caPreguntas/admin", array("lista_id" => $data->id))',
					'buttonOptions' => [
						'class' => 'btn', 
					
					],
					'options' => ['class' => 'btn'],
				],
			],
	),
	array(
		'class' => 'CButtonColumn',
		'template' => '{reporterev}',
		'buttons' => [
			'reporterev' => [
				'label' => '<div class="btn btn-secondary custom-btn" title="">Exportar</div >',
				'url' => 'Yii::app()->createUrl("site/ca_reporte_lista_verificacion", array("lista" => $data->id))',
				'buttonOptions' => [
					'class' => 'btn', 
				
				],
			],
		],
	)
	),
)); 
$p=CaPlanAuditoria::model()->findbyAttributes(array('auditoria'=>$lista));
$l=CaListaVerificacion::model()->findbyAttributes(array('auditoria_id'=>$lista));
if($l==null){
	
	echo  '
	<div class="row" >
		<div class="col-md-12 d-flex justify-content-center align-items center " ><a class="btn btn-light custom-btn col-md-6" style="text-align: center;border:2px lightgrey solid;border-radius:20px" href=" '.CController::createUrl("/CaListaVerificacion/Create",array('lista'=>$lista)).' "><h5 style="color: #454545;text-align:center;font-family:Bahnschrift">Crear Nueva Lista de Verificación</h5></a>
	
		</div>
		
	
	</div>';}
// if($p!=null){
// 	if($l!=null){
 
// 	echo '<div class="row" >
// 	<div class="col-xs-6  ">
// 	</div><div class="col-xs-2"</div>
// 	</div><div class="col-xs-2" ><a class="btn btn-primary" style="text-align: center" href=" '.CController::createUrl("/CaInformeAuditoria/Admin",array('audit_id'=>$lista)).' "><h5 style="color: white;text-align:center"> Informe de Auditoría</h5></a>

// 	</div>
// 		<div class="col-xs-2 " ><a class="btn btn-primary" style="text-align: center" href=" '.CController::createUrl("/CaEvaluacionAuditor/Admin",array('id_plan_ev'=>$lista)).' "><h5 style="color: white;text-align:center">Evaluación de Auditores</h5></a>

// 	</div>
	

// </div>'
//  ; }};?>
</div>
</div>
</div>
</div>
</div>