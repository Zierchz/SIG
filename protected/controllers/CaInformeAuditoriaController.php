<?php

class CaInformeAuditoriaController extends Controller
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
		if(isset($_GET['audit_id']))
				$audit_id=$_GET['audit_id'];
		$model=new CaInformeAuditoria;
		$p=CaPlanAuditoria::model()->findByAttributes(array('auditoria'=>$audit_id));
		$model->alcance=$p->alcance;
		$model->objetivo_auditoria=$p->objetivo_plan;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CaInformeAuditoria']))
		{
			$model->attributes=$_POST['CaInformeAuditoria'];
			$model->audit_id=$audit_id;
			$model->fecha_informe=date('Y-m-d');
			$model->fecha_informe = date('d-m-y', strtotime($model->fecha_informe));

			
			





			if($model->save())
				$this->redirect(array('admin','id'=>$model->id,'audit_id'=>$audit_id));
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

		if(isset($_POST['CaInformeAuditoria']))
		{
			$model->attributes=$_POST['CaInformeAuditoria'];
			$model->fecha_informe = date('d-m-y', strtotime($model->fecha_informe));

			if($model->save())
				$this->redirect(array('admin','audit_id'=>$model->audit_id));
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

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('CaInformeAuditoria');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CaInformeAuditoria('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CaInformeAuditoria']))
			$model->attributes=$_GET['CaInformeAuditoria'];


			

		$this->render('admin',array(
			'model'=>$model,
			
		));
	}
	public function actionHasReport($audit_id) {
		$hasReport = CaInformeAuditoria::model()->exists();
		echo json_encode(array('hasReport' => $hasReport));
	  }
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CaInformeAuditoria the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CaInformeAuditoria::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CaInformeAuditoria $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ca-informe-auditoria-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
