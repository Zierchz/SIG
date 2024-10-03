<style>
	tr {
        text-align: center;
    }
	</style>

<?php
$template='{view}{delete}{update}';
$unidad=Yii::app()->user->areaid;


/* @var $this CaProgramaAuditoriaController */
/* @var $model CaProgramaAuditoria */

$this->p2_PageTitle("calendar-event", "Programa Anual de Auditorías","Listado","Gestión de Programas Anuales");

if($unidad==7)
{$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ca-programa-auditoria-grid',
	'dataProvider'=>$model->search1($unidad),
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
		//  'unidad_rectora',
		// 'unidad_a_auditar',
		array(
            'name' => 'unidad_rectora',
            'value' => '$data->idUnidad->siglas',
			
        ),
		array(
            'name' => 'unidad_a_auditar',
            'value' => '$data->idUnidadAAuditar->siglas',
        ),
      
		'anno',
		// 'objetivos_programa',
		// 'riesgos_programa',
		
		array(
            'name' => 'Enero',
            'value' => '$data->Enero !== "" ? $data->Enero : "---"',
        ),
        array(
            'name' => 'Febrero',
            'value' => '$data->Febrero !== "" ? $data->Febrero : "---"',
        ),
        array(
            'name' => 'Marzo',
            'value' => '$data->Marzo !== "" ? $data->Marzo : "---"',
        ),
        array(
            'name' => 'Abril',
            'value' => '$data->Abril !== "" ? $data->Abril : "---"',
        ),
        array(
            'name' => 'Mayo',
            'value' => '$data->Mayo !== "" ? $data->Mayo : "---"',
        ),
        array(
            'name' => 'Junio',
            'value' => '$data->Junio !== "" ? $data->Junio : "---"',
        ),
        array(
            'name' => 'Julio',
            'value' => '$data->Julio !== "" ? $data->Julio : "---"',
        ),
        array(
            'name' => 'Agosto',
            'value' => '$data->Agosto !== "" ? $data->Agosto : "---"',
        ),
        array(
            'name' => 'Septiembre',
            'value' => '$data->Septiembre !== "" ? $data->Septiembre : "---"',
        ),
        array(
            'name' => 'Octubre',
            'value' => '$data->Octubre !== "" ? $data->Octubre : "---"',
        ),
        array(
            'name' => 'Noviembre',
            'value' => '$data->Noviembre !== "" ? $data->Noviembre : "---"',
        ),
        array(
            'name' => 'Diciembre',
            'value' => '$data->Diciembre !== "" ? $data->Diciembre : "---"',
        ),
		//  'id_unidad',
		
		array(
				'class'=>'CButtonColumn',
                'template'=>$template,
				'deleteConfirmation'=>"js:'¿Seguro que desea eliminar este elemento?'",
                'afterDelete'=>"function(link,success,data){
					if(success){
						alert('Se ha eliminado el programa correctamente.');
					}
									}",
				
                                    'buttons'=>['delete'=>['label'=>'Eliminar',
                                    'options'=>['class'=>'btn delete']],
                                    'update'=>['label'=>'Modificar',
                                    'options'=>['class'=>'btn update']],
                                    'view'=>['label'=>'Mostrar datos',
                                    'options'=>['class'=>'btn view']],
				]
		),
	),
)); }
else{
    $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'ca-programa-auditoria-grid',
        'dataProvider'=>$model->search1($unidad),
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
                            'value'=>'++$row',
                            
                    ),
            // 'id',
            //  'unidad_rectora',
            // 'unidad_a_auditar',
            // array(
            //     'name' => 'unidad_rectora',
            //     'value' => '$data->idUnidadRectora->siglas',
                
            // ),
            array(
                'name' => 'unidad_a_auditar',
                'value' => '$data->idUnidadAAuditar->siglas',
            ),
          
            'anno',
            // 'objetivos_programa',
            // 'riesgos_programa',
            
            array(
                'name' => 'Enero',
                'value' => '$data->Enero !== "" ? $data->Enero : "---"',
            ),
            array(
                'name' => 'Febrero',
                'value' => '$data->Febrero !== "" ? $data->Febrero : "---"',
            ),
            array(
                'name' => 'Marzo',
                'value' => '$data->Marzo !== "" ? $data->Marzo : "---"',
            ),
            array(
                'name' => 'Abril',
                'value' => '$data->Abril !== "" ? $data->Abril : "---"',
            ),
            array(
                'name' => 'Mayo',
                'value' => '$data->Mayo !== "" ? $data->Mayo : "---"',
            ),
            array(
                'name' => 'Junio',
                'value' => '$data->Junio !== "" ? $data->Junio : "---"',
            ),
            array(
                'name' => 'Julio',
                'value' => '$data->Julio !== "" ? $data->Julio : "---"',
            ),
            array(
                'name' => 'Agosto',
                'value' => '$data->Agosto !== "" ? $data->Agosto : "---"',
            ),
            array(
                'name' => 'Septiembre',
                'value' => '$data->Septiembre !== "" ? $data->Septiembre : "---"',
            ),
            array(
                'name' => 'Octubre',
                'value' => '$data->Octubre !== "" ? $data->Octubre : "---"',
            ),
            array(
                'name' => 'Noviembre',
                'value' => '$data->Noviembre !== "" ? $data->Noviembre : "---"',
            ),
            array(
                'name' => 'Diciembre',
                'value' => '$data->Diciembre !== "" ? $data->Diciembre : "---"',
            ),
            //  'id_unidad',
            
            array(
                    'class'=>'CButtonColumn',
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
        ),
    ));  
}
 echo '<div class="col-md-12 d-flex d-flex justify-content-end" ><a class="btn btn-secondary custom-btn col-md-4 d-flex justify-content-center align-items-center" style="text-align: center;border-radius:20px;font-size:22px;color:white" href=" '.CController::createUrl("/site/ca_reporte_programa_auditoria",array("unidad" => $unidad)).' "><span class="bi-file-earmark">&nbsp  </span> Generar Reporte</a>

</div>' ;
?>
</div>
</div>
</div>
</div>
</div>