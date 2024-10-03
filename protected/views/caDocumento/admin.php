

<?php

$template ='{download}{delete}';
$audit=null;
$audit_nombre=null;
if(isset($_GET['audit']))
$audit=$_GET['audit'];
if(isset($_GET['audit_nombre']))
$audit_nombre=$_GET['audit_nombre'];
if(isset($_GET['url'])){
			$url=$_GET['url'];
$model->url=$url;
		}	
/* @var $this CaDocumentoController */
/* @var $model CaDocumento */
// $this->myBreadCrumb("Ca Documentos","CaDocumento","Listado de Ca Documentos");
$nombre=mb_convert_case(mb_strtolower($audit_nombre, 'UTF-8'), MB_CASE_TITLE, 'UTF-8');;
$this->p2_PageTitle2("file-earmark-fill", "Expediente de $nombre","Listado","Expediente del Auditor / Gestión de Documentos");

$this->PPaudit('CaAuditor', '','' ,'Regresar al Banco de Auditores');
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ca-documento-grid',
	'htmlOptions' => array(
		'enctype' => 'multipart/form-data',
		
	),
	'dataProvider'=>$model->search1($audit),
	
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
		// 'id',
		'url',
		// 'auditor',
		// 'fecha_creacion',
		// 'autor',
		// 'unidad_o',
		
		// 'observaciones',
		'categoria',
		
		
		array(
			'class' => 'CButtonColumn',
			'template' => $template,
			'deleteConfirmation' => "js:'¿Seguro que desea eliminar este elemento?'",
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
					'url' => 'Yii::app()->baseUrl . "/calidaddocs/AUDITORES/{$data->auditor_nombre}/expediente/{$data->url}"',
					'options' => [
						'title' => 'Descargar',
						'aria-label' => 'Descargar',
						'data-toggle' => 'tooltip',
						'target' => '_blank',
						'class'=>'btn down' 
					],
				],
			],
		),
		
	),
)); 

	?>
<br>

<?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'documentos-form',
         'enableAjaxValidation' => false,
		 'htmlOptions' => array(
			'enctype' => 'multipart/form-data',
			'class'=>'row g-3',
		),
)); echo '<br><H2 class="col-lg-12 " style="align:center;text-align: center;border-radius:30px;font-size:22px;border-right:double #454545 10px;border-left:double #454545 10px;background-color:white;border-bottom:double #454545 2px;border-top:double #454545 2px; color: #454545;font-family:Bahnschrift">Adjuntar Documento:</H2> 
';

?>
  
  <?php
$this->p2_MyInput(6, $form, $model,'url','file',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));

// $this->myInput(6, $form, $model,'auditor','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	

	

$this->p2_MyInput(6, $form, $model, 'categoria', 'select', array('class' => 'form-control','prompt' => 'Seleccione la categoría'), array(
	"Curso" => "Curso",
	"Certificaciones" => "Certificaciones",
	"Evaluaciones" => "Evaluaciones",
	"Otros" => "Otros",
	
));


?>
	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>

<!-- <script src="js/jquery-1.10.2.js"></script> -->