	
<?php


							
/* @var $this CaAuditorController */
/* @var $model CaAuditor */
$uo=Yii::app()->user->areaid;


$a=0;
if ($vista=='papelera') {
	$a=1;
}
$b="";
if ($vista=='papelera') {
	$b='{delete}{restore}';
}else {
	$b='{view}{update}{delete}';
}
$c="";
$d="";
if ($vista=='papelera') {
	$c="Papelera de auditores";
	$d="trash";
}else{
	$c="Lista de Auditores";
	$d="user";
}



if ($vista=='papelera'){
	$this->p2_PageTitle("person-check-fill", "$c", "Papelera", "Gestión de Auditores");}
	else{
		$this->p2_PageTitle("person-check-fill", "$c", "Listado", "Gestión de Auditores");
	}





$direc=CController::createUrl("CaAuditor/Admin",array('vista'=>'papelera'));
$icon="trash2";
$nomb='Papelera De Auditores';

if ($vista=='papelera'){ 
	$direc=CController::createUrl("CaAuditor/Admin"); 
	$icon="person";
	$nomb='Listado de Auditores';}

							


							foreach(Yii::app()->user->getFlashes() as $key =>$message)
{
	echo '<br><div class="alert alert-success alert-dismissible fade show ">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Hecho! </strong> '.$message.'
  </div>';
} 
if($uo==7)			
{$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ca-auditor-grid',
	'dataProvider'=>$model->search($a,$uo),
    'filter' => $model,
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
		
		'nombre_apellido',
		array(
			'name'=>'unidad',
			'value'=>'$data->Unidades->siglas',
		) , 
		
		array(
			'type'=>'html',
			'name'=>'correo',
			'value'=>'CHtml::link("$data->correo", "mailto:$data->correo")',
			
			'htmlOptions' => array ('style' => 'text-align: center;', 'width'=>'60'),),
		'cargo',
		// 'area',
		
		// 'region',
		// 'telf_movil',
		// 'telf_fijo',
		// 'competencia',
		// 'observaciones',
		'alcance',
		// 'expediente',
		array(
			'name' => 'disponibilidad',
			'value' => '($data->disponibilidad == 1) ? "Disponible" : "No disponible"',),
			// array(
			// 	'name' => 'evaluacion',
			// 	'value' => 'count(CaEvaluacionAuditor::model()->findAllByAttributes(array("auditor" => $data->id)))',
			// ),
		
		/*
		'equipo_de_auditores',
		'es_jefe',
		'es_papelera',
		*/
		array(
				'class'=>'CButtonColumn',
				 'template'=>$b,
				'deleteConfirmation'=>"js:'¿Seguro que desea eliminar este elemento?'",
				'afterDelete'=>"function(link,success,data){
					if(success){
						alert('Se ha eliminado el auditor correctamente.');
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
					'restore' => [
						'label' =>'<img src="./images/restore.png" title="Restaurar" style="width: 18px; height: 18px;">',
						'url' => 'Yii::app()->createUrl("caAuditor/update", array("id" => $data->id))',
						'options' => ['class' => 'btn restore', 'title' => 'Restaurar', 'aria-label' => 'Restaurar', 'data-toggle' => 'tooltip'],
					],
				],
		),array(
			'class' => 'CButtonColumn',
			'template' => '{documento}',
			'buttons' => [
				'documento' => [
					'label' => '<span class="bi bi-archive btn btn-secondary custom-btn custom-tooltip" title="" style="font-size:19px"><div class="custom-tooltiptext" style="font-size:15px">Expediente del Auditor</div></span >',
					'url' => 'Yii::app()->createUrl("caDocumento/admin", array("audit" => $data->id, "audit_nombre" => $data->nombre_apellido))',
					'buttonOptions' => [
						'class' => 'btn ', 
					
					],
				],
			],
		),
	),
));
if($vista=='papelera'){
	echo'<div class="row d-flex d-flex justify-content-center vh-3">
	<div class="col-xs-2 d-flex d-flex justify-content-center align-items-center" >
	<a  class="btn btn-secondary custom-btn col-md-6" style="text-align: center;border-radius:20px;font-size:22px;color:white;font-family:Bahnschrift" href="'.$direc.'"</a>
	<span style="color:lightwhite" class="bi bi-arrow-right" aria-hidden="true" ></span>
	<span style="color:lightwhite" class="bi bi-'.$icon.'" aria-hidden="true" ></span> '.$nomb.'
	<span style="color:lightwhite" class="bi bi-arrow-left" aria-hidden="true" ></span>
								</a>
								</div></div>';}
if($vista!='papelera'){
echo '<div class="col-md-12 d-flex d-flex " ><a  class="btn btn-secondary custom-btn col-md-5" style="text-align: center;border-radius:20px;font-size:22px;color:white;font-family:Bahnschrift" href="'.$direc.'"</a>
<span style="color:lightwhite" class="bi bi-arrow-right" aria-hidden="true" ></span>
	<span style="color:lightwhite" class="bi bi-'.$icon.'" aria-hidden="true" ></span> '.$nomb.'
	<span style="color:lightwhite" class="bi bi-arrow-left" aria-hidden="true" ></span>

                            </a><div class="col-md-1"></div><a class="btn btn-secondary custom-btn col-md-3 d-flex justify-content-center " style="text-align: center;border-radius:20px;font-size:22px;color:white;font-family:Bahnschrift" href=" '.CController::createUrl("/site/ca_listado_auditores").' "><span class="bi-file-earmark">&nbsp  </span> Generar Reporte</a><h6 style="color:white">a</h6>
							<a class="btn btn-secondary custom-btn col-md-3 d-flex justify-content-center align-self-right" style="text-align: center;border-radius:20px;font-size:22px;color:white;font-family:Bahnschrift" href=" '.CController::createUrl("/site/excel").' "><span class="bi-file-earmark-spreadsheet">&nbsp  </span> Guardar como Excel</a>

</div>' ;}
}

else
{$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ca-auditor-grid',
	'dataProvider'=>$model->search($a,$uo),
    'filter' => $model,
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
		
		'nombre_apellido',
	
		
		array(
			'type'=>'html',
			'name'=>'correo',
			'value'=>'CHtml::link("$data->correo", "mailto:$data->correo")',
			
			'htmlOptions' => array ('style' => 'text-align: center;', 'width'=>'60'),),
		'cargo',
		// 'area',
		
		// 'region',
		// 'telf_movil',
		// 'telf_fijo',
		// 'competencia',
		// 'observaciones',
		'alcance',
		// 'expediente',
		array(
			'name' => 'disponibilidad',
			'value' => '($data->disponibilidad == 1) ? "Disponible" : "No disponible"',),
			// array(
			// 	'name' => 'evaluacion',
			// 	'value' => 'count(CaEvaluacionAuditor::model()->findAllByAttributes(array("auditor" => $data->id)))',
			// ),
		
		/*
		'equipo_de_auditores',
		'es_jefe',
		'es_papelera',
		*/
		array(
				'class'=>'CButtonColumn',
				'template'=>$b,
				'deleteConfirmation'=>"js:'¿Seguro que desea eliminar este elemento?'",
				'afterDelete'=>"function(link,success,data){
					if(success){
						alert('Se ha eliminado el auditor correctamente.');
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
					'restore' => [
						'label' =>'<img src="./images/restore.png" title="Restaurar" style="width: 18px; height: 18px;">',
						'url' => 'Yii::app()->createUrl("caAuditor/update", array("id" => $data->id))',
						'options' => ['class' => 'btn restore', 'title' => 'Restaurar', 'aria-label' => 'Restaurar', 'data-toggle' => 'tooltip'],
					],
				],
		),array(
			'class' => 'CButtonColumn',
			'template' => '{documento}',
			'buttons' => [
				'documento' => [
					'label' => '<span class="bi bi-archive btn btn-secondary custom-btn custom-tooltip" title="" style="font-size:19px"><div class="custom-tooltiptext" style="font-size:15px">Expediente del Auditor</div></span >',
					'url' => 'Yii::app()->createUrl("caDocumento/admin", array("audit" => $data->id, "audit_nombre" => $data->nombre_apellido))',
					'buttonOptions' => [
						'class' => 'btn ', 
					
					],
				],
			],
		),
	),
));
if($vista=='papelera'){
	echo'<div class="row d-flex d-flex justify-content-center vh-3">
	<div class="col-xs-2 d-flex d-flex justify-content-center align-items-center" >
	<a  class="btn btn-secondary custom-btn col-md-6" style="text-align: center;border-radius:20px;font-size:22px;color:white;font-family:Bahnschrift" href="'.$direc.'"</a>
	<span style="color:lightwhite" class="bi bi-arrow-right" aria-hidden="true" ></span>
	<span style="color:lightwhite" class="bi bi-'.$icon.'" aria-hidden="true" ></span> '.$nomb.'
	<span style="color:lightwhite" class="bi bi-arrow-left" aria-hidden="true" ></span>
								</a>
								</div></div>';}
if($vista!='papelera'){
echo '<div class="col-md-12 d-flex d-flex " ><a  class="btn btn-secondary custom-btn col-md-5" style="text-align: center;border-radius:20px;font-size:22px;color:white;font-family:Bahnschrift" href="'.$direc.'"</a>
<span style="color:lightwhite" class="bi bi-arrow-right" aria-hidden="true" ></span>
	<span style="color:lightwhite" class="bi bi-'.$icon.'" aria-hidden="true" ></span> '.$nomb.'
	<span style="color:lightwhite" class="bi bi-arrow-left" aria-hidden="true" ></span>


                            </a><div class="col-md-3"></div><a class="btn btn-secondary custom-btn col-md-4 d-flex justify-content-center align-self-right" style="text-align: center;border-radius:20px;font-size:22px;color:white;font-family:Bahnschrift" href=" '.CController::createUrl("/site/ca_listado_auditores").' "><span class="bi-file-earmark">&nbsp  </span> Generar Reporte</a>
							
</div>' ;}}
?>
</div>
</div>
</div>
</div>
</div>


 

							