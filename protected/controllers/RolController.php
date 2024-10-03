<?php

class RolController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/plantilla2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Rol;
		$permiso=new Permiso('search');//guardo en el objeto un array de permisos
		$permiso->unsetAttributes();  // clear any default values
		if(isset($_GET['Permiso']))
			$permiso->attributes=$_GET['Permiso'];
		$listaPermiso = Yii::app()->db->createCommand("select p.id, p.permiso, p.descripcion, p.menu, p.modelo from permiso p order by p.permiso asc")->queryAll();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$perm = Permiso::model()->findAll(array(
			'select'=>'t.padre',
			'distinct'=>true,
		));
		$labels = array();
		foreach($perm as $p){
			$labels[] = $p->padre;
		}
		if(isset($_POST['Rol']))
		{
			$model->attributes=$_POST['Rol'];
			$listaPermisos[]='';
			if(isset($_POST['chk']))
			$listaPermisos = $_POST['chk'];
		
			if($model->save())
            {
				$id = $model->id;
					if($listaPermisos!=null){
				foreach($listaPermisos as &$id_permiso) {
					$rol_permiso = new RolPermiso();
					$rol_permiso->rol=$id;
					$rol_permiso->permiso=$id_permiso;
					$rol_permiso->save();
				}}
                $this->redirect(array('admin'));
            }
		}

		$this->render('create',array(
			'model'=>$model,
			'listaPermiso'=>$listaPermiso,
			'labels'=>$labels
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$permiso=new Permiso('search');//guardo en el objeto un array de permisos
		$permiso->unsetAttributes();  // clear any default values
		if(isset($_GET['Permiso']))
			$permiso->attributes=$_GET['Permiso'];
		$listaPermiso = Yii::app()->db->createCommand("select p.id, p.permiso, p.descripcion, p.menu, p.url, p.modelo from permiso p order by p.modelo asc")->queryAll();
		$listRolPermiso = Yii::app()->db->createCommand("select p.permiso from rol_permiso p where p.rol=".$id."")->queryAll();
		$arrayRolPermiso = array();
		foreach($listRolPermiso as &$list1)
		{
			$arrayRolPermiso[] =$list1['permiso'];
		}
		$perm = Permiso::model()->findAll(array(
			'select'=>'t.padre',
			'distinct'=>true,
		));
		$labels = array();
		foreach($perm as $p){
			$labels[] = $p->padre;
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Rol']))
		{
			$model->attributes=$_POST['Rol'];
			$listaPermisos = $_POST['chk'];
			$eliminados = array_diff($arrayRolPermiso, $listaPermisos);
			$nuevos = array_diff($listaPermisos, $arrayRolPermiso);
			$modificados = array_intersect($listaPermisos, $arrayRolPermiso);
			if($model->save()){
				//$desc = "Se actualizó el Rol ".$model->permiso." por el usuario ";
				//$this->generateLog("Actualización",$desc);
				foreach($nuevos as $prod)
				{
					$rol_permiso = new RolPermiso();
					$rol_permiso->rol=(int) $id;
					$rol_permiso->permiso=(int) $prod;
					$rol_permiso->save();
				}
				foreach($eliminados as $prod)
				{
					$command = Yii::app()->db->createCommand();
					$command->delete('rol_permiso','rol=:id and permiso=:id_prod', array(':id'=>$id,':id_prod'=>$prod));
				}
				$this->redirect(array('admin'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'listaPermiso'=>$listaPermiso,
			'labels'=>$labels
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
        $model=Rol::model()->findByPk($id);
        $name = $model->rol;
        $users = Usuario::model()->findAllByAttributes(array('rol'=>$id));        
        foreach ($users as $ru) {
        	$ru->rol = 9;
        	$ru->save();
        }
        RolPermiso::model()->deleteAll('rol =:id_rol', array(':id_rol' => $id));
		$this->loadModel($id)->delete();
		$desc = "Se borró el rol ".$name." por el usuario ";
		$this->generateLog("Borrado",$desc);
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Rol');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Rol('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Rol']))
			$model->attributes=$_GET['Rol'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Rol the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Rol::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Rol $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='rol-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function permisoTab($model, $menu)
{
    // Obtener el valor de la variable $todos desde la URL
    $todos = Yii::app()->request->getParam('todos', null);
    $checkedAttribute = $todos === 'checked' ? 'checked' : '';

    // Obtener los modelos de permisos
    $modelos = Yii::app()->db->createCommand("select distinct(p.modelo) from permiso p where p.padre = '".$menu."' order by p.modelo asc")->queryAll();

    // Arrays para almacenar permisos
    $arrayPermiso1 = array('admin', 'create', 'delete', 'update', 'view');
    $arrayPermiso = array('admin' => null, 'create' => null, 'delete' => null, 'update' => null, 'view' => null);
    $arrayOtherID = array();
    $arrayOtherName = array();

    // Generar la URL para redirigir con todos=checked
    $url = Yii::app()->createUrl(Yii::app()->controller->route, array_merge($_GET, array('todos' => 'checked')));

    echo '
    <div class="col-lg-12">
    <div class="form-group">

        <div style="margin: 10px;"><a href="'.$url.'" class="btn btn-secondary">Seleccionar Todos</a></div>

        <table class="items" width="100%">
            <thead>
            <tr>
                <th width="30%">Nombre Permiso</th>
                <th width="10%">Listar</th>
                <th width="15%">Crear</th>
                <th width="15%">Borrar</th>
                <th width="15%">Actualizar</th>
                <th width="15%">Visualizar</th>
            </tr>
            </thead>
            <tbody>';

    foreach ($modelos as $modelo) {
        $permisoList = Yii::app()->db->createCommand("select * from permiso p where p.modelo = '" .$modelo['modelo']. "'")->queryAll();
        $permiso = "";

        foreach ($permisoList as $item) {
            $permiso = $item['modelo'];

            if ($item['url'] == $modelo['modelo'].'/Admin' || $item['url'] == $modelo['modelo'].'/admin') {
                $arrayPermiso['admin'] = $item['id'];
            } elseif ($item['url'] == $modelo['modelo'].'/Create' || $item['url'] == $modelo['modelo'].'/create') {
                $arrayPermiso['create'] = $item['id'];
            } elseif ($item['url'] == $modelo['modelo'].'/Delete' || $item['url'] == $modelo['modelo'].'/delete') {
                $arrayPermiso['delete'] = $item['id'];
            } elseif ($item['url'] == $modelo['modelo'].'/Update' || $item['url'] == $modelo['modelo'].'/update') {
                $arrayPermiso['update'] = $item['id'];
            } elseif ($item['url'] == $modelo['modelo'].'/View' || $item['url'] == $modelo['modelo'].'/view') {
                $arrayPermiso['view'] = $item['id'];
            } else {
                array_push($arrayOtherName, $item['permiso']);
                array_push($arrayOtherID, $item['id']);
            }
        }
        echo '<tr>';
        echo '<td>'.$permiso.'</td>';
        for ($i = 0; $i < count($arrayPermiso); $i++) {
            $id_permiso = $arrayPermiso[$arrayPermiso1[$i]];
            if ($model->getIsNewRecord() == false) {
                if ($id_permiso != NULL) {
                    $checked = count($model->obtRolPermiso($model->id, $id_permiso)) > 0 ? 'checked' : '';
                    echo '
                    <td align="center"><div class="form-check form-switch">
                        <input class="form-check-input checkBoxClass'.$menu.'" type="checkbox" id="flexSwitchCheckChecked" name="chk[]" value="'.$id_permiso.'" '.$checked.'>
                    </div></td>';
                } else {
                    echo '
                    <td align="center"><div class="form-check form-switch">
                        <input class="form-check-input checkBoxClass'.$menu.'" type="checkbox" id="flexSwitchCheckChecked" name="chk[]" value="'.$id_permiso.'" '.$checkedAttribute.'>
                    </div></td>';
                }
            } else {
                echo '
                <td align="center"><div class="form-check form-switch">
                    <input class="form-check-input checkBoxClass'.$menu.'" type="checkbox" id="flexSwitchCheckChecked" name="chk[]" value="'.$id_permiso.'" '.$checkedAttribute.'>
                </div></td>';
            }
        }
    }

    echo '
        </tbody>

        <thead>
            <tr>
                <th width="30%">Nombre Permiso</th>
                <th width="10%">Permitir</th>
            </tr>
        </thead>';
    for ($i = 0; $i < count($arrayOtherID); $i++) {
        echo '<tr>';
        echo '<td>'.$arrayOtherName[$i].'</td>';
        $id_permiso = $arrayOtherID[$i];
        if ($model->getIsNewRecord() == false) {
            $checked = count($model->obtRolPermiso($model->id, $id_permiso)) > 0 ? 'checked' : '';
            echo '<td align="center"><div class="form-check form-switch">
                <input class="form-check-input checkBoxClass'.$menu.'" type="checkbox" id="flexSwitchCheckChecked" name="chk[]" value="'.$id_permiso.'" '.$checked.'>
            </div></td>';
        } else {
            echo '<td align="center"><div class="form-check form-switch">
                <input class="form-check-input checkBoxClass'.$menu.'" type="checkbox" id="flexSwitchCheckChecked" name="chk[]" value="'.$id_permiso.'" '.$checkedAttribute.'>
            </div></td>';
        }
        echo "</tr>";
    }

    echo '</table>
        </div>
    </div>';
}


}
