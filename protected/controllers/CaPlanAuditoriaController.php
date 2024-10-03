<?php

class CaPlanAuditoriaController extends Controller
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
	{	if(isset($_GET['plan']))
		$plan=$_GET['plan'];
		$model=new CaPlanAuditoria;
		$a=CaAuditoria::model()->findByPk($plan);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CaPlanAuditoria']))
		{
			$model->attributes=$_POST['CaPlanAuditoria'];
			$model->auditoria=$plan;
			$model->area=$a->unidad_aud;
			$model->plan_elaborado_por=Yii::app()->user->fullname;
			$model->fecha_plan=date("d-m-Y");
			

			
			

			

			if($model->save())
				$this->redirect(array('admin','id'=>$model->id,'plan'=>$plan));
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
		
		if(isset($_GET['plan']))
				$plan=$_GET['plan'];

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CaPlanAuditoria']))
		{
			$model->attributes=$_POST['CaPlanAuditoria'];
			$model->plan_elaborado_por=Yii::app()->user->fullname;

			
			 if($model->save())
				$this->redirect(array('admin','id'=>$model->id,'plan'=>$model->auditoria));
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
    $plan=$this->loadModel($id);
	$equipos=CaEquipoAuditor::model()->findAllByAttributes(array('plan_audit'=>$id));
	$actividades=CaActividad::model()->findAllByAttributes(array('plan'=>$id));
	if($equipos!=null){
		foreach($equipos as $equipo){
			$aud=CaAuditor::model()->findbyAttributes(array('id'=>$equipo->auditor));
			$aud->disponibilidad=1;
			$aud->equipo_de_auditores=0;
			if($aud->es_jefe=1){$aud->es_jefe=0;}
			$aud->save();
			$equipo->delete();
		}
		
		foreach($actividades as $actividad){
			$actividad->delete();
		}
	}

	


	$plan->delete();
		 

    // Si la solicitud no es una llamada AJAX, redireccionar a la página de administración
    // if (!isset($_GET['ajax'])) {
    //     $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    // }
}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('CaPlanAuditoria');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CaPlanAuditoria('search');
		$model->unsetAttributes();  // clear any default values




		
		if(isset($_GET['CaPlanAuditoria']))
			$model->attributes=$_GET['CaPlanAuditoria'];


		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CaPlanAuditoria the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CaPlanAuditoria::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CaPlanAuditoria $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ca-plan-auditoria-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
