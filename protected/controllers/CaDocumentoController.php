<?php

class CaDocumentoController extends Controller
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
	$model = new CaDocumento();
	
		if(isset($_GET['audit']))
			$audit=$_GET['audit'];
			if(isset($_GET['audit_nombre']))
			$audit_nombre=$_GET['audit_nombre'];
	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if (isset($_POST['CaDocumento'])) {
		$model->attributes = $_POST['CaDocumento'];
		$model->fecha_creacion=date("Y-m-d", time());
		$model->autor=Yii::app()->user->fullname;
		$model->unidad_o= Yii::app()->user->areaid;
		$model->auditor=$audit;
		


		



		$uploadedFile = CUploadedFile::getInstance($model, 'url');
		// var_dump($carpetaDestino);die;
		if ($uploadedFile != null) {
			$nombreArchivo = $uploadedFile->getName();
			$model->url = $nombreArchivo;
			

			$carpetaDestino=dirname(Yii::app()->BasePath). DIRECTORY_SEPARATOR .'calidaddocs' . DIRECTORY_SEPARATOR. 'AUDITORES' . DIRECTORY_SEPARATOR . $audit . DIRECTORY_SEPARATOR. 'expediente' . DIRECTORY_SEPARATOR; 
			// $carpetaDestino = "C:/xampp/htdocs/portalbi/calidaddocs/{$audit}/expediente/";
			$rutaArchivoDestino = $carpetaDestino . $nombreArchivo;

			if (!is_dir($carpetaDestino)) {
				mkdir($carpetaDestino, 0777, true);
			}

			$uploadedFile->saveAs($rutaArchivoDestino);
		}
		$model->fecha_creacion = date('d-m-y', strtotime($model->fecha_creacion));

		if ($model->save()) {
			$this->redirect(array('admin', 'id' => $model->id,'audit'=>$audit,'audit_nombre'=>$audit_nombre));
		}
	}

	$this->render('create', array(
		'model' => $model,
		 'audit' => $audit,
		//  'audit_nombre' => $audit_nombre,
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

		if(isset($_POST['CaDocumento']))
		{
			$model->attributes=$_POST['CaDocumento'];
			$model->fecha_creacion = date('d-m-y', strtotime($model->fecha_creacion));

			if($model->save())
				$this->redirect(array('view','id'=>$model->id,));
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
	
    $model = $this->loadModel($id);
    $urlArchivo = $model->url; 
	

    if ($model->delete()) {

		$rutaArchivo=dirname(Yii::app()->BasePath). DIRECTORY_SEPARATOR .'calidaddocs' . DIRECTORY_SEPARATOR. 'AUDITORES' . DIRECTORY_SEPARATOR . $model->auditor . DIRECTORY_SEPARATOR. 'expediente' . DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR. $urlArchivo; 

        // $rutaArchivo = "C:/xampp/htdocs/portalbi/calidaddocs/{$model->auditor}/expediente/{$urlArchivo}";

        if (file_exists($rutaArchivo)) {
            unlink($rutaArchivo); 
        }
    }

    
    if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('CaDocumento');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */

	public function actionAdmin($audit)
	 	{
		 $model = new CaDocumento;
		 $au = CaAuditor::model()->findByPk($audit); 
		 
		 if(isset($_GET['audit']))
			 $audit=$_GET['audit'];
		 if(isset($_GET['audit_nombre']))
			 $audit_nombre=$_GET['audit_nombre'];
		 
		 
		 if (isset($_POST['CaDocumento'])) {
			 $model->attributes = $_POST['CaDocumento'];
			 $model->fecha_creacion = date("Y-m-d", time());
			 $model->autor = Yii::app()->user->fullname;
			 $model->unidad_o = Yii::app()->user->areaid;
			 
			 $uploadedFile = CUploadedFile::getInstance($model, 'url');

			 if ($uploadedFile != null) {
				 $nombreArchivo = $uploadedFile->getName();
				 $model->url = $nombreArchivo;
				 $model->auditor = $audit;
				 $model->auditor_nombre = $audit_nombre;
	 
				 $carpetaDestino = dirname(Yii::app()->BasePath) . DIRECTORY_SEPARATOR . 'calidaddocs' . DIRECTORY_SEPARATOR . 'AUDITORES' . DIRECTORY_SEPARATOR . $audit_nombre . DIRECTORY_SEPARATOR . 'expediente' . DIRECTORY_SEPARATOR; 
				 $rutaArchivoDestino = $carpetaDestino . $nombreArchivo;
	 
				 if (!is_dir($carpetaDestino)) {
					 mkdir($carpetaDestino, 0777, true);
				 }
	 
				 $uploadedFile->saveAs($rutaArchivoDestino);
			 }
			 $model->fecha_creacion = date('d-m-Y', strtotime($model->fecha_creacion));
	 
	 
			 if($model->save()){
				 $this->redirect(array('admin','audit'=>$audit,'audit_nombre'=>$audit_nombre));
			 } 
		 }
	 
		 $this->render('admin', array(
			 'model' => $model,
			 'au' => $au,
			 'url' => $model->url,
		 ));
	 }
	 

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CaDocumento the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CaDocumento::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CaDocumento $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ca-documento-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
