<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */


?>


  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

              

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2" align="center">
                  
                  <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/new_logo.png" />
<div><br></div>
<h1 style="color: #012970;font-family: 'Trebuchet MS', sans-serif;"><strong>Sistema Integrado de Gestión</strong></h1>
                  </div>
                  <?php if(Yii::app()->user->hasFlash('Error')){ ?>
                  		<div class="alert alert-danger alert-dismissible fade show" role="alert">
                				<?php echo Yii::app()->user->getFlash('Error'); ?>
              					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              				</div>





															
														<?php } ?>		
                  	<?php $form=$this->beginWidget('CActiveForm', array(
															'id'=>'login-form',
															'enableClientValidation'=>true,
															'clientOptions'=>array(
																'validateOnSubmit'=>true,
															),
															'htmlOptions'=>['class'=>'row g-3 needs-validation'],
														)); ?>
                  
                  				<div class="form-group">
																<?php echo $form->error($model,'password'); ?>
															</div>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Usuario</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><span class="bi bi-person"></span></span>
                        <input type="text" name="LoginForm[username]" class="form-control" id="LoginForm_username" required>
                        <div class="invalid-feedback">Por favor introduzca su usuario.</div>
                      </div>
                    </div>

                    <div class="col-12">
    <label for="yourPassword" class="form-label">Contraseña</label>
    <div class="input-group has-validation">
        <input type="password" name="LoginForm[password]" class="form-control" id="LoginForm_password" required>
        <button type="button" id="togglePassword" class="btn btn-outline-secondary toggle-password">
            <i id="toggleIcon" class="bi bi-eye text-white"></i>
        </button>
        <div class="invalid-feedback">Por favor introduzca su contraseña</div>
    </div>
</div>
<style>
    .toggle-password {
        background-color: #999999; /* Cambia este valor al color gris que desees */
    }
</style>

                    
                    <div class="form-check form-switch" style="margin: 9px;font-size:18px"><label><input class="form-check-input checkBoxClassSeguridad" type="checkbox" id="LoginForm[ldap]" name="LoginForm[ldap]" checked> Autenticarse usando LDAP <i class="fa fa-square-o"></i></label></div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" style="background-color: #012970;">Entrar</button>
                    </div>
                    
                  	<?php $this->endWidget(); ?>
                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  
  <script type="text/javascript">
    $(document).ready(function () {
        var passwordField = $("#LoginForm_password");
        var toggleButton = $("#togglePassword");
        var toggleIcon = $("#toggleIcon");

        toggleButton.on("click", function () {
            if (passwordField.attr("type") === "password") {
                passwordField.attr("type", "text");
                toggleIcon.removeClass("bi-eye").addClass("bi-eye-slash");
                toggleButton.addClass("bg-gray"); // Agrega la clase de fondo gris
            } else {
                passwordField.attr("type", "password");
                toggleIcon.removeClass("bi-eye-slash").addClass("bi-eye");
                toggleButton.removeClass("bg-gray"); // Elimina la clase de fondo gris
            }
        });
    });
</script>






		<script src="js/jquery-1.10.2.js"></script>
<script type="text/javascript">	
$(document).ready(function(){
	LoadDataTablesScripts(AllTables);
	WinMove();
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
