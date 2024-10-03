<?php

class CaDocumentoInformeController extends Controller
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
		$model=new CaDocumentoInforme;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CaDocumentoInforme']))
		{
			$model->attributes=$_POST['CaDocumentoInforme'];
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

		if(isset($_POST['CaDocumentoInforme']))
		{
			$model->attributes=$_POST['CaDocumentoInforme'];
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

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('CaDocumentoInforme');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
{
    $model = new CaDocumentoInforme;

    if (isset($_GET['id_informe'])) {
        $id_informe = $_GET['id_informe'];
    }

    if (isset($_POST['CaDocumentoInforme'])) {
        $model->attributes = $_POST['CaDocumentoInforme'];
        $model->id_informe = $id_informe;

        $uploadedFile = CUploadedFile::getInstance($model, 'url');
        if ($uploadedFile != null) {
            $nombreArchivo = $uploadedFile->getName();
            $extension = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));

            if ($extension != 'pdf') {
                Yii::app()->user->setFlash('error', 'El archivo subido debe ser de tipo pdf');
				
                $this->render('admin', array(
                    'model' => $model,
                ));
                return;
            }

            $model->url = $nombreArchivo;

            $informe = CaInformeAuditoria::model()->findByPk($model->id_informe);
			$model->fecha_informe =$informe->fecha_informe;
            $fechaInforme = $informe->fecha_informe;
            $carpetaDestino = dirname(Yii::app()->basePath) . DIRECTORY_SEPARATOR . 'calidaddocs' . DIRECTORY_SEPARATOR . 'DOCUMENTOS DE INFORMES DE AUDITORÍA' . DIRECTORY_SEPARATOR . 'Informe de Auditoría del ' . $fechaInforme . DIRECTORY_SEPARATOR;

            $rutaArchivoDestino = $carpetaDestino . $nombreArchivo;

            if (!is_dir($carpetaDestino)) {
                mkdir($carpetaDestino, 0777, true);  
            }

            $uploadedFile->saveAs($rutaArchivoDestino);
        }

        if ($model->save()) {
            $this->redirect(array('admin', 'id' => $model->id, 'id_informe' => $id_informe));
        }
    }

    $this->render('admin', array(
        'model' => $model,
    ));
}




	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CaDocumentoInforme the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CaDocumentoInforme::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CaDocumentoInforme $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ca-documento-informe-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
