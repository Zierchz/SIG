<?php

class CaActividadController extends Controller
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
		$model=new CaActividad;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CaActividad']))
		{
			$model->attributes=$_POST['CaActividad'];
			
        
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id));}
			
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
		$pl = CaPlanAuditoria::model()->findByPk($model->plan);
		if (isset($_POST['CaActividad'])) {
			$model->attributes = $_POST['CaActividad'];
			// if ($this->convertirFecha($model->fecha) < $this->convertirFecha($pl->fecha_plan)) {
			// 	Yii::app()->user->setFlash('error', 'La fecha de la actividad debe ser mayor que ' . $pl->fecha_plan . ', pues es la fecha del plan de auditorías correspondiente');
				
				
			// 	$this->render('update', array(
			// 		'model' => $model,
			// 		'pl' => $pl,
			// 	));
			// 	return;
			// }
			if (!$this->validarFormatoHora($model->hora)) {
				Yii::app()->user->setFlash('error', 'El formato de la hora no es válido. Debe ser en formato "HH:MM" y hora civil.');
				
				
				$this->render('update', array(
					'model' => $model,
					'pl' => $pl,
				));
				return;
			} 
			if (!$this->validarFormatoHora($model->hora_fin)) {
				Yii::app()->user->setFlash('error', 'El formato de la hora no es válido. Debe ser en formato "HH:MM" y hora civil.');
				
				
				$this->render('update', array(
					'model' => $model,
					'pl' => $pl,
				));
				return;
			} 
				$model->fecha = date('d-m-Y', strtotime($model->fecha));
	
				if ($model->save()) {
					$this->redirect(array('admin', 'id' => $model->id, 'plan_id' => $model->plan));
				}
			
		}
		$this->render('update',array(
			'model'=>$model,
			'pl' => $pl,
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
		$dataProvider=new CActiveDataProvider('CaActividad');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($plan_id)
{
    $model = new CaActividad('search');
    $pl = CaPlanAuditoria::model()->findByPk($plan_id);

    // Almacenar los valores enviados en el formulario
    $postedData = isset($_POST['CaActividad']) ? $_POST['CaActividad'] : null;
	
    if ($postedData !== null) {
        $model->attributes = $postedData;

        if ($pl != null) {
            $model->plan = $pl->id;
        }

		
		// if ($this->convertirFecha($model->fecha) < $this->convertirFecha($pl->fecha_plan)) {
		// 	Yii::app()->user->setFlash('error', 'La fecha de la actividad debe ser mayor que ' . $pl->fecha_plan . ', pues es la fecha del plan de auditorías correspondiente');
			
		// 	// Volver a asignar los valores al modelo
		// 	$model->attributes = $postedData;
			
		// 	$this->render('admin', array(
		// 		'model' => $model,
		// 		'pl' => $pl,
		// 	));
		// 	return;
		// }

        if (!$this->validarFormatoHora($model->hora)) {
            Yii::app()->user->setFlash('error', 'El formato de la hora no es válido. Debe ser en formato "HH:MM" y hora civil.');
			
            // Volver a asignar los valores al modelo
            $model->attributes = $postedData;
			
            $this->render('admin', array(
                'model' => $model,
                'pl' => $pl,
            ));
            return;
        }
		if (!$this->validarFormatoHora($model->hora_fin)) {
			Yii::app()->user->setFlash('error', 'El formato de la hora no es válido. Debe ser en formato "HH:MM" y hora civil.');
			
			
			$this->render('update', array(
				'model' => $model,
				'pl' => $pl,
			));
			return;
		}  else {
            $model->fecha = date('d-m-Y', strtotime($model->fecha));

            if ($model->save()) {
                $this->redirect(array('admin', 'id' => $model->id, 'plan_id' => $plan_id));
            }
        }
    }

    $this->render('admin', array(
        'model' => $model,
        'pl' => $pl,
    ));
}


// Función para validar el formato de la hora
public function validarFormatoHora($hora)
{
    // Expresión regular para el formato de la hora "HH:MM" en rango de 01:00 a 12:59
    $patronHora = '/^(0[1-9]|1[0-2]):[0-5]\d$/';

    return preg_match($patronHora, $hora);
}


public function convertirFecha($fecha)
{
    // Convertir la fecha al formato 'Y-m-d'
    $fechaFormateada = date('Y-m-d', strtotime($fecha));
	
    // Eliminar los guiones y convertir la fecha a un entero
    $fechaSinGuiones = str_replace('-', '', $fechaFormateada);
    // Convertir la cadena resultante a entero
    $fechaComoEntero = intval($fechaSinGuiones);
    return $fechaComoEntero;
}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CaActividad the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CaActividad::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CaActividad $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ca-actividad-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
