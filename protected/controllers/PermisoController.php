<?php

class PermisoController extends Controller
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
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'generate'),
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
		$model=new Permiso;
		$destino = scandir(Yii::app()->basePath."/models");
		$modelos = array();
		$urls = array();
		foreach($destino as &$archivos_carpeta)
		{
			$mod = explode(".",$archivos_carpeta);
			if($mod[1]=="php"){
				//$uri=array('Admin','Create')
				$modelos[$mod[0]] = $mod[0];
				//$urls[] = $mod[0];
			}


		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Permiso']))
		{
			$model->attributes=$_POST['Permiso'];
			//var_dump($model);die();
			$model->url=$model->modelo."/".$model->url;
			if ($model->save()){
			//	$desc = "Se insertó el permiso ".$model->permiso." por el usuario ";
			//	$this->generateLog("Inserción",$desc);
				$this->redirect(array('admin'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'modelos'=>$modelos,
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
		$model->url = ucfirst(explode("/", $model->url)[1]);
		$destino = scandir(Yii::app()->basePath."/models");
		$modelos = array();
		$urls = array();
		foreach($destino as &$archivos_carpeta)
		{
			$mod = explode(".",$archivos_carpeta);
			if($mod[1]=="php"){
				//$uri=array('Admin','Create')
				$modelos[$mod[0]] = $mod[0];
				//$urls[] = $mod[0];
			}


		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Permiso']))
		{
			$model->attributes=$_POST['Permiso'];
			$model->url=$model->modelo."/".$model->url;
			if($model->save()){
				//$desc = "Se actualizó el permiso ".$model->permiso." por el usuario ";
				//$this->generateLog("Actualización",$desc);
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
				'modelos'=>$modelos,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model=Permiso::model()->findByPk($id);
        $name = $model->permiso;
		RolPermiso::model()->deleteAll('permiso =:id_permiso', array(':id_permiso' => $id));
		$this->loadModel($id)->delete();
		$desc = "Se borró el permiso ".$name." por el usuario ";
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
		$dataProvider=new CActiveDataProvider('Permiso');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Permiso('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Permiso']))
			$model->attributes=$_GET['Permiso'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionGenerate()
	{
		$model=new Permiso;
		$destino = scandir(Yii::app()->basePath."/models");
		$modelos = array();
		$urls = array();
		foreach($destino as &$archivos_carpeta)
		{
			$mod = explode(".",$archivos_carpeta);
			if($mod[1]=="php"){
				//$uri=array('Admin','Create')
				$modelos[$mod[0]] = $mod[0];
				//$urls[] = $mod[0];
			}
		}
		if(isset($_POST['Permiso']))
		{
			$model->attributes=$_POST['Permiso'];
			$array_menu = ['admin','create', 'update', 'view', 'delete'];
			$modelo = $model->modelo;
			for ($i=0; $i < count($array_menu); $i++) 
			{
				$url = $modelo."/".$array_menu[$i];
				$modelP=Permiso::model()->findByAttributes(array('url' => $url ));
			 	if($modelP==NULL)
			 	{			 		 
					$permiso  =  new Permiso();
					$permiso->permiso=$modelo.' '.$array_menu[$i];
					$permiso->descripcion = $modelo.' '.$array_menu[$i];
					/*if($menu[$i]=="view" || $menu[$i]=="update")
						$permiso->url = $model."/".$menu[$i]."";*/
					$permiso->url = $modelo."/".$array_menu[$i];
					$permiso->icono = "bi-graph-down";
					$permiso->menu = $model->menu;
					$permiso->padre = $permiso->menu;
					$permiso->modelo = $modelo;
					$permiso->visible = 1;
					$permiso->save();
			 	}
			 	else
			 	{
			 		// do something
			 	}
		 		
			}
			$this->redirect(array('admin'));
		}
		$this->render('generate',array(
			'model'=>$model,
			'modelos'=>$modelos,
		));

		
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Permiso the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Permiso::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Permiso $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='permiso-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
