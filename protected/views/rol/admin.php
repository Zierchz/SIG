<?php
/* @var $this RolController */
/* @var $model Rol */
$this->p2_PageTitle("person-badge", "Roles del Sistema", "Listado", "Gestión de Roles ");
foreach(Yii::app()->user->getFlashes() as $key =>$message)
{
	echo '<div class="alert alert-error" style="background-color: #ce8483">
			<button type="button" class="close" data-dismiss="alert">x</button>
			<span class="fa fa-warning"></span> <strong>'.$message.'</strong>
		</div>';
}
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rol-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'summaryText'=>'Mostrando {start} a {end} de {count} resultados',
					'pager'=>array(
					'header'=>'Ir a la pagina:',
					'firstPageLabel'=>'< <',
					'prevPageLabel'=>'Anterior',
					'nextPageLabel'=>'Siguiente',
					'lastPageLabel'=>'>>;'
					),
	'columns'=>array(
		//'id',
        array('header'=>'No.',
            'value'=>'++$row',
            'htmlOptions' => array ('style' => 'text-align: center;' ),
        ),
		'rol',
		'descripcion',
		array(
			'class'=>'CButtonColumn',
			'deleteConfirmation'=>"js:'¿Seguro que desea eliminar este elemento?'",
			'template'=>'{view}{update}{delete}',
			'buttons'=>['delete'=>['label'=>'Eliminar',
			'options'=>['class'=>'btn delete']],
			'update'=>['label'=>'Modificar',
			'options'=>['class'=>'btn update']],
			'view'=>['label'=>'Mostrar datos',
			'options'=>['class'=>'btn view']],            
                ],
            
		),
	),
)); ?>
</div>
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
