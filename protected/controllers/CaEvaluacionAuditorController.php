<?php

class CaEvaluacionAuditorController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/plantilla2';

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
			array(
				'allow',  // allow all users to perform 'index' and 'view' actions
				'actions' => array('index', 'view'),
				'users' => array('*'),
			),
			array(
				'allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('create', 'update'),
				'users' => array('@'),
			),
			array(
				'allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('admin', 'delete'),
				'users' => array('@'),
			),
			array(
				'deny',  // deny all users
				'users' => array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		if (isset($_GET['id_plan_ev']))
			$id_plan_ev = $_GET['id_plan_ev'];
		$model = new CaEvaluacionAuditor;
		$admins_sistema = Usuario::model()->findAllByAttributes(array('rol' => 3));

		if (isset($_POST['CaEvaluacionAuditor'])) {
			$model->attributes = $_POST['CaEvaluacionAuditor'];
			$model->id_plan_ev = $id_plan_ev;
			$au = CaAuditor::model()->findByPK($model->auditor);
			if ($au != null) {
				$model->area = $au->area;
				$model->nombre_auditor = $au->nombre_apellido;
			}
			$model->fecha_evaluacion = date("Y-m-d");
			$model->fecha_evaluacion = date('d-m-y', strtotime($model->fecha_evaluacion));

			// Validar que los valores de los criterios sean numéricos
			$uni = Yii::app()->user->areaid;
			$criterios = CaCriteriosEvaluaciones::model()->findAll();
			$total_notas = 0;
			foreach ($criterios as $criterio) {
				$nombre_criterio = $criterio->nombre;
				$valor_criterio = isset($_POST['nota'][$nombre_criterio]) ? $_POST['nota'][$nombre_criterio] : null;
				if ($valor_criterio === null || !is_numeric($valor_criterio)) {
					Yii::app()->user->setFlash('error', 'Todos los criterios de evaluación deben tener un valor y este debe ser numérico.');
					$model->attributes = $_POST['CaEvaluacionAuditor'];
					$this->render('create', array(
						'model' => $model,
						'id_plan_ev' => $id_plan_ev
					));
					return; // Detener la ejecución del método
				}
				$total_notas += intval($valor_criterio);
			}
			$model->evaluacion_final = $total_notas;

			if ($model->evaluacion_final > 100) {

				Yii::app()->user->setFlash('error', 'No se pudo guardar la evaluacion ya que la suma de las notas debe ser menor que 100 (valor insertado: ' . $model->evaluacion_final . ' ).');
				$model->attributes = $_POST['CaEvaluacionAuditor'];
				$this->render('create', array(
					'model' => $model,
					'id_plan_ev' => $id_plan_ev
				));
				return;
			}







			if ($model->save()) {

				function eliminarTildes($cadena)
				{
					$no_permitidas = array(
						'á' => 'a', 'Á' => 'A', 'é' => 'e', 'É' => 'E',
						'í' => 'i', 'Í' => 'I', 'ó' => 'o', 'Ó' => 'O',
						'ú' => 'u', 'Ú' => 'U', 'ñ' => 'n', 'Ñ' => 'N'
					);
					return strtr($cadena, $no_permitidas);
				}
				$useri = Usuario::model()->findByAttributes(array('nombre' => $model->nombre_auditor));
				$audit = CaAuditor::model()->findByAttributes(array('nombre_apellido' => $model->nombre_auditor));
				$nombre = eliminarTildes($model->nombre_auditor);
				if ($useri != null) {
					if ($useri->username != '---') {
						$this->sendMailer(
							"sistgestion@etecsa.cu",
							"juBHF5WJ",
							"SIG",
							"Evaluacion de Auditor",
							'Usted ha sido evaluado por trabajo en una auditoria en el  Sistema Integrado de Gestion. Por favor, ingrese a la siguiente direccion <a href="https://172.29.97.132/sig/sig/">https://172.29.97.132/sig/sig/</a> y revise sus notificaciones',
							"$audit->correo",
							"$nombre"
						);
					}
					
				}





				foreach ($criterios as $criterio) {
					$nombre_criterio = $criterio->nombre;

					// Crear objeto CaNotaCriterioEvaluacionAuditor
					$crit_eva_nota = new CaNotaCriterioEvaluacionAuditor;
					$crit_eva_nota->nombre_criterio = $nombre_criterio;
					$crit_eva_nota->id_evaluacion = $model->id;
					$crit_eva_nota->fecha = date("Y-m-d");
					$crit_eva_nota->observaciones = null;
					$crit_eva_nota->id_usuario_evaluador = Yii::app()->user->id;

					// Obtener el valor del criterio de $_POST
					$valor_criterio = isset($_POST['nota'][$nombre_criterio]) ? $_POST['nota'][$nombre_criterio] : null;
					$crit_eva_nota->nota = $valor_criterio;

					// Guardar el objeto CaNotaCriterioEvaluacionAuditor
					$crit_eva_nota->save();
				}



				if ($model->evaluacion_final < 60) {



					CaAuditor::model()->updateByPk($model->auditor, array('es_papelera' => "1"));



					if ($admins_sistema != null)
						foreach ($admins_sistema as $admin) {



							$notific = new CaNotificaciones;
							$notific->nombre = 'Evaluacion de Auditor ' . $au->nombre_apellido . ' por debajo de 60';
							$notific->tipo = "Evaluacion de Auditor por debajo de 60 admin";
							$notific->autor = Yii::app()->user->id;
							$notific->evento = $model->id;


							$notific->receptor = $admin->id;
							$notific->fecha = date('Y-m-d');
							$notific->contenido = 'Se le ha asignado a ' . $au->nombre_apellido . ' una nota de menos de 60 puntos en una evaluacion (' . $model->evaluacion_final . ' / 100)
					
					
								<br></br>

					';

							$notific->hora = time();
							$notific->icono = 'bi bi-clipboard-check-fill';
							$notific->estado = 'Activo';
							$notific->save();
						}

					$notific = new CaNotificaciones;
					$notific->nombre = 'Evaluacion de Auditor ' . $au->nombre_apellido . ' por debajo de 60';
					$notific->tipo = "Evaluacion de Auditor por debajo de 60";
					$notific->autor = Yii::app()->user->id;
					$notific->evento = $model->id;

					$us_dirigido = Usuario::model()->findByAttributes(array('nombre' => $au->nombre_apellido));
					if ($us_dirigido != null) {
						$id_us_dirigido = $us_dirigido->id;
					} else {
						$id_us_dirigido = "No existe el Usuario";
					}


					$notific->receptor = $id_us_dirigido;
					$notific->fecha = date('Y-m-d');
					// $notific->contenido='Se ha agreado a '.$model->nombre.' al listado de Auditores del Sistema';
					$notific->contenido = 'a';
					$notific->hora = time();
					$notific->icono = 'bi bi-clipboard-check-fill';
					$notific->estado = 'Activo';
					$notific->save();
					$criterios = CaNotaCriterioEvaluacionAuditor::model()->findAllByAttributes(array('id_evaluacion' => $model->id));
					CaNotificaciones::model()->updateByPk($notific->id, array('contenido' => 'Usted ha sido evaluado con la siguiente nota: ' . $model->evaluacion_final . ' / 100
								
								
								<br></br>
								<div class="row d-flex d-flex justify-content-center align-items-center" >
								Está usted conforme con su nota?
								<br></br>																							
								<div class="col-md-6 d-flex justify-content-left align-items left " ><a class="btn btn-light custom-btn col-md-3" style="text-align: center;border:2px lightgrey solid;border-radius:20px" href=" ' . CController::createUrl("/site/aceptar_eva", array('id_plan_ev' => $id_plan_ev, 'aceptado' => 1, 'evento_noti' => $model->id, 'id' => $notific->id)) . ' "><h5 style="color: #454545;text-align:center;font-family:Bahnschrift">Si</h5></a>
								<div class="col-md-6" ></div> <a class="btn btn-light custom-btn col-md-3" style="text-align: center;border:2px lightgrey solid;border-radius:20px" href=" ' . CController::createUrl("/site/aceptar_eva", array('id_plan_ev' => $id_plan_ev, 'aceptado' => 0, 'evento_noti' => $model->id, 'id' => $notific->id)) . ' "><h5 style="color: #454545;text-align:center;font-family:Bahnschrift">No</h5></a>
								
								</div>
								
								</div>	
								<br></br>					'));
				}
				if ($model->evaluacion_final >= 60) {

					if ($admins_sistema != null)
						foreach ($admins_sistema as $admin) {



							$notific = new CaNotificaciones;
							$notific->nombre = 'Evaluacion de Auditor ' . $au->nombre_apellido;
							$notific->tipo = "Evaluacion de Auditor admin";
							$notific->autor = Yii::app()->user->id;
							$notific->evento = $model->id;


							$notific->receptor = $admin->id;
							$notific->fecha = date('Y-m-d');
							$notific->contenido = 'Se le ha asignado a ' . $au->nombre_apellido . ' una nota de mas de 60 puntos en una evaluacion (' . $model->evaluacion_final . ' / 100)
					
					
								<br></br>
							
					';



							$notific->hora = time();
							$notific->icono = 'bi bi-clipboard-check-fill';
							$notific->estado = 'Activo';
							$notific->save();
						}

					$notific = new CaNotificaciones;
					$notific->nombre = 'Evaluacion de Auditor ' . $au->nombre_apellido;
					$notific->tipo = "Evaluacion de Auditor";
					$notific->autor = Yii::app()->user->id;
					$notific->evento = $model->id;

					$us_dirigido = Usuario::model()->findByAttributes(array('nombre' => $au->nombre_apellido));
					if ($us_dirigido != null) {
						$id_us_dirigido = $us_dirigido->id;
					} else {
						$id_us_dirigido = "No existe el Usuario";
					}


					$notific->receptor = $id_us_dirigido;
					$notific->fecha = date('Y-m-d');
					// $notific->contenido='Se ha agreado a '.$model->nombre.' al listado de Auditores del Sistema';
					$notific->contenido = 'a';
					$notific->hora = time();
					$notific->icono = 'bi bi-clipboard-check-fill';
					$notific->estado = 'Activo';
					$notific->save();
					CaNotificaciones::model()->updateByPk($notific->id, array('contenido' => 'Usted ha sido evaluado con la siguiente nota:  ' . $model->evaluacion_final . ' / 100
								
							
								<br></br>
								<div class="row d-flex d-flex justify-content-center align-items-center" >
								Está usted conforme con su nota?
								<br></br>
								<div class="col-md-6 d-flex justify-content-left align-items left " ><a class="btn btn-light custom-btn col-md-3" style="text-align: center;border:2px lightgrey solid;border-radius:20px" href=" ' . CController::createUrl("/site/aceptar_eva", array('id_plan_ev' => $id_plan_ev, 'aceptado' => 1, 'evento_noti' => $model->id, 'id' => $notific->id)) . ' "><h5 style="color: #454545;text-align:center;font-family:Bahnschrift">Si</h5></a>
								<div class="col-md-6" ></div> <a class="btn btn-light custom-btn col-md-3" style="text-align: center;border:2px lightgrey solid;border-radius:20px" href=" ' . CController::createUrl("/site/aceptar_eva", array('id_plan_ev' => $id_plan_ev, 'aceptado' => 0, 'evento_noti' => $model->id, 'id' => $notific->id)) . ' "><h5 style="color: #454545;text-align:center;font-family:Bahnschrift">No</h5></a>
								
								</div>
								</div>	
								<br></br>
																					
					'));
				}



				$this->redirect(array('admin', 'id' => $model->id, 'id_plan_ev' => $id_plan_ev));
			}
		}
		// $model->attributes = $postedData; 

		$this->render('create', array(
			'model' => $model,

		));
	}




	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{


		if (isset($_GET['id_plan_ev']))
			$id_plan_ev = $_GET['id_plan_ev'];

		$model = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['CaEvaluacionAuditor'])) {
			$model->attributes = $_POST['CaEvaluacionAuditor'];
			$model->fecha_evaluacion = date('d-m-y', strtotime($model->fecha_evaluacion));



			if ($model->evaluacion_final > 100) {

				var_dump($model->evaluacion_final);
				Yii::app()->user->setFlash('error', 'No se pudo guardar la evaluacion ya que la suma de las notas debe ser 100 y no ' . $model->evaluacion_final . ' .');
				$this->redirect(array('update', 'id' => $model->id, 'id_plan_ev' => $id_plan_ev));
			}






			if ($model->save())
				$this->redirect(array('admin', 'id_plan_ev' => $model->id_plan_ev));
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
		$this->loadModel($id)->delete();
		CaNotificaciones::model()->deleteAllByAttributes(array('evento' => $id));
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('CaEvaluacionAuditor');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new CaEvaluacionAuditor('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['CaEvaluacionAuditor']))
			$model->attributes = $_GET['CaEvaluacionAuditor'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CaEvaluacionAuditor the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = CaEvaluacionAuditor::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CaEvaluacionAuditor $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'ca-evaluacion-auditor-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
