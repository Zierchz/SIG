<?php

class CaAuditorController extends Controller
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


		$model = new CaAuditor;

		$admins_sistema = Usuario::model()->findAllByAttributes(array('rol' => 3));



		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['CaAuditor'])) {


			$model->attributes = $_POST['CaAuditor'];

			$trabajador = Trabajador::model()->findByPk($model->nombre);

			if ($trabajador != null) {
				$t_fijo = $trabajador->telef_casa;
				$t_movil = $trabajador->movil;
				$mail = $trabajador->correo;
				$nomb = $trabajador->nombre_apellidos;

				$are = Area::model()->findByAttributes(array('id' => $trabajador->departamento));
				$are_nombre = $are->nombre;

				$uni = UnidadOrganizativaBdut::model()->findByAttributes(array('id' => $are->id_uorg));

				$carg = Cargo::model()->findByAttributes(array('id' => $trabajador->cargo));
				$carg_nombre = $carg->nombre;

				$unidad = UnidadOrganizativa::model()->findByAttributes(array('siglas' => $uni->uo_siglas));

				$model->es_papelera = 0;
				$model->es_jefe = 0;
				$model->telf_fijo = $t_fijo;
				$model->telf_movil = $t_movil;
				$model->area = $are_nombre;
				$model->correo = $mail;
				$model->cargo = $carg_nombre;
				$model->nombre_apellido = $nomb;
				$model->disponibilidad = 1;
				$model->id_quien_lo_crea = Yii::app()->user->id;
			}


			if ($model->save()) {


				function eliminarTildes($cadena)
				{
					$no_permitidas = array(
						'á' => 'a',
						'Á' => 'A',
						'é' => 'e',
						'É' => 'E',
						'í' => 'i',
						'Í' => 'I',
						'ó' => 'o',
						'Ó' => 'O',
						'ú' => 'u',
						'Ú' => 'U',
						'ñ' => 'n',
						'Ñ' => 'N'
					);
					return strtr($cadena, $no_permitidas);
				}

				$nombre = eliminarTildes($model->nombre_apellido);

				$this->sendMailer(
					"sistgestion@etecsa.cu",
					"juBHF5WJ",
					"SIG",
					"Adicion al Banco de Auditores",
					'Usted ha sido agregado al banco de auditores del Sistema Integrado de Gestion. Por favor, ingrese a la siguiente direccion <a href="https://172.29.97.132/sig/">https://172.29.97.132/sig/</a> y revise sus notificaciones. En caso de no tener acceso al sistema, comuníquese con su administrador.',
					"$model->correo",
					"$nombre"
				);





				if ($admins_sistema != null)
					foreach ($admins_sistema as $admin) {



						$notific = new CaNotificaciones;
						$notific->nombre = 'Creacion de Auditor ';
						$notific->tipo = 'Creacion de Auditor ';
						$notific->autor = Yii::app()->user->id;
						$notific->evento = $model->id;



						$notific->receptor = $admin->id;
						$notific->fecha = date('Y-m-d');
						$notific->contenido = 'Se a agregado a ' . $model->nombre_apellido . ' al banco de Auditores del Sistema ';
						$notific->hora = time();
						$notific->icono = 'bi bi-person-badge';
						$notific->estado = 'Activo';
						$notific->save();
					}
				$notific = new CaNotificaciones;
				$notific->nombre = 'Creacion de Auditor ';
				$notific->tipo = 'Creacion de Auditor ';
				$notific->autor = Yii::app()->user->id;
				$notific->evento = $model->id;

				$us_dirigido = Usuario::model()->findByAttributes(array('nombre' => $model->nombre_apellido));
				if ($us_dirigido != null) {
					$id_us_dirigido = $us_dirigido->id;
				} else {
					$id_us_dirigido = "No existe el Usuario";
				}


				$notific->receptor = $id_us_dirigido;
				$notific->fecha = date('Y-m-d');
				// $notific->contenido='Se ha agreado a '.$model->nombre.' al listado de Auditores del Sistema';
				$notific->contenido = 'Usted ha sido agregado al banco de Auditores del Sistema';
				$notific->hora = time();
				$notific->icono = 'bi bi-person-badge';
				$notific->estado = 'Activo';
				$notific->save();


				$carpetaTrabajador = "calidaddocs/AUDITORES/{$model->nombre_apellido}/expediente";
				if (!is_dir($carpetaTrabajador)) {
					mkdir($carpetaTrabajador, 0777, true);
				}
				$useri = Usuario::model()->findByAttributes(array('nombre' => $model->nombre_apellido));
				if (!$useri) {
					Yii::app()->user->setFlash('error', 'El auditor que ha creado no tiene un usuario correspondiente dentro del Sistema Integrado de Gestión, por favor, créelo.');
				}
				$this->redirect(array('view', 'id' => $model->id));
			}
		}




		$this->render('create', array(
			'model' => $model,
		));
	}

	//

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
		if ($model->es_papelera == 1) {
			$model->es_papelera = 0;
			$model->save();
			Yii::app()->user->setFlash('error', 'El auditor ha sido restaurado satisfactoriamente.');
			$this->redirect(array('admin', 'id' => $model->id));
		} else {
			if (isset($_POST['CaAuditor'])) {
				$model->attributes = $_POST['CaAuditor'];




				if ($model->save())
					$this->redirect(array('view', 'id' => $model->id));
			}

			$this->render('update', array(
				'model' => $model,
			));
		}
	}





	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);

		// Eliminar documentos relacionados
		CaEquipoAuditor::model()->deleteAllByAttributes(array('auditor' => $id));

		// Obtener el valor de la carpeta del trabajador
		$carpetaTrabajador = dirname(Yii::app()->BasePath) . DIRECTORY_SEPARATOR . 'calidaddocs' . DIRECTORY_SEPARATOR . 'AUDITORES' . DIRECTORY_SEPARATOR . $model->nombre_apellido;




		if ($model->es_papelera == 0) {
			$model->es_papelera = 1;
			$model->save();
		}

		if ($model->es_papelera == 1) {
			CaDocumento::model()->deleteAllByAttributes(array('auditor' => $id));
			if (is_dir($carpetaTrabajador)) {
				$this->eliminarDirectorio($carpetaTrabajador);
			}
			$this->loadModel($id)->delete();
		}

		// Redirigir a la página adecuada
		if (!isset($_GET['ajax'])) {
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
	}

	/**
	 * Función para eliminar un directorio y sus archivos internos recursivamente.
	 * @param string $carpeta La ruta de la carpeta a eliminar.
	 */
	private function eliminarDirectorio($carpeta)
	{
		foreach (glob($carpeta . '/*') as $archivo) {
			if (is_dir($archivo)) {
				$this->eliminarDirectorio($archivo);
			} else {
				unlink($archivo);
			}
		}
		rmdir($carpeta);
	}


	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('CaAuditor');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new CaAuditor('search');
		$model->unsetAttributes();  // clear any default values



		if (isset($_GET['CaAuditor']))
			$model->attributes = $_GET['CaAuditor'];

		$vis = "";
		if (isset($_GET['vista']))
			$vis = $_GET['vista'];

		$this->render('admin', array(
			'model' => $model,
			'vista' => $vis,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CaAuditor the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = CaAuditor::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CaAuditor $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'ca-auditor-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
