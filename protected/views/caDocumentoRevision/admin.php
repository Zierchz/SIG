<?php
/* @var $this CaDocumentoRevisionController */
/* @var $model CaDocumentoRevision */
if(isset($_GET['id_revision']))
		$id_revision=$_GET['id_revision'];
$this->p2_PageTitle2("archive-fill","Documentos de la Revisión","Documentos de la Revisión", "Gestión de Programas Anuales de Revisión por la Dirección","CaDocumentoRevision","");

$this->PPaudit('CaRevisionDireccion', '', '','Regresar al Listado de Revisiones');

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ca-documento-revision-grid',
	'dataProvider'=>$model->search($id_revision),
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
		'url',
		'descripcion',
		// 'id_revision',
		array(
				'class'=>'CButtonColumn',
				'template'=>'{download}{delete}',
				'deleteConfirmation'=>"js:'¿Seguro que desea eliminar este elemento?'",
				'buttons'=>				['delete'=>['label'=>'Eliminar',
									'imageUrl' => Yii::app()->baseUrl . './images/delete.png',
									'options'=>['class'=>'btn delete']],
									'update'=>['label'=>'Modificar',
									'imageUrl' => Yii::app()->baseUrl . './images/update.png',
									'options'=>['class'=>'btn update']],
									'view'=>['label'=>'Mostrar datos',
									'imageUrl' => Yii::app()->baseUrl . './images/view.png',
									'options'=>['class'=>'btn view']],
									'download' => [
										'label' => '<img src="./images/downl.png" title="Descargar" style="width: 18px; height: 14px;">',
										'url' => 'Yii::app()->baseUrl . "/calidaddocs/DOCUMENTOS DE PROGRMAS ANUALES DE REVISIÓN POR LA DIRECCIÓN/Revisión del {$data->fecha_revision}/{$data->url}"',
										'options' => [
											'title' => 'Descargar',
											'aria-label' => 'Descargar',
											'data-toggle' => 'tooltip',
											'target' => '_blank',
											'class'=>'btn down' 
										],
									],
				]
		),
	),
)); 
$this->myFlashMessage(); 

echo '<br><H2 class="col-lg-12 " style="align:center;text-align: center;border-radius:30px;font-size:22px;border-right:double #454545 10px;border-left:double #454545 10px;background-color:white;border-bottom:double #454545 2px;border-top:double #454545 2px; color: #454545;font-family:Bahnschrift">Adjuntar Documento:</H2> 
';?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ca-documento-revision-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
		'enctype' => 'multipart/form-data',
		'class'=>'row g-3',
	),)); ?>
<?php
$this->myInput(6, $form, $model,'url','file',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
$this->myInput(6, $form, $model,'descripcion','textArea',array('size'=>50,'rows'=>1,'maxlength'=>50, 'class'=>'form-control'));
		
?>
	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>
</div>
</div>
