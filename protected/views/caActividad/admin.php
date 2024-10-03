<style>
	tr {
        text-align: center;
    }
	</style>
<?php


$plan_id=null;
$template="{delete}{update}";

/* @var $this CaActividadController */
/* @var $model CaActividad */
if(isset($_GET['plan_id']))
		$plan_id=$_GET['plan_id'];

$this->p2_PageTitle2("columns-gap", "Actividades","Listado","Auditorías / Plan de Auditoría / Gestión de Actividades");

$plan=CaPlanAuditoria::model()->findByPk($plan_id);
$this->PPaudit('CaPlanAuditoria', 'plan', $plan->auditoria ,'Regresar al Plan de Auditoría');

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ca-actividad-grid',
	'dataProvider'=>$model->search1($plan_id),
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
		'fecha',
		'actividad',
		'objetivo',
		
		array('name'=>'hora',
	'value'=>'$data->hora ." ". $data->dia'),
	array('name'=>'hora_fin',
	'value'=>'$data->hora_fin ." ". $data->dia_fin'),
		// 'plan',
		array(
				'class'=>'CButtonColumn',
				'template'=>$template,
				'deleteConfirmation'=>"js:'¿Seguro que desea eliminar este elemento?'",
				'afterDelete'=>"function(link,success,data){
					if(success){
						alert('Se ha eliminado la actividad correctamente.');
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
$this->myFlashMessage(); 
?>

<br>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ca-actividad-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
		'enctype' => 'multipart/form-data',
		'class'=>'row g-3',
	),
 
));echo '<br><br><H2 class="col-lg-12 " style="align:center;text-align: center;border-radius:30px;font-size:22px;border-right:double #454545 10px;border-left:double #454545 10px;background-color:white;border-bottom:double #454545 2px;border-top:double #454545 2px; color: #454545;font-family:Bahnschrift">Añadir Actividad:</H2> 
<br>';
 ?>
 
<?php
echo '<div class=" row col-md-12">';
$this->p2_MyInput(6, $form, $model,'fecha','date',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));

$this->p2_MyInput(2, $form, $model, 'hora', 'text', array('size' => 50,'maxlength' => 50,'class' => 'form-control','placeholder' => '00:00'));
$this->p2_MyInput(1, $form, $model, 'dia', 'select', array('class' => 'form-control', 'prompt' => ''), array(
	
	"a.m" => "a.m",
	"p.m" => "p.m",
	
));
$this->p2_MyInput(2, $form, $model, 'hora_fin', 'text', array('size' => 50,'maxlength' => 50,'class' => 'form-control','placeholder' => '00:00'));
$this->p2_MyInput(1, $form, $model, 'dia_fin', 'select', array('class' => 'form-control', 'prompt' => ''), array(
	
	"a.m" => "a.m",
	"p.m" => "p.m",
	
));
echo '</div>';

$this->myInput(6, $form, $model,'actividad','textArea',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control'));
	
$this->myInput(6, $form, $model,'objetivo','textArea',array('size'=>50,'maxlength'=>1000,'rows'=>1, 'class'=>'form-control'));
	
// $this->myInput(6, $form, $model,'plan','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
	
?>
	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>
