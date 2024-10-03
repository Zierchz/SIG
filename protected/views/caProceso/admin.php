<style>
	tr {
        text-align: center;
    }
	</style>

<?php
$template='{delete}';
$uni=Yii::app()->user->areaid;
$rev=null;

/* @var $this CaProcesoController */
/* @var $model CaProceso */
if(isset($_GET['rev']))
		$rev=$_GET['rev'];

$this->p2_PageTitle2("card-list", "Procesos de la Revisión","Listado","Revisión por la Dirección / Gestión de Procesos");

$this->PPaudit('CaRevisionDireccion', '', '','Regresar al Listado de Revisiones');

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ca-proceso-grid',
	'dataProvider'=>$model->search1($rev),
	'summaryText' => 'Mostrando {start} a {end} de {count} resultados',
	'emptyText' => '', 
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
		
		'nombre',
		// 'fecha_programada',
		'fecha_efectuada',
		'responsable',
		
		array(
				'class'=>'CButtonColumn',
				'template'=>$template,
				'deleteConfirmation'=>"js:'¿Seguro que desea eliminar este elemento?'",
				'afterDelete'=>"function(link,success,data){
					if(success){
						alert('Se ha eliminado el proceso correctamente.');
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
?>
<br>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ca-proceso-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
		'enctype' => 'multipart/form-data',
		'class'=>'row g-3',
	),
)); echo '<br><br><H2 class="col-lg-12 " style="align:center;text-align: center;border-radius:30px;font-size:x-large;border-right:double #454545 10px;border-left:double #454545 10px;background-color:white;border-bottom:double #454545 2px;border-top:double #454545 2px; color: #454545;font-family:Bahnschrift">Añadir Proceso:</H2> 
<br>';

if(Yii::app()->user->areaid!=7){
	$this->p2_MyInput(3, $form, $model,'nombre', 'select', array('class' => 'filtro form-control', 'prompt' => 'Seleccione un proceso:'), CHtml::listData(CaEstructuraProceso::model()->findAll("id_uo='$uni'"), 'nombre', 'nombre'));}
	else{$this->p2_MyInput(3, $form, $model,'nombre', 'select', array('class' => 'filtro form-control', 'prompt' => 'Seleccione un proceso:'), CHtml::listData(CaEstructuraProceso::model()->findAll(), 'nombre', 'nombre'));}
	
// $this->p2_MyInput(3, $form, $model,'fecha_programada','date',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->p2_MyInput(3, $form, $model,'fecha_efectuada','date',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));

$this->p2_MyInput(6, $form, $model,'responsable', 'select', array('class' => 'filtro form-control', 'prompt' => 'Seleccione un responsable del proceso:'), CHtml::listData(Usuario::model()->findAll('nombre!="Administrador"'), 'nombre', 'nombre'));


	 $this->myButton($model); 
 $this->endWidget(); ?>

