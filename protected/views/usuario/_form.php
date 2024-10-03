<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */






$form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>['class'=>'row g-3'],
));
$results = Yii::app()->db_bdut->createCommand()->select('t.codigo, t.nombre_apellidos')->from('trabajador t')->order(array('nombre_apellidos asc'))->queryAll();

Yii::app()->clientScript->registerScript('Usuario_username_select2', "
    $('#Usuario_username').select2({
        minimumInputLength: 3
    });
");
if ($model->getIsNewRecord()) {    $this->p2_MyInput(6, $form, $model, 'username', 'select', array('class'=>'form-control', 'prompt' => 'Seleccione el nombre:'),CHtml::listData($results, 'codigo', 'nombre_apellidos'));}

$this->p2_MyInput(6, $form, $model, 'rol', 'select', array('class'=>'form-control', 'prompt' => 'Seleccione el rol:'),CHtml::listData(Rol::model()->findAll(), 'id', 'rol'));

Yii::app()->clientScript->registerScript('Usuario_id_uo_select2', "
    $('#Usuario_id_uo').select2({
        minimumInputLength: 3
    });
");
$this->p2_MyInput(6, $form, $model, 'id_uo', 'select', array('class'=>'form-control', 'prompt' => 'Seleccione la unidad:'),CHtml::listData(UnidadOrganizativa::model()->findAll(), 'id', 'siglas'));


$this->myButton($model);
$this->endWidget(); 
?>
                </div><!-- form -->
            </div>
        </div>
    </div>
<?php ?>

<!-- <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/select2.min.js"></script>


<script type="text/javascript">
	$(document).ready(function() {
        $('#Usuario_id_uo').select2({
            placeholder: "Seleccione...",
        });             
    });   
</script> -->