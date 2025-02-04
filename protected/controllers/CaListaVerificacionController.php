<?php

class CaListaVerificacionController extends Controller
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
		if(isset($_GET['lista']))
		$lista=$_GET['lista'];

		$model=new CaListaVerificacion;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CaListaVerificacion']))
		{
			$model->attributes=$_POST['CaListaVerificacion'];
			$model->auditoria_id=$lista;
		$pl=CaPlanAuditoria::model()->findbyAttributes(array('auditoria'=>$model->auditoria_id));
		$a=CaAuditoria::model()->findbyAttributes(array('id'=>$model->auditoria_id));
		$b=CaEquipoAuditor::model()->findByAttributes(array('plan_audit'=>$a->id,'funcion'=>'jefe'));

		if ($b!=null) {
			$model->lider=$b->auditor;
		}
		
		if ($a!=null) {
			$model->area_audit=$a->unidad_aud;
		}
		
		$model->id_plan_lista=$lista;
		$model->fecha = date('d-m-y', strtotime($model->fecha));
		 if ($b==null) {
             Yii::app()->user->setFlash('error', 'No se ha definido un jefe del equipo de auditores en el plan de auditorías correspondiente a esta Lista.');
             $this->redirect(array('create', 'id' => $model->id, 'lista'=>$lista));
         }

			if($model->save())
				$this->redirect(array('admin','id'=>$model->id,'lista'=>$lista));
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
		$pl=CaPlanAuditoria::model()->findbyAttributes(array('auditoria'=>$model->auditoria_id));



		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CaListaVerificacion']))
		{
			$model->attributes=$_POST['CaListaVerificacion'];
			if ($model->fecha < $pl->fecha_plan) {
				Yii::app()->user->setFlash('error', 'La fecha de la lista debe ser menor a ' . $pl->fecha_plan . ', pues es la fecha del plan de auditorías correspondiente');
				$this->redirect(array('update', 'id' => $model->id));
			}
			if($model->save())
				$this->redirect(array('admin','lista'=>$model->id_plan_lista));
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
		$dataProvider=new CActiveDataProvider('CaListaVerificacion');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CaListaVerificacion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CaListaVerificacion']))
			$model->attributes=$_GET['CaListaVerificacion'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CaListaVerificacion the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CaListaVerificacion::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CaListaVerificacion $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ca-lista-verificacion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
