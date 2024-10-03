<style>
    *{
        font-family: Bahnschrift;
    }
    .card1 {
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2); /* Ajusta la sombra según tus preferencias */
  transition: all 0.5s ease; /* Transición suave */
  font-family: Bahnschrift;
}
.card1:hover {
  transform: translateY(-10px) scale(1.03); 
  

}
</style>

<?php
///* @var $this SiteController */
/* @var $this TareaController */
/* @var $model Tarea */
date_default_timezone_set("America/Havana");


//$this->pageTitle=Yii::app()->name;
$fecha_actual=date("d-M-Y");
$fecha = date('Y-m-d');

// $cmC=count($cm);
$auditores_en_papelera=CaAuditor::model()->findAllByAttributes(array("es_papelera"=>1));
$auditores_en_papelera_count=count($auditores_en_papelera);
$auditores=CaAuditor::model()->findAll();
$auditores_count=count($auditores);

$revisiones=CaRevisionDireccion::model()->findAll();
$revisiones_count=count($revisiones);
$programas=CaProgramaAuditoria::model()->findAll();
$programas_count=count($programas);
$auditorias=CaAuditoria::model()->findAll();
$auditorias_count=count($auditorias);
$evaluaciones=CaEvaluacionAuditor::model()->findAll();
$evaluaciones_count=count($evaluaciones);
$aceptadas=CaEvaluacionAuditor::model()->findAllByAttributes(array('aceptado'=>1));
$aceptadas_count=count($aceptadas);
$no_aceptadas=CaEvaluacionAuditor::model()->findAllByAttributes(array('aceptado'=>0));
$no_aceptadas_count=count($no_aceptadas);

// $cmcC=count($cmc);
// $ind=CmiIndicadores::model()->findAll();
// $indC=count($ind);
// $indP=CmiIndicadoresProceso::model()->findAll();
// $indPC=count($indP);
// $indOp=CmiIndicadoresOp::model()->findAll();
// $indOpC=count($indOp);
?>


<?php if(!Yii::app()->user->isGuest):
    $access = new AccessControlController(1);
    $access->actionRefresh();
?>

<?php if(Yii::app()->user->hasFlash('sinPermiso')):?>
    <div class="alert alert-danger" role="alert" >
      <?php echo Yii::app()->user->getFlash('sinPermiso'); ?>
    </div>
<?php endif; ?>

<?=$this->p2_PageTitle("grid-1x2","Sistema Integrado de Gestión", "Datos Generales del Sistema", "Dashboard");?>

<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="row">
                <?=$this->p2_StatsCardAlert("Auditores Almacenados en el Banco",$auditores_count,"bi bi-person-check-fill","De los cuales ".$auditores_en_papelera_count." "."se encuentran almacenados en la Papelera","CaAuditor");?>
                <?=$this->p2_StatsCardAlert("Evaluaciones Realizadas",$evaluaciones_count,"bi bi-clipboard-check","De las cuales $aceptadas_count han sido aceptadas y $no_aceptadas_count siguen sin aceptación","CaAuditoria");?>
                <?=$this->p2_StatsCardAlert("Programas Anuales de Auditoría","$programas_count","bi bi-calendar-event","Y un total de $auditorias_count Auditorías","CaProgramaAuditoria");?>

            </div>
        </div>
        <?php
        if(Yii::app()->user->roleid==3){
            ?>
        <div class="col-lg-4">
            <div class="card card1">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li><a class="dropdown-item" href="index.php?r=Trazas/Admin">Ver todas</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title" style="color:#092254;text-align:center;font-family:Bahnschrift;">Actividad reciente </h5>
                    <div class="activity">
                    <?php 
                   $act_reciente = Trazas::model()->findAll();
                   rsort($act_reciente);
                   
                   // Obtener el número de trazas disponibles
                   $num_trazas = count($act_reciente);
                   
                   // Limitar el bucle a 9 o al número de trazas disponibles, lo que sea menor
                   $limit = min($num_trazas, 9);
                   
                   for ($i = 0; $i < $limit; $i++) {
                       $act = $act_reciente[$i];
                       echo '
                           <div class="activity-item d-flex">
                               <div class="activite-label" style="min-width: 0px;"></div>
                               <i class="bi bi-circle-fill activity-badge align-self-start" style="color:#092254"></i>
                               <div class="activity-content">
                                   ' . explode("desde", $act["resumen"])[0] . '
                               </div>
                           </div>
                       ';
                   }
                }
                    ?>
                    </div>
                </div>
            </div>
            <!-- End Recent Activity -->
        </div>
    </div>
</section>

<h4 class="page-header"></h4>
<br/>
<?php /*$this->myTableHeader("info","Noticias","Listado de Noticias", "Admin","Noticia","");?>
	<?php $model_not=new Noticia('search');?>
	<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'noticia-grid',
	'dataProvider'=>$model_not->search(),
	'filter'=>$model_not,
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
		//'id',
		'titulo',
		'descripcion',
		'autor',
		'fecha',
		array(
			'class'=>'CButtonColumn',
			'deleteConfirmation'=>"js:'¿Seguro que desea eliminar este elemento?'",
			'buttons'=>['delete'=>['visible'=>'($data->autor == Yii::app()->user->name?true:Yii::app()->user->name=="admin"?true:false)', 'label'=>'Eliminar','url'=>'CController::createUrl("/Noticia/delete",array("id"=>$data->primaryKey))'],
					'update'=>['visible'=>'($data->autor == Yii::app()->user->name?true:Yii::app()->user->name=="admin"?true:false)','label'=>'Modificar','url'=>'CController::createUrl("/Noticia/update",array("id"=>$data->primaryKey))'],
					'view'=>['visible'=>'($data->id == "")','label'=>'Mostrar datos'],
			]
		),
	),
));*/ ?>
			
			
			
	 
	 
<script src="plugins/jquery/jquery-2.1.0.min.js"></script>
<script>
Highcharts.chart('container', {
    chart: {
        type: 'variablepie'
    },
    title: {
        text: 'Countries compared by population density and total area.'
    },
    tooltip: {
        headerFormat: '',
        pointFormat: '<span style="color:{point.color}">\u25CF</span> <b> {point.name}</b><br/>' +
            'Area (square km): <b>{point.y}</b><br/>' +
            'Population density (people per square km): <b>{point.z}</b><br/>'
    },
    series: [{
        minPointSize: 10,
        innerSize: '20%',
        zMin: 0,
        name: 'countries',
        data: [{
            name: 'Spain',
            y: 505370,
            z: 92.9
        }, {
            name: 'France',
            y: 551500,
            z: 118.7
        }, {
            name: 'Poland',
            y: 312685,
            z: 124.6
        }, {
            name: 'Czech Republic',
            y: 78867,
            z: 137.5
        }, {
            name: 'Italy',
            y: 301340,
            z: 201.8
        }, {
            name: 'Switzerland',
            y: 41277,
            z: 214.5
        }, {
            name: 'Germany',
            y: 357022,
            z: 235.6
        }]
    }]
});
</script>
    
	<?php ?>
			<?php endif?>

            