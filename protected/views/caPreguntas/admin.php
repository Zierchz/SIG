<style>
	tr {
        text-align: center;
    }
	</style>

<?php
$template='{delete}{update}';
$lista_id=null;
if(isset($_GET['lista_id']))
				$lista_id=$_GET['lista_id'];
/* @var $this CaPreguntasController */
/* @var $model CaPreguntas */
$this->p2_PageTitle2("question-circle", "Preguntas","Listado","Auditorías / Lista de verificación / Gestión de Preguntas");

$lista=CaListaVerificacion::model()->findByPk($lista_id);
$this->PPaudit('CaListaVerificacion', 'lista', $lista->auditoria_id ,'Regresar a la Lista de Verificación');

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ca-preguntas-grid',
	'dataProvider'=>$model->search1($lista_id),
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
		'pregunta',
		'referencia',
		'conformidad',
		'observaciones',
		// 'lista_id',
		array(
				'class'=>'CButtonColumn',
				'template'=>$template,
				'deleteConfirmation'=>"js:'¿Seguro que desea eliminar este elemento?'",
				'afterDelete'=>"function(link,success,data){
					if(success){
						alert('Se ha eliminado la pregunta correctamente.');
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
)); ?>
<br>
<?php 
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'ca-preguntas-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' =>['class'=>'row g-3'],
	
)); echo '<br><br><H2 class="col-lg-12 " style="align:center;text-align: center;border-radius:30px;font-size:x-large;border-right:double #454545 10px;border-left:double #454545 10px;background-color:white;border-bottom:double #454545 2px;border-top:double #454545 2px; color: #454545;font-family:Bahnschrift">Añadir Pregunta:</H2> 
<br>';
 ?>
<?php
$this->p2_MyInput(3, $form, $model,'pregunta','textArea',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control'));
	
$this->p2_MyInput(3, $form, $model,'referencia','textArea',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control'));
	
$this->p2_MyInput(3, $form, $model, 'conformidad', 'select', array('class' => 'form-control'), array(
	null=>"No establecido",
	"Si" => "Sí",
	"No" => "No",
	
));		
$this->p2_MyInput(3, $form, $model,'observaciones','textArea',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control'));
	
// $this->myInput(6, $form, $model,'lista_id','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
?>
	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>
