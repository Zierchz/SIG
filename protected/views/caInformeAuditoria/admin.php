<style>
	tr {
        text-align: center;
    }
	</style>

<?php





$template='{view}{delete}{update}';
$audit_id=null;

if(isset($_GET['audit_id']))
				$audit_id=$_GET['audit_id'];

/* @var $this CaInformeAuditoriaController */
/* @var $model CaInformeAuditoria */
$this->p2_PageTitle2("card-checklist", "Informe de Auditoría","Listado","Gestión de Auditorías / Gestión de Informes");

$this->PPaudit('CaAuditoria','','','Regresar al Listado de Auditorías');

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ca-informe-auditoria-grid',
	'dataProvider'=>$model->search1($audit_id),
	'summaryText' => 'Mostrando {start} a {end} de {count} resultados',
    'emptyText' => 'No se encontraron elementos', 
	'afterAjaxUpdate' => 'refrescar',

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
		'fecha_informe',
		'objetivo_auditoria',
		'alcance',
		'representantes',
		// 'rutas',
		
		// 'hallazgos',
		// 'evaluacion',
		// 'conclusiones',
		// 'audit_id',
		
		array(
				'class'=>'CButtonColumn',
				'template'=>$template,
				'deleteConfirmation'=>"js:'¿Seguro que desea eliminar este elemento?'",
				'afterDelete'=>"function(link,success,data){
					if(success){
						location.reload();
						alert('Se ha eliminado el informe correctamente.');
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
		),array(
			'class' => 'CButtonColumn',
			'template' => '{documento}',
			'buttons' => [
				'documento' => [
					'label' => '<span class="bi bi-archive btn btn-secondary custom-btn custom-tooltip" title="" style="font-size:19px"><div class="custom-tooltiptext" style="font-size:15px"> &nbspDocumentos de&nbsp Auditoría</div></span >',
					'url' => 'Yii::app()->createUrl("caDocumentoInforme/admin", array("id_informe" => $data->id))',
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
					'label' => '<div class="btn btn-secondary custom-btn" title="" >Exportar</div >',
					'url' => 'Yii::app()->createUrl("site/ca_reporte_informe_auditoria", array("informe" => $data->id))',
					'buttonOptions' => [
						'class' => 'btn', 
					
					],
                ],
            ],
        ),

    ),
	
	
));
$plan=CaPlanAuditoria::model()->findbyAttributes(array('auditoria'=>$audit_id));
$p=CaInformeAuditoria::model()->findbyAttributes(array('audit_id'=>$audit_id));
if($plan!=null){
if($p==null){

	echo  '
	<div class="row" >
		<div class="col-md-12 d-flex justify-content-center align-items center " ><a class="btn btn-light custom-btn col-md-6" style="text-align: center;border:2px lightgrey solid;border-radius:20px" href=" '.CController::createUrl("/CaInformeAuditoria/Create",array('audit_id'=>$audit_id)).' "><h5 style="color: #454545;text-align:center;font-family:Bahnschrift">Crear Nuevo Informe de Auditoría</h5></a>
	
		</div>
		
	
	</div>';}
}



	?>

</div>
</div>
</div>
</div>
</div>





<script type="text/javascript">
    $(document).ready(function() {
        refrescar();
    });

    function refrescar() {
  
  // Elimina la llamada a location.reload() aquí
  
  <?php
    $p = CaInformeAuditoria::model()->findbyAttributes(array('audit_id' => $audit_id));
    if ($p == null) {
  ?>
      $('#reporte').removeClass('collapse');
  <?php } else { ?>
      $('#reporte').addClass('collapse');
  <?php } ?>
  
  // Ejecutar el location.reload() y ejecutar una función callback después de 2 minutos

    //   location.reload();
  } 
</script>