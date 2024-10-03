<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
//$this->myBreadCrumb("Usuario","Actualizar Usuario");
if(isset($_GET['msg'])){
	$msg=$_GET['msg'];
	if($msg=="1")
	{
		echo '<script>swal({
			  title: "Correcto!",
			  text: "El password se actualizo correctamente.",
			  timer: 3000,
			  type: "success",
			  showConfirmButton: true,
			  closeOnConfirm: false
			},
			function(isConfirm){
			  if (isConfirm) {
				window.location="'.CController::createUrl("/site/index").'";
			  }
			});
		  </script>';
	}
	else
	{
		echo '<script>swal({
			  title: "Correcto!",
			  text: "No se pudo actualizar el password. Intentelo de nuevo.",
			  timer: 3000,
			  type: "error",
			  showConfirmButton: true,
			  closeOnConfirm: false
			},
			function(isConfirm){
			  if (isConfirm) {
				window.location="'.CController::createUrl("/site/index").'";
			  }
			});
		  </script>';
	}
	
}
$this->myHeader1("user","Gestionar Usuarios");
echo $this->renderPartial('_formpass', array('model'=>$model));
?>