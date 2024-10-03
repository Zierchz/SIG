
<?php 

$doc=new CaDocumento('search');
$uni=UnidadOrganizativa::model()->findByPk($model->unidad);


// $n=$do->categoria;
// var_dump($n);die;

/* @var $this CaAuditorController */
/* @var $model CaAuditor */
// $this->myBreadCrumb("Auditores","CaAuditor","Mostrar datos de Auditores");
$this->p2_PageTitle("person-check-fill", "Lista de Auditores", "Mostrar Datos", "Gestión de Auditores");

?>
<!-- <div class="container">
<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item col-md-6" role="presentation">
					<button class="nav-link active " id="a-tab" data-bs-toggle="tab" data-bs-target="#a" type="button" role="tab" aria-controls="a" aria-selected="true" style="color:#454545;font-size:25px;width:400px;font-family:Bahnschrift"><strong>Datos del Auditor</strong></button>
				</li>
<li class="nav-item col-md-6" role="presentation">
		          	<button class="nav-link " id="b-tab" data-bs-toggle="tab" data-bs-target="#b" type="button" role="tab" aria-controls="b" aria-selected="false" style="color:#454545;font-size:25px;width:400px;font-family:Bahnschrift"><strong>Expediente del Auditor</strong> </button>
		        </li>
    </ul>

    
    <div class="tab-content pt-2" id="myTabContent">  
	<div class="tab-pane fade show active" id="a">       -->
            <?php
			foreach(Yii::app()->user->getFlashes() as $key =>$message)
			{
				echo '<br><div class="alert alert-warning alert-dismissible fade show ">
				<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
				<strong>Atención! </strong> '.$message.'
			  </div>';
			} 
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'id',
		'nombre_apellido',
		// array(
        //     'name'=>'nombre',
        //     'value'=>$model->nombre0->nombre_apellidos),
		array(
			'name'=>'unidad',
			'value'=>"$uni->siglas"),
		'correo',
		'cargo',
		'area',
		'region',
		'telf_movil',
		'telf_fijo',
		'competencia',
		// 'observaciones',
		// 'expediente',
		 'alcance',
		// 'equipo_de_auditores',
		// 'es_jefe',
		// 'evaluacion',
		// 'es_papelera',
		
	),
));?>
 
        <!-- </div>
        <div class="tab-pane fade show" id="b">
         
			<?php
			
            $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ca-documento-grid',
	'dataProvider'=>$doc->search1($model->id),
	// 'filter'=>$doc,
	'summaryText' => 'Mostrando {start} a {end} de {count} resultados',
	'pager'=>array(
		'header' => 'Ir a la pagina:',
		'firstPageLabel' => '< <',
		'prevPageLabel' => 'Anterior',
		'nextPageLabel' => 'Siguiente',
		'lastPageLabel' => '>>;'
	),
	
	'columns'=>array(
				// array('header'=>'No.',
				// 		'value'=>'++$row',
				// ),
		// 'id',
		'url',
		// 'auditor',
		// 'fecha_creacion',
		// 'autor',
		// 'unidad_o',
		
		// 'observaciones',
		'categoria',
		
		
		array(
				'class'=>'CButtonColumn',
				'template'=>'{download}',
				'deleteConfirmation'=>"js:'¿Seguro que desea eliminar este elemento?'",
				'buttons'=>['delete'=>['label'=>'Eliminar'],
						'view'=>['label'=>'Mostrar datos'],
						'download' => [ 
							
							'label' =>'<img src="./images/downl.png" title="Descargar" style="width: 12px; height: 14 px;">',
							'url' =>'"./calidaddocs/{$data->auditor}/expediente/{$data->url}"', 
							'buttonOptions' => ['class' => 'btn btn-info', 'title' => 'Descargar', 'aria-label' => 'Descargar', 'data-toggle' => 'tooltip'],
						'options' => ['class' => 'btn-restaurar'],
							 
						],
				]
		),
	),
));


echo  '
<div class="row  d-flex justify-content-end align-items-center" >
		<a class="btn btn-light col-md-4 custom-btn" style="text-align: center;border:2px lightgrey solid;border-radius:20px;font-size:22px;color:#454545font-family:Bahnschrift" href=" '.CController::createUrl("/CaDocumento/Admin",array('audit'=>$model->id,'audit_nombre'=>$model->nombre_apellido)).' "><span class="bi-file-earmark-fill">&nbsp  </span>Administrar Documentos</a>

	</div>'
?>

    </div>
	</div>
</div>




</div>
</div>
</div>
</div>
</div> -->
