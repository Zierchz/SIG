<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */

$this->p2_MyTableHeader("Cambiar Contraseña del Usuario: ".$model->username,"Create","Usuario", null);
?>


                <div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>false,
)); ?>

                    <div class="col-lg-12">
                        <div class="form-group">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'password'); ?>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group" align="right">
                            <button name='yt0' id='yt0' type="submit" class="btn btn-primary">Aceptar</button>
                        </div>
                    </div>

<?php $this->endWidget(); ?>
                </div><!-- form -->
            </div>
        </div>
    </div>
    <?php  ?>
    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
<?php ?>