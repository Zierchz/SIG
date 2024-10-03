<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Usuario', 'url'=>array('index')),
	//array('label'=>'Create Usuario', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuario-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->myBreadCrumb("Usuarios","Usuario","Listado de Usuarios");
$this->myHeader("Gestionar Usuarios");
$this->myTableHeader("users","Usuarios","Listado de Usuarios","Admin","Usuario",null);

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuario-grid',
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
		array(
			'type'=>'html',
			'name'=>'foto',
			'filter' => false,
			'value'=>'CHtml::image("img/fotos/".$data->getFoto(), "alt", array("width" => 70, "height" => 50,"class"=>"img-rounded"))',
			'htmlOptions' => array ('style' => 'text-align: center;', 'width'=>'70'),
		),
		//'username',
		'fullname',
		//'password',
		//'rol',
		'correo',
		// array(
        //     'name'=>'area',
        //     'value'=>'$data->area0->nombre',
        //     'header'=>'Área',
        // ),
        /*array(
            'name'=>'rol',
            'value'=>'$data->rol0->rol',
            'header'=>'Rol',
        ),
		'grupo',*/
		array(
				'class'=>'CButtonColumn',
				'deleteConfirmation'=>"js:'¿Seguro que desea eliminar este elemento?'",
				'buttons'=>['delete'=>['visible'=>'(Yii::app()->user->name == "")', 'label'=>'Eliminar'],
					'update'=>['visible'=>'(Yii::app()->user->name == "")','label'=>'Modificar'],
					'view'=>['url'=>'Yii::app()->createUrl("site/ficha",array("id"=>$data->id, "idx"=>"idx"))'],
				]
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
