<?php

class UnidadOrganizativaController extends Controller
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
		$model=new UnidadOrganizativa;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UnidadOrganizativa']))
		{
			$model->attributes=$_POST['UnidadOrganizativa'];
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
    $model = $this->loadModel($id);

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if (isset($_POST['UnidadOrganizativa'], $_POST['unidadid'])) {
        $model->attributes = $_POST['UnidadOrganizativa'];
		CaRelacionUnidad::model()->deleteAllByAttributes(array('id_rectora'=>$model->id));
        if ($model->save()) {
            // Loop through all the checkboxes named 'unidadid'
            foreach ($_POST['unidadid'] as $unidadId) {
                // Create a new CaRelacionUnidad instance for each checked checkbox
                $relationModel = new CaRelacionUnidad;
				$relationModel->id_rectora = $model->id;
				$relationModel->sigla_rectora = $model->siglas;
                $relationModel->id_auditada = $unidadId; // Assuming 'id_auditada' is the field for the unit ID
                $relationModel->sigla_auditada = UnidadOrganizativa::model()->findByPk($unidadId)->siglas;
				$relacion=CaRelacionUnidad::model()->findAllByAttributes(array('id_rectora'=>$model->id,'id_auditada'=>$unidadId));
				if($relacion==null){
				$relationModel->save(); // Save the new relation
				}
            }
            $this->redirect(array('admin'));
        }
    }

    $this->render('update', array(
        'model' => $model,
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
    $unidadRAuditoria = CaAuditoria::model()->findByAttributes(array('unidad_rec'=> $model->id));
    $unidadAAuditoria = CaAuditoria::model()->findByAttributes(array('unidad_aud'=> $model->id));
    $unidadRPrograma = CaProgramaAuditoria::model()->findByAttributes(array('unidad_rectora'=> $model->id));
    $unidadAPrograma = CaProgramaAuditoria::model()->findByAttributes(array('unidad_a_auditar'=> $model->id));
    $unidadAuditor = CaAuditor::model()->findByAttributes(array('unidad'=> $model->id));

    if($unidadRAuditoria || $unidadAAuditoria || $unidadRPrograma || $unidadAPrograma || $unidadAuditor) {
        $message = 'La unidad organizativa que intenta borrar está asignada en algún programa de auditoría, auditoría individual o auditor. Por favor, elimine esas dependencias primero...';
        if(Yii::app()->request->isAjaxRequest) {
            echo CJSON::encode(array('success' => false, 'message' => $message));
            Yii::app()->end();
        } else {
            Yii::app()->user->setFlash('error', $message);
            $this->redirect(array('admin'));
        }
    } else {
        $this->loadModel($id)->delete();
        CaRelacionUnidad::model()->deleteAllByAttributes(array('id_rectora' => $id));

        if(Yii::app()->request->isAjaxRequest) {
            echo CJSON::encode(array('success' => true));
            Yii::app()->end();
        } else {
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
    }
}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('UnidadOrganizativa');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new UnidadOrganizativa('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UnidadOrganizativa']))
			$model->attributes=$_GET['UnidadOrganizativa'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return UnidadOrganizativa the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=UnidadOrganizativa::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param UnidadOrganizativa $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='unidad-organizativa-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
