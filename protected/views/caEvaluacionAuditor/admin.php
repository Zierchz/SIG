<style>
	tr {
        text-align: center;
    }
	</style>

<?php
$template='{view}{delete}';
$evento_noti=null;
$id=null;
if(isset($_GET['evento_noti']))
$evento_noti=$_GET['evento_noti'];
if(isset($_GET['id']))
$id=$_GET['id'];
$ev=CaEvaluacionAuditor::model()->findByPK($evento_noti);
if($id!=null){
CaNotificaciones::model()->deleteByPK($id);}

if($ev!=null){
	
	$a=CaAuditor::model()->findByPk($ev->auditor);
	
	CaEvaluacionAuditor::model()->deleteByPK($evento_noti);
	
	Yii::app()->user->setFlash('error', 'Se ha eliminado la evaluación correspondiente a '.$a->nombre_apellido.'. Por favor, créela una vez más con los datos actualizados.');

}

$id_plan_ev=null;
if(isset($_GET['id_plan_ev']))
				$id_plan_ev=$_GET['id_plan_ev'];

/* @var $this CaEvaluacionAuditorController */
/* @var $model CaEvaluacionAuditor */
$this->p2_PageTitle2("person-vcard-fill", "Evaluación de Auditor","Listado","Gestión de Auditorías / Gestión de Evaluaciones");

$this->PPaudit('CaAuditoria','','','Regresar al Listado de Auditorías');

foreach(Yii::app()->user->getFlashes() as $key =>$message)
{
	echo '<br><div class="alert alert-warning alert-dismissible fade show ">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Atención! </strong> '.$message.'
  </div>';
} 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ca-evaluacion-auditor-grid',
	'dataProvider'=>$model->search1($id_plan_ev),
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
		// 'id',
		// 'id_plan_ev',
		//  'auditor',
		// 
		// 'auditor',
		'nombre_auditor',

		
		// 'area',
		'fecha_evaluacion',
		// 'observaciones',
		'evaluacion_final',
		// 'aceptado',
		// 'conforme',
	
		
		array(
			'class'=>'CButtonColumn',
			'template'=>$template,
			'deleteConfirmation'=>"js:'¿Seguro que desea eliminar este elemento?'",
			'afterDelete'=>"function(link,success,data){
				if(success){
					location.reload();
					alert('Se ha eliminado la evaluación correctamente.');
				}
			}",
			'buttons'=>array(
				'delete'=>['label'=>'Eliminar',
						'options'=>['class'=>'btn delete']],
						
						'view'=>['label'=>'Mostrar datos',
						'options'=>['class'=>'btn view']],
				'update'=>array(
					'label'=>'Modificar',
					'url' => 'Yii::app()->createUrl("CaEvaluacionAuditor/update", array("id" => $data->id, "id_plan_ev"=>$data->id_plan_ev))',
					'options'=>['class'=>'btn update'],
				),
			)
		),
		array(
			'class' => 'CButtonColumn',
			'template' => '{reporterev}',
			'buttons' => [
				'reporterev' => [
					'label' => '<div class="btn btn-secondary custom-btn" title="">Exportar</div >',
					'url' => 'Yii::app()->createUrl("site/ca_reporte_evaluacion_auditor", array("evaluacion" => $data->id))',
					'buttonOptions' => [
						'class' => 'btn', 
					
					],
					'options' => ['class' => 'btn'],
				],
			],
		)
	),
)); 
$nombre=Yii::app()->user->fullname;

$a=CaAuditor::model()->findByAttributes(array('nombre_apellido'=>$nombre, 'equipo_de_auditores'=>$id_plan_ev, 'es_jefe'=>1));
$lider=CaEquipoAuditor::model()->findByAttributes(array('funcion'=>'jefe','plan_audit'=>$id_plan_ev));

$equipo=CaEquipoAuditor::model()->findAllByAttributes(array('funcion'=>'miembro','plan_audit'=>$id_plan_ev));

$equipo1=CaEquipoAuditor::model()->findAllByAttributes(array('funcion'=>'formacion','plan_audit'=>$id_plan_ev));
$auditores = array_merge($equipo, $equipo1);

if($a!=null||Yii::app()->user->roleid==34){
if($lider!=null&&$auditores!=null)	
{echo ' <div class="row" >
<div class="col-md-12 d-flex justify-content-center align-items center " ><a class="btn btn-light custom-btn col-md-6" style="text-align: center;border:2px lightgrey solid;border-radius:20px" href=" '.CController::createUrl("/CaEvaluacionAuditor/Create",array('id_plan_ev'=>$id_plan_ev)).' "><h5 style="color: #454545;text-align:center;font-family:Bahnschrift">Crear Nueva Evaluación de Auditor</h5></a>

</div>


</div>';}}


// $equipo=CaAuditor::model()->findAllByAttributes(array('equipo_de_auditores'=>$id_plan_ev, 'es_jefe'=>0));
// $terminada=true;
// foreach($equipo as $auditor){
// 	$ev=CaEvaluacionAuditor::model()->findByAttributes(array('auditor'=>$auditor->id));
// 	if($ev!=null){

	
// 	if($ev->aceptado==0){
// 		$terminada=false;
// 	}
// }}
// if($terminada==true){
// 	$equipo=CaAuditor::model()->findAllByAttributes(array('equipo_de_auditores'=>$id_plan_ev));
// foreach($equipo as $auditor){
// 	CaAuditor::model()->updatebyPK($auditor->id, array('equipo_de_auditores' => 0, 'es_jefe'=>0, 'disponibilidad'=>1));
// 	CaAuditoria::model()->updatebyPK($id_plan_ev, array('terminada'=>'Sí'));
// }

// }

?>
