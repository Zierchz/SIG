<?php
/* @var $this UnidadOrganizativaController */
/* @var $model UnidadOrganizativa */

$this->p2_PageTitle("house", "Unidades Organizativas", "Listado", "Gestión de Unidades Organizativas");

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'unidad-organizativa-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'summaryText'=>'Mostrando {start} a {end} de {count} resultados',
	'updateSelector' => 'custom-page-selector', //update selector
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
		'nombre',
		'siglas',
		'old',
		array(
			'class'=>'CButtonColumn',
			'deleteConfirmation'=>"js:' Seguro que desea eliminar este elemento?'",
			'afterDelete'=>"function(link,success,data){
                if(success){
                    var response = $.parseJSON(data);
                    if(response.success === false) {
                        alert(response.message);
                    } else {
                        $.fn.yiiGridView.update('unidad-organizativa-grid');
                    }
                }
            }",
			'template'=>'{update}{delete}',
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
	
)); 


echo "</div></div></div></div></div></div></div></div></div>";

?>
