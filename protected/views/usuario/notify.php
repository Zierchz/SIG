<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
if($temp==1){
	echo '<script>swal({
						  title: "Correcto!",
						  text: "Se envió el correo exitosamente.",
						  timer: 3000,
						  type: "success",
						  showConfirmButton: true,
						  closeOnConfirm: false
						},
						function(isConfirm){
						  if (isConfirm) {
							window.location="'.CController::createUrl("/Usuario/notify").'";
						  }
						});
					  </script>';
}
$this->myHeader1("envelope","Enviar notificaciones masivas");
$this->myTableHeader1("Enviar notificaciones","","Usuario","");
?>
<div class="row" style="text-align: left">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',	
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
		<div class="col-lg-12">
			<div class="form-group">
				<label for="ContactForm_subject" class="required">Asunto <span class="required">*</span></label>
				<input size="60" maxlength="128" class="form-control" name="subject" id="subject" type="text">
			</div>
		</div>

		<div class="col-lg-12">
			<div class="form-group">
				<label for="ContactForm_body" class="required">Contenido <span class="required">*</span></label>
				<textarea rows="6" cols="50" class="form-control" name="body" id="body"></textarea>
			</div>
		</div>

		<div class="col-lg-12">
			<div class="form-group">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
						<tr>
							<th width="40%">Usuario</th>
							<th width="40%">Nombre</th>
							<th width="10%">U.O</th>
							<th width="10%"><input id="ckbCheckAll" type="checkbox"> Marcar todos</th>
						</tr>
						</thead>
						<tbody>
						<?php
						foreach($data as $row):
							$usuario =$row['username'];
							$nombre = $row['username'];
							$siglas = $row['siglas'];
							echo "<tr>";
							echo "<td>".$usuario."</td>";
							echo "<td>".$nombre."</td>";
							echo "<td>".$siglas."</td>";
							echo "<td><input class='checkBoxClass' type='checkbox' name='campos2[$usuario]'></td>";
							echo "</tr>";
						endforeach;
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	<div class="col-lg-12">
		<div class="form-group" align="right">
			<button name='btn_aceptar' id='btn_aceptar' type="submit" class="btn btn-primary">Aceptar</button>
			<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		</div>
	</div>

<?php $this->endWidget();
$this->table_Footer();
?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		$("#ckbCheckAll").click(function () {
		$(".checkBoxClass").prop('checked', $(this).prop('checked'));
		});
		$("#ckbCheckAll1").click(function () {
		$(".checkBoxClass1").prop('checked', $(this).prop('checked'));
		});
	});
	</script>