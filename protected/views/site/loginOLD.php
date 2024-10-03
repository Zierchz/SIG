<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */


?>
<div class="container-fluid" style="margin-top: 60px;">
	<div id="page-login" class="row">
		<div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="login-panel panel panel-primary">
					<div class="panel-heading" align="center" style="background-color:#d6e0e8">
                        <img src="img/fondo2.png" width="100%">
                    </div>
					<div class="panel-body">
					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'login-form',
						'enableClientValidation'=>true,
						'clientOptions'=>array(
							'validateOnSubmit'=>true,
						),
					)); ?>
						<fieldset>

						<div class="form-group">
							<?php //echo $form->labelEx($model,'username'); ?>
							<?php //echo $form->textField($model,'username'); ?>
							<input class="form-control" placeholder="Usuario" name="LoginForm[username]" id="LoginForm_username" autofocus>
							<?php echo $form->error($model,'username'); ?>
						</div>

						<div class="form-group">
							<?php //echo $form->labelEx($model,'password'); ?>
							<?php //echo $form->passwordField($model,'password'); ?>
							<input class="form-control" placeholder="Password" name="LoginForm[password]" id="LoginForm_password" type="password">
						</div>

						<div class="form-group">
							<?php echo $form->error($model,'password'); ?>
						</div>

						<div>
							<?php //echo CHtml::submitButton('Login'); ?>
							<div class="checkbox"><label><input type="checkbox" id="LoginForm[ldap]" name="LoginForm[ldap]" checked> Autenticarse usando LDAP <i class="fa fa-square-o"></i></label></div>

							<button name='btn_registrar' id='btn_registrar' type="submit" class="btn btn-lg btn-success btn-block">Entrar</button>
							<div align="center"><img src="img/unnamed.jpg" width="20%"></div>
						</div>
						</fieldset>
					<?php $this->endWidget(); ?>
					</div><!-- form -->
				</div>
            </div>
        </div>
    </div>
    <script src="js/jquery-1.10.2.js"></script>
<script type="text/javascript">	
$(document).ready(function(){
  $("#LoginForm_password").on('paste', function(e){
    e.preventDefault();
    //alert('Esta acción está prohibida');
  })
  
  $("#LoginForm_password").on('copy', function(e){
    e.preventDefault();
    //alert('Esta acción está prohibida');
  })
})
</script>