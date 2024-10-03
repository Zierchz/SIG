<?php
/* @var $this RolController */
/* @var $model Rol */
$this->p2_PageTitle("person-badge", "Roles del Sistema", "Crear", "Gestión de Roles");
foreach(Yii::app()->user->getFlashes() as $key =>$message)
{
	echo '<div class="alert alert-error" style="background-color: #ce8483">
			<button type="button" class="close" data-dismiss="alert">x</button>
			<span class="fa fa-warning"></span> <strong>'.$message.'</strong>
		</div>';
}
echo $this->renderPartial('_form', array('model'=>$model, 'listaPermiso'=>$listaPermiso,'labels'=>$labels));
?>