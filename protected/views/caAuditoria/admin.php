
<?php


/* @var $this CaAuditoriaController */
/* @var $model CaAuditoria */
$uo=Yii::app()->user->areaid;
$template='';

$this->p2_PageTitle2("search", "Auditorías","Listado","Gestión de Auditorías");

if($uo==7){
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ca-auditoria-grid',
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
		// 'id',
		// 'unidad_aud',
		// 'unidad_rec',
		'Anno',
		'mes',
        'fecha_A',
		array(
            'name' => 'unidad_rec',
            'value' => '$data->idUnidadRectora1->siglas',
			
        ),
		array(
            'name' => 'unidad_aud',
            'value' => '$data->idUnidadAAuditar1->siglas',
        ),
		'tipo',
        // 'objetivo',
		// 'programa',
		// 'observaciones',
        'terminada',
		// array(
		// 		'class'=>'CButtonColumn',
		// 		'template'=>$template,
		// 		'deleteConfirmation'=>"js:'¿Seguro que desea eliminar este elemento?'",
        //         'afterDelete'=>"function(link,success,data){
		// 			if(success){
		// 				alert('Se ha eliminado la auditoría correctamente.');
		// 			}
		// 							}",
		// 		'buttons'=>['delete'=>['label'=>'Eliminar'],
		// 				'update'=>['label'=>'Modificar'],
		// 				'view'=>['label'=>'Mostrar datos'],
		// 		]
		// ),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{plan}',
			'buttons'=>['delete'=>['label'=>'Eliminar'],
					'update'=>['label'=>'Modificar'],
					'view'=>['label'=>'Mostrar datos'],
					'plan' => [
						'label' => '<span class="bi bi-briefcase btn btn-secondary custom-btn custom-tooltip" title="" style="font-size:19px"><div class="custom-tooltiptext" style="font-size:15px">&nbspPlan de Auditoría</div></span >',
						'url' => 'Yii::app()->createUrl("caPlanAuditoria/admin", array("plan" => $data->id))',
						'buttonOptions' => [
                            'class' => 'btn', 
                        
                        ],
					],
					
			]
	),array(
		'class'=>'CButtonColumn',
		'template'=>'{lista}',
		'buttons'=>['delete'=>['label'=>'Eliminar'],
				'update'=>['label'=>'Modificar'],
				'view'=>['label'=>'Mostrar datos'],
				'lista' => [
					'label' => '<span class="bi bi-list-check btn btn-secondary custom-btn custom-tooltip" title="" style="font-size:19px"><div class="custom-tooltiptext" style="font-size:15px">Lista de Verificación</div></span >',
					'url' => 'Yii::app()->createUrl("caListaVerificacion/admin", array("lista" => $data->id))',
					'buttonOptions' => ['class' => 'btn ', 'title' => 'Plan', 'aria-label' => 'Plan', 'data-toggle' => 'tooltip'],
				],
				
		]
),array(
    'class'=>'CButtonColumn',
    'template'=>'{informe}',
    'buttons'=>['delete'=>['label'=>'Eliminar'],
            'update'=>['label'=>'Modificar'],
            'view'=>['label'=>'Mostrar datos'],
            'informe' => [
				'label' => '<span class="bi bi-card-checklist btn btn-secondary custom-btn custom-tooltip" title="" style="font-size:19px"><div class="custom-tooltiptext" style="font-size:15px">Informe de Auditoría</div></span >',
				'url' => 'Yii::app()->createUrl("caInformeAuditoria/admin", array("audit_id" => $data->id))',
                'buttonOptions' => ['class' => 'btn ', 'title' => 'Plan', 'aria-label' => 'Plan', 'data-toggle' => 'tooltip'],
            ],
            
    ]
),array(
    'class'=>'CButtonColumn',
    'template'=>'{evaluacion}',
    'buttons'=>['delete'=>['label'=>'Eliminar'],
            'update'=>['label'=>'Modificar'],
            'view'=>['label'=>'Mostrar datos'],
            'evaluacion' => [
				'label' => '<span class="bi bi-person-vcard-fill btn btn-secondary custom-btn custom-tooltip" title="" style="font-size:19px"><div class="custom-tooltiptext" style="font-size:15px">Evaluación de Auditor</div></span >',
				'url' => 'Yii::app()->createUrl("caEvaluacionAuditor/admin", array("id_plan_ev" => $data->id))',
                'buttonOptions' => ['class' => 'btn ', 'title' => 'Plan', 'aria-label' => 'Plan', 'data-toggle' => 'tooltip'],
            ],
            
    ]
),
	
))); 
}
else{
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'ca-auditoria-grid',
		'dataProvider'=>$model->search($uo),
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
			// 'unidad_aud',
			// 'unidad_rec',
			'Anno',
			'mes',
			'fecha_A',
		
			array(
				'name' => 'unidad_aud',
				'value' => '$data->idUnidadAAuditar1->siglas',
			),
			'tipo',
			// 'objetivo',
			// 'programa',
			// 'observaciones',
			'terminada',
			array(
					'class'=>'CButtonColumn',
					'template'=>'{view}',
					'deleteConfirmation'=>"js:'¿Seguro que desea eliminar este elemento?'",
					'afterDelete'=>"function(link,success,data){
						if(success){
							alert('Se ha eliminado la auditoría correctamente.');
						}
										}",
					'buttons'=>['delete'=>['label'=>'Eliminar'],
							'update'=>['label'=>'Modificar'],
							'view'=>['label'=>'Mostrar datos'],
					]
			),
			array(
				'class'=>'CButtonColumn',
				'template'=>'{plan}',
				'buttons'=>				['delete'=>['label'=>'Eliminar',
									'imageUrl' => Yii::app()->baseUrl . './images/delete.png',
									'options'=>['class'=>'btn delete']],
									'update'=>['label'=>'Modificar',
									'imageUrl' => Yii::app()->baseUrl . './images/update.png',
									'options'=>['class'=>'btn update']],
									'view'=>['label'=>'Mostrar datos',
									'imageUrl' => Yii::app()->baseUrl . './images/view.png',
									'options'=>['class'=>'btn view']],
						'plan' => [
							'label' => '<span class="bi bi-briefcase btn btn-secondary custom-btn" title="Plan de Auditoría" style="font-size:25px"></span >',
							'url' => 'Yii::app()->createUrl("caPlanAuditoria/admin", array("plan" => $data->id))',
							'buttonOptions' => [
								'class' => 'btn', 
							
							],
						],
						
				]
		),array(
			'class'=>'CButtonColumn',
			'template'=>'{lista}',
			'buttons'=>['delete'=>['label'=>'Eliminar'],
					'update'=>['label'=>'Modificar'],
					'view'=>['label'=>'Mostrar datos'],
					'lista' => [
						'label' => '<span class="bi bi-list-check btn btn-secondary custom-btn" title="Lista de Verificación" style="font-size:25px"></span >',
						'url' => 'Yii::app()->createUrl("caListaVerificacion/admin", array("lista" => $data->id))',
						'buttonOptions' => ['class' => 'btn ', 'title' => 'Plan', 'aria-label' => 'Plan', 'data-toggle' => 'tooltip'],
					],
					
			]
	),array(
		'class'=>'CButtonColumn',
		'template'=>'{informe}',
		'buttons'=>['delete'=>['label'=>'Eliminar'],
				'update'=>['label'=>'Modificar'],
				'view'=>['label'=>'Mostrar datos'],
				'informe' => [
					'label' => '<span class="bi bi-card-checklist btn btn-secondary custom-btn" title="Informe de Auditoría" style="font-size:25px"></span >',
					'url' => 'Yii::app()->createUrl("caInformeAuditoria/admin", array("audit_id" => $data->id))',
					'buttonOptions' => ['class' => 'btn ', 'title' => 'Plan', 'aria-label' => 'Plan', 'data-toggle' => 'tooltip'],
				],
				
		]
	),array(
		'class'=>'CButtonColumn',
		'template'=>'{evaluacion}',
		'buttons'=>['delete'=>['label'=>'Eliminar'],
				'update'=>['label'=>'Modificar'],
				'view'=>['label'=>'Mostrar datos'],
				'evaluacion' => [
					'label' => '<span class="bi bi-person-vcard-fill btn btn-secondary custom-btn" title="Evaluación de Auditor" style="font-size:25px"></div></span >',
					'url' => 'Yii::app()->createUrl("caEvaluacionAuditor/admin", array("id_plan_ev" => $data->id))',
					'buttonOptions' => ['class' => 'btn ', 'title' => 'Plan', 'aria-label' => 'Plan', 'data-toggle' => 'tooltip'],
				],
				
		]
	),
		
	)));
}

?>
</div>
</div>
</div>
</div>
</div>


