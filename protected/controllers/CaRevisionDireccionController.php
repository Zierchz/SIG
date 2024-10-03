<?php

class CaRevisionDireccionController extends Controller
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
				'actions'=>array('admin','delete'),
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
	{	 $pro = new CaProceso();
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'pro'=>$pro
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new CaRevisionDireccion;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CaRevisionDireccion']))
		{
			$model->attributes=$_POST['CaRevisionDireccion'];
			$model->fecha_elaborado=date('Y-m-d');
			$model->revision_elaborado_por=Yii::app()->user->fullname;
			$model->fecha_elaborado = date('d-m-y', strtotime($model->fecha_elaborado));
			$model->fecha_emision = date('d-m-y', strtotime($model->fecha_emision));
			$model->fecha_aprobado = date('d-m-y', strtotime($model->fecha_aprobado));
			$model->uo=Yii::app()->user->areaid;
			$data=$model->attributes;

			if ($model->fecha_aprobado < $model->fecha_emision) {
				Yii::app()->user->setFlash('error', 'La fecha de aprobación debe ser posterior al dia ' . $model->fecha_emision.' ya que este es el dia definido para la fecha de emision');
				$this->redirect(array('create', 'id' => $model->id));
			}
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CaRevisionDireccion']))
		{
			$model->attributes=$_POST['CaRevisionDireccion'];
			$model->fecha_elaborado = date('d-m-y', strtotime($model->fecha_elaborado));
			$model->fecha_emision = date('d-m-y', strtotime($model->fecha_emision));
			$model->fecha_aprobado = date('d-m-y', strtotime($model->fecha_aprobado));

			if ($model->fecha_aprobado < $model->fecha_emision) {
				Yii::app()->user->setFlash('error', 'La fecha de aprobación debe ser menor a ' . $model->fecha_emision);
				$this->redirect(array('update', 'id' => $model->id));
			}
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		CaProceso::model()->deleteAllByAttributes(array('revision' => $id));

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('CaRevisionDireccion');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CaRevisionDireccion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CaRevisionDireccion']))
			$model->attributes=$_GET['CaRevisionDireccion'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CaRevisionDireccion the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CaRevisionDireccion::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CaRevisionDireccion $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ca-revision-direccion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
