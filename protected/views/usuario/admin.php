<?php
/* @var $this UsuarioController */
/* @var $model Usuario */




$this->p2_PageTitle("people", "Usuarios del Sistema", "Listado", "Gestión de Usuarios");
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
        // array(
        //     'type'=>'html',
        //     'name'=>'foto',
        //     'filter' => false,
        //     'value'=>'CHtml::image("plantilla2/img/fotos/".$data->foto, "alt", array("height" => 50,"class"=>"img-rounded"))',
        //     'htmlOptions' => array ('style' => 'text-align: center;', 'width'=>'70'),
        // ),
		'username',
		'nombre',
		//'password',
		//'rol',
        
        array(
            'name'=>'rol',
            'value'=>'$data->rol0->rol',
            'header'=>'Rol',
        ),
		'sap_code',
        
        
        // 'id_uo',
        array(
            'name'=>'id_uo',
            'value'=>'$data->idUo->siglas',
            'header'=>'Unidad Organizativa',
        ),
		array(
			'class'=>'CButtonColumn',
            'deleteConfirmation'=>"js:'¿Seguro que desea eliminar este elemento?'",
            'buttons'=>				['delete'=>['label'=>'Eliminar',
									'imageUrl' => Yii::app()->baseUrl . './images/delete.png',
									'options'=>['class'=>'btn delete']],
									'update'=>['label'=>'Modificar',
									'imageUrl' => Yii::app()->baseUrl . './images/update.png',
									'options'=>['class'=>'btn update']],
									'view'=>['label'=>'Mostrar datos',
									'imageUrl' => Yii::app()->baseUrl . './images/view.png',
									'options'=>['class'=>'btn view']],]
		),
	),
)); ?>
               