<?php

class CaEquipoAuditorController extends Controller
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
		$model=new CaEquipoAuditor;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CaEquipoAuditor']))
		{
			$model->attributes=$_POST['CaEquipoAuditor'];
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

		if(isset($_POST['CaEquipoAuditor']))
		{
			$model->attributes=$_POST['CaEquipoAuditor'];
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
		
		$equipo=$this->loadModel($id);
		$plan=$equipo->plan_audit;
		$a=CaAuditor::model()->findByAttributes(array('id'=>$equipo->auditor));
			if($equipo->funcion=='jefe'){$a->es_jefe=0;}
			$a->disponibilidad=1;$a->equipo_de_auditores=0;
			$a->save();
			if($equipo->delete()){
				$this->redirect(array('admin','id'=>$equipo->id,'plan_id'=>$plan));
			}
			$this->render('admin',array(
				'model'=>$equipo,
				'plan_id'=>$plan
			));
			
		// // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		// if(!isset($_GET['ajax']))
		// 	$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('CaEquipoAuditor');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($plan_id){
		$model=new CaEquipoAuditor;
		$pl = CaAuditoria::model()->findByPk($plan_id);

		$model->unsetAttributes();  // clear any default values
		if(isset($_POST['CaEquipoAuditor'])){
			$model->attributes=$_POST['CaEquipoAuditor'];
			$model->plan_audit=$pl->id;
			

			if($model->save()){
				$a=CaAuditor::model()->findByAttributes(array('id'=>$model->auditor));

				if($model->funcion=='jefe'){
					$a->es_jefe=1;}
				$a->disponibilidad=0;
				$a->equipo_de_auditores=$pl->id;
				$a->save();
	
				$this->redirect(array('admin','id'=>$model->id,'plan_id'=>$plan_id));}
		}
		$this->render('admin',array(
			'model'=>$model,
			'plan_id'=>$plan_id		
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CaEquipoAuditor the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CaEquipoAuditor::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CaEquipoAuditor $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ca-equipo-auditor-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
