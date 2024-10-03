<style>
	tr {
        text-align: center;
    }
	</style>

<?php

$template='{delete}';
$plan_id=null;

/* @var $this CaEquipoAuditorController */
/* @var $model CaEquipoAuditor */
if(isset($_GET['plan_id']))
		$plan_id=$_GET['plan_id'];
		$this->p2_PageTitle2("people-fill", "Equipo de Auditores","Listado","Auditorías / Plan de Auditoría / Gestión de Equipos");

		$plan=CaAuditoria::model()->findByPk($plan_id);
		$this->PPaudit('CaPlanAuditoria', 'plan', $plan->id ,'Regresar al Plan de Auditoría');

		$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ca-equipo-auditor-grid',
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
		array(
			'name'=>'auditor',
            'value'=>'$data->caAuditor->nombre_apellido'),
			array(
				'name'=>'funcion',
				'value'=>function($data) {
					// Modify the display based on the 'funcion' value
					switch($data->funcion) {
						case 'jefe':
							return 'Líder Auditor';
						case 'miembro':
							return 'Auditor Auxiliar';
						case 'formacion':
							return 'Auditor en Formación';
						default:
							return $data->funcion; // Return the original value if not one of the specified cases
					}
				}
			),
		// 'plan_audit',
		array(
			'class' => 'CButtonColumn',
			'template' => $template,
			'deleteConfirmation' => "js:'¿Seguro que desea eliminar este elemento?'",
			'afterDelete' => "function(link, success, data) {
				if (success) {
					location.reload();
					
					alert('Se ha eliminado el auditor correctamente.');
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
));echo '<br><br><H2 class="col-lg-12 " style="align:center;text-align: center;border-radius:30px;font-size:22px;border-right:double #454545 10px;border-left:double #454545 10px;background-color:white;border-bottom:double #454545 2px;border-top:double #454545 2px; color: #454545;font-family:Bahnschrift">Añadir Auditor Al Equipo:</H2> 
<br>'; 
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ca-equipo-auditor-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
		'enctype' => 'multipart/form-data',
		'class'=>'row g-3')
)); ?>
<?php
$a=CaAuditoria::model()->findByPk($plan_id);
$auditoresEmpresariales = CaAuditor::model()->findAllByAttributes(array('disponibilidad'=> 1, 'es_papelera'=> 0, 'alcance'=>'empresarial'));
$auditoresPropios = CaAuditor::model()->findAllByAttributes(array('disponibilidad'=> 1, 'es_papelera'=> 0, 'alcance'=>'propio', 'unidad'=>$a->unidad_rec));
$auditores = array_merge($auditoresEmpresariales, $auditoresPropios);

$this->p2_MyInput(6, $form, $model, 'auditor', 'select', array('class' => 'filtro form-control', 'prompt' => 'Seleccione el auditor:'), CHtml::listData($auditores, 'id', 'nombre_apellido'));

$equipos = CaEquipoAuditor::model()->findAllByAttributes(array('plan_audit' => $plan_id));
$aux = '0';

foreach ($equipos as $equipo) {
    if ($equipo->funcion == 'jefe') {
        $aux = "1";
    }
}

$options = array();

// Agregar "Jefe de Auditores" solo si $aux es igual a '0'
if ($aux === '0') {
    $options["jefe"] = "Líder Auditor";
} else {
    // Si hay un jefe creado, las opciones son "Auditor auxiliar" y "Auditor en formación"
    $options["miembro"] = "Auditor auxiliar";
    $options["formacion"] = "Auditor en formación";
}

$this->p2_MyInput(6, $form, $model, 'funcion', 'select', array('class' => 'form-control', 'prompt' => 'Seleccione la función que cumplirá el auditor:'), $options);
?>
	<?php $this->myButton($model); ?>
<?php $this->endWidget(); ?>
