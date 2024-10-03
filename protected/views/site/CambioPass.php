<?=$this->p2_PageTitle("bi bi-people","Cambio de Contraseña", "Cambio de Contraseña", "Usuarios");?>
<?php
$flashes = Yii::app()->user->getFlashes();

if ($flashes) {
    foreach ($flashes as $key => $message) {
        echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
    }
}
?>

<div class="form">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'cambio-password-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    )); ?>

    <?php
    if(Yii::app()->user->roleid == 3){
        $this->p2_MyInput(6, $form, $model,'username','select', array('class'=>'form-control','prompt'=>'Seleccione...'),CHtml::listData(Usuario::model()->findAll(), 'username', 'username'));
        $this->p2_MyInput(6, $form, $model,'new_password','password',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
        $this->p2_MyInput(6, $form, $model,'repeat_password','password',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
        // Agregar el botón de restablecimiento de contraseña
        echo CHtml::submitButton('Restablecer Contraseña', array('name' => 'reset_password', 'class' => 'btn btn-primary'));
    } 
    
    else {
        $this->p2_MyInput(6, $form, $model,'old_password','password',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
        $this->p2_MyInput(6, $form, $model,'new_password','password',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
        $this->p2_MyInput(6, $form, $model,'repeat_password','password',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
    }

    $this->myButton($model); 
    $this->endWidget(); ?>
</div>