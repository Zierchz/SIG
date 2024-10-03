<style>
	tr {
        text-align: center;
    }
	</style>

<?php


$template="{view}{delete}{update}";
$plan=null;

/* @var $this CaPlanAuditoriaController */
/* @var $model CaPlanAuditoria */
if(isset($_GET['plan']))
				$plan=$_GET['plan'];
$this->p2_PageTitle2("briefcase", "Plan de Auditorías","Listado","Gestión de Auditorías / Gestión de Planes");

$this->PPaudit('CaAuditoria','','','Regresar al Listado de Auditorías');

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ca-plan-auditoria-grid',
	'dataProvider'=>$model->search1($plan),
	// 'filter'=>$model,
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
		array(
			'name'=>'area',
            'value'=>'$data->Unidad->siglas'),
		'fecha_plan',
		'objetivo_plan',
		'alcance',
		
		
		'plan_elaborado_por',
		// 'plan_aprobado_por',
		// 'plan_revisado_por',
		// 'auditoria',
	
		
		array(
				'class'=>'CButtonColumn',
				'template'=>$template,
				'deleteConfirmation'=>"js:'¿Seguro que desea eliminar este elemento?'",
				'afterDelete'=>"function(link,success,data){
					if(success){
						location.reload();
						alert('Se ha eliminado el plan correctamente.');
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
					'label' => '<span class="bi bi-columns-gap btn btn-secondary custom-btn custom-tooltip" title="" style="font-size:19px"><div class="custom-tooltiptext" style="font-size:15px">Actividades</div></span >',
					'url' => 'Yii::app()->createUrl("caActividad/admin", array("plan_id" => $data->id))',
					'buttonOptions' => [
						'class' => 'btn btn-secondary',
					],
				],
			],
		),
		array(
			'class' => 'CButtonColumn',
			'template' => '{proceso}',
			'buttons' => [
				'proceso' => [
					'label' => '<span class="bi bi-people-fill btn btn-secondary custom-btn custom-tooltip" title="" style="font-size:19px"><div class="custom-tooltiptext" style="font-size:15px">Equipo de Auditores</div></span >',
					'url' => 'Yii::app()->createUrl("caEquipoAuditor/admin", array("plan_id" => $data->auditoria))',
					'buttonOptions' => [
						'class' => 'btn', 
					
					],
				],
			],
	),array(
		'class' => 'CButtonColumn',
		'template' => '{reporterev}',
		'buttons' => [
			'reporterev' => [
				'label' => '<div class="btn btn-secondary custom-btn" title="" >Exportar</div >',
				'url' => 'Yii::app()->createUrl("site/ca_reporte_plan_auditoria", array("plan" => $data->id))',
				'buttonOptions' => [
					'class' => 'btn', 
				
				],
			],
		],
	),
))); 
$p=CaPlanAuditoria::model()->findbyAttributes(array('auditoria'=> $plan));
$l=CaListaVerificacion::model()->findbyAttributes(array('auditoria_id'=>$plan));
$e=CaEquipoAuditor::model()->findAllByAttributes(array('plan_audit'=>$plan));

if($p==null){

 echo  '
  <div class="row" >
      <div class="col-md-12 d-flex justify-content-center align-items center " ><a class="btn btn-light custom-btn col-md-6" style="text-align: center;border:2px lightgrey solid;border-radius:20px" href=" '.CController::createUrl("/CaPlanAuditoria/Create",array('plan'=>$plan)).' "><h5 style="color: #454545;text-align:center;font-family:Bahnschrift">Crear Nuevo Plan de Auditoría</h5></a>
  
      </div>
      
  
  </div>';}
  
	
// 	echo '
// 	<div class="col-xs-7 " ></div>
// 	<div class="col-xs-2" ><a class="btn btn-light" style="text-align: center" href=" '.CController::createUrl("/CaInformeAuditoria/Admin",array('audit_id'=>$plan)).' "><h5 style="color: white;text-align:center"> Informe de Auditoría</h5></a>

// 	</div>';


// if($e!=null){
// 	echo '<div class="col-xs-2 " ><a class="btn btn-primary" style="text-align: center" href=" '.CController::createUrl("/CaEvaluacionAuditor/Admin",array('id_plan_ev'=>$plan)).' "><h5 style="color: white;text-align:center">Evaluación de Auditores</h5></a>

// </div><div class="col-xs-1 " ></div>
// '
// ; }
  ?>
</div>
</div>
</div>
</div>
</div>