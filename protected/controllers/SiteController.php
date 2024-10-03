<?php
require './vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//session_start();
class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	public $layout='//layouts/plantilla2';

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		if(!Yii::app()->user->id && !isset($_SESSION['roleid']))
		{
			$this->actionLogin();
			
		}
		else{
			// $id = Yii::app()->user->id;
			// $user = Usuario::model()->findByPk($id);
			// if($user->validatePassword('Cmi.2023'))
			// 	$this->actionCambioPass();
			// else
			// 	$this->actionHome();
			if(!isset($_SESSION['roleid']))
				$this->actionHome();
			else
				$this->actionHome1();
				
		}
		
			
	}

	function actionexcel(){
		// Incluir la librería PhpSpreadsheet
		require 'vendor/autoload.php';
	
		// Crear una instancia de PhpSpreadsheet
		$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
	
		// Establecer el título de la hoja de cálculo
		$spreadsheet->getActiveSheet()->setTitle('Listado de Auditores');
	
		// Obtener los auditores desde la base de datos (suponiendo que $auditores es una matriz con los datos)
		$auditores = CaAuditor::model()->findAll();
		
		// Fusionar celdas para encabezados
		$spreadsheet->getActiveSheet()->mergeCells('B2:D6');
		$spreadsheet->getActiveSheet()->mergeCells('E2:F6');
		$spreadsheet->getActiveSheet()->mergeCells('G2:I2');
		$spreadsheet->getActiveSheet()->mergeCells('G3:G4');
		$spreadsheet->getActiveSheet()->mergeCells('H3:I4');
		$spreadsheet->getActiveSheet()->mergeCells('G5:H6');
		$spreadsheet->getActiveSheet()->mergeCells('I5:I6');
		$spreadsheet->getActiveSheet()->mergeCells('E7:F7');
		$spreadsheet->getActiveSheet()->mergeCells('H9:I9');
	
		// Establecer texto de prueba en celdas fusionadas
		// Agregar imagen en la celda B2
		$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
		$drawing->setPath('./images/logotipo-etecsa-version-horizontal-.png');
		$drawing->setCoordinates('B2');
		$drawing->setWidth(900); // Ajustar el ancho de la imagen
		$drawing->setHeight(85); // Ajustar la altura de la imagen
		$drawing->setOffsetX(400); // Ajustar la posición horizontal de la imagen
		$drawing->setWorksheet($spreadsheet->getActiveSheet());
	
		$spreadsheet->getActiveSheet()->setCellValue('E2', 'Listado de Auditores Internos    Año:'.date("Y"));
		$spreadsheet->getActiveSheet()->setCellValue('G2', '');
		$spreadsheet->getActiveSheet()->setCellValue('G3', 'Revisión: 1');
		$spreadsheet->getActiveSheet()->setCellValue('H3', 'Fecha de emisión: '.date("d").'/'.date("m").'/'.date("Y"));
		$spreadsheet->getActiveSheet()->setCellValue('G5', 'Hoja: 1');
		$spreadsheet->getActiveSheet()->setCellValue('I5', 'de: 1');
		$spreadsheet->getActiveSheet()->setCellValue('D8', 'Unidad Organizativa : DCIE');
		$spreadsheet->getActiveSheet()->setCellValue('E7', 'Listado de Auditores Internos');
		$spreadsheet->getActiveSheet()->setCellValue('H9', 'REG 4 PG-SC-012/03');
	
		// Crear encabezados de columna
		$spreadsheet->getActiveSheet()->mergeCells('B10:B11');
		$spreadsheet->getActiveSheet()->mergeCells('C10:C11');
		$spreadsheet->getActiveSheet()->mergeCells('D10:D11');
		$spreadsheet->getActiveSheet()->mergeCells('E10:E11');
		$spreadsheet->getActiveSheet()->mergeCells('F10:F11');
		$spreadsheet->getActiveSheet()->mergeCells('G10:G11');
		$spreadsheet->getActiveSheet()->mergeCells('H10:H11');
		$spreadsheet->getActiveSheet()->mergeCells('I10:I11');
		
		$spreadsheet->getActiveSheet()->setCellValue('B10', 'No.');
		$spreadsheet->getActiveSheet()->setCellValue('C10', 'Nombres y Apellidos');
		$spreadsheet->getActiveSheet()->setCellValue('D10', 'Cargo/Área');
		$spreadsheet->getActiveSheet()->setCellValue('E10', 'Unidad Organizativa');
		$spreadsheet->getActiveSheet()->setCellValue('F10', 'Correo/Teléfono');
		$spreadsheet->getActiveSheet()->setCellValue('G10', 'Competencias');
		$spreadsheet->getActiveSheet()->setCellValue('H10', 'Alcance');
		$spreadsheet->getActiveSheet()->setCellValue('I10', 'Observaciones');
	
		// Rellenar datos de auditores
		$row = 12; // Comenzar desde la fila 12 para dejar espacio para el encabezado
		foreach ($auditores as $auditor) {
			$uni=UnidadOrganizativa::model()->findByPk($auditor->unidad);
			// Fusionar celdas para cada fila
			$spreadsheet->getActiveSheet()->mergeCells('B' . $row . ':B' . ($row + 1));
			$spreadsheet->getActiveSheet()->mergeCells('C' . $row . ':C' . ($row + 1));
			$spreadsheet->getActiveSheet()->mergeCells('D' . $row . ':D' . ($row + 1));
			$spreadsheet->getActiveSheet()->mergeCells('E' . $row . ':E' . ($row + 1));
			$spreadsheet->getActiveSheet()->mergeCells('F' . $row . ':F' . ($row + 1));
			$spreadsheet->getActiveSheet()->mergeCells('G' . $row . ':G' . ($row + 1));
			$spreadsheet->getActiveSheet()->mergeCells('H' . $row . ':H' . ($row + 1));
			$spreadsheet->getActiveSheet()->mergeCells('I' . $row . ':I' . ($row + 1));
			
			$spreadsheet->getActiveSheet()->setCellValue('B' . $row, $row - 11); // Número de auditor
			$spreadsheet->getActiveSheet()->setCellValue('C' . $row, $auditor->nombre_apellido);
			$spreadsheet->getActiveSheet()->setCellValue('D' . $row, $auditor->cargo);
			$spreadsheet->getActiveSheet()->setCellValue('E' . $row, $uni->siglas);
			$spreadsheet->getActiveSheet()->setCellValue('F' . $row, $auditor->correo);
			$spreadsheet->getActiveSheet()->setCellValue('G' . $row, $auditor->competencia);
			$spreadsheet->getActiveSheet()->setCellValue('H' . $row, $auditor->alcance);
			$spreadsheet->getActiveSheet()->setCellValue('I' . $row, $auditor->observaciones);
			$row += 2; // Saltar una fila después de cada auditor
		}
	
		// Ajustar el ancho de las columnas al contenido
		foreach(range('B','I') as $columnID) {
			$spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
		}
	
		// Establecer bordes en todas las celdas
		$spreadsheet->getActiveSheet()->getStyle('B2:I6')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
		$spreadsheet->getActiveSheet()->getStyle('B10:I' . ($row - 1))->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	
		// Centrar el contenido en todas las celdas
		$spreadsheet->getActiveSheet()->getStyle('B2:I6')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$spreadsheet->getActiveSheet()->getStyle('B2:I6')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
		$spreadsheet->getActiveSheet()->getStyle('B10:I' . ($row - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$spreadsheet->getActiveSheet()->getStyle('B10:I' . ($row - 1))->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
		$spreadsheet->getActiveSheet()->getStyle('D8')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$spreadsheet->getActiveSheet()->getStyle('E7')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$spreadsheet->getActiveSheet()->getStyle('H9')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
	
		// Activar la opción de ajuste de texto
		$spreadsheet->getActiveSheet()->getStyle('B2:I6')->getAlignment()->setWrapText(true);
		$spreadsheet->getActiveSheet()->getStyle('B10:I' . ($row - 1))->getAlignment()->setWrapText(true);
	
		// Establecer color de fondo gris claro en las celdas desde B10 hasta I10
		
		// Fusionar celdas y aplicar estilos a las filas adicionales
		$lastRow = $row - 1;
		$spreadsheet->getActiveSheet()->mergeCells('B' . ($lastRow + 2) . ':F' . ($lastRow + 2));
		$spreadsheet->getActiveSheet()->mergeCells('G' . ($lastRow + 2) . ':I' . ($lastRow + 2));
		$spreadsheet->getActiveSheet()->mergeCells('B' . ($lastRow + 3) . ':F' . ($lastRow + 3));
		$spreadsheet->getActiveSheet()->mergeCells('G' . ($lastRow + 3) . ':I' . ($lastRow + 3));
	
		// Establecer bordes en las nuevas filas
		$spreadsheet->getActiveSheet()->getStyle('B' . ($lastRow + 2) . ':I' . ($lastRow + 3))->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	
		// Centrar el contenido en las nuevas filas
		$spreadsheet->getActiveSheet()->getStyle('B' . ($lastRow + 2) . ':I' . ($lastRow + 3))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$spreadsheet->getActiveSheet()->getStyle('B' . ($lastRow + 2) . ':I' . ($lastRow + 3))->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
	
		// Establecer altura de las nuevas celdas fusionadas
		$spreadsheet->getActiveSheet()->getRowDimension(($lastRow + 2))->setRowHeight(30);
		$spreadsheet->getActiveSheet()->getRowDimension(($lastRow + 3))->setRowHeight(30);
	
		// Agregar texto de prueba en las nuevas celdas fusionadas
		$spreadsheet->getActiveSheet()->setCellValue('B' . ($lastRow + 2), 'Elaborado por:');
		$spreadsheet->getActiveSheet()->setCellValue('G' . ($lastRow + 2), 'Fecha:');
		$spreadsheet->getActiveSheet()->setCellValue('B' . ($lastRow + 3), Yii::app()->user->fullname);
		$spreadsheet->getActiveSheet()->setCellValue('G' . ($lastRow + 3), date("d").'/'.date("m").'/'.date("Y"));
	
		// Crear un objeto Writer
		$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
	
		// Configurar el encabezado HTTP para indicar que se está enviando un archivo Excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Listado de Auditores.xlsx"');
		header('Cache-Control: max-age=0');
	
		// Guardar el archivo en la carpeta de descargas del usuario
		$writer->save('php://output');
	}
	
	
	
	
	
	
	
	
	
	
	
	

	
	function actioneliminar_notificaciones($id,$todas)
	{
		if($todas=='Si'){
		$noti=CaNotificaciones::model()->findAll('receptor=' . Yii::app()->user->id);
		foreach($noti as $n){
			$eva=CaEvaluacionAuditor::model()->findByAttributes(array('id'=>$n->evento));
			if($eva!=null){
				$eva->aceptado=1;
				$eva->save();
			}
		}
		CaNotificaciones::model()->deleteAll('receptor=' . Yii::app()->user->id);

		}
		else{
		CaNotificaciones::model()->deleteByPK($id);
		}
		
		// Obtenemos la URL de referencia
		$urlReferer = Yii::app()->request->getUrlReferrer();
		
		// Redirigimos a la URL de referencia
		Yii::app()->getRequest()->redirect($urlReferer);
	}





	 function actionaceptar_eva($evento_noti,$aceptado,$id_plan_ev,$id){

		if ($aceptado==0) {
			CaNotificaciones::model()->deleteByPK($id);
			$eva=CaEvaluacionAuditor::model()->FindByPK($evento_noti);
			$au=$eva->auditor;
			$auditor=CaAuditor::model()->findByAttributes(array('id'=>$au));
			
			$jefe=CaAuditor::model()->findByAttributes(array('equipo_de_auditores'=>$id_plan_ev, 'es_jefe'=>1));
			$us_dirigido2=Usuario::model()->findByAttributes(array('nombre'=> $jefe->nombre_apellido));
			if($us_dirigido2!=null){
			$id_us_dirigido2=$us_dirigido2->id;}

								
								if($us_dirigido2!=null){
								$notific= new CaNotificaciones;
								$notific->nombre='Evaluacion de Auditor '.$auditor->nombre_apellido.' por debajo de 60';
								$notific->tipo= "Evaluacion de Auditor por debajo de 60";
								$notific->autor=Yii::app()->user->id;
								$notific->evento=$evento_noti;
								$notific->receptor=$id_us_dirigido2;
								$notific->fecha=date('Y-m-d');
								$notific->contenido='a';								
								$notific->hora=time();
								$notific->icono='bi bi-clipboard-check-fill';
								$notific->estado='Activo';
								$notific->save();
								CaNotificaciones::model()->updateByPk($notific->id, array('contenido'=>'El auditor '.$auditor->nombre_apellido.' no ha aceptado la nota asignada en su evaluación
								<br></br>
								<div class="row d-flex d-flex justify-content-center align-items-center" >
								Va a cambiar la nota?
								<br></br>																
								
					
								<div class="col-md-6 d-flex justify-content-left align-items left " ><a class="btn btn-light custom-btn col-md-3" style="text-align: center;border:2px lightgrey solid;border-radius:20px" href=" '.CController::createUrl("/CaEvaluacionAuditor/Admin",array('id_plan_ev'=>$id_plan_ev, 'evento_noti'=>$evento_noti, 'id'=>$notific->id)).' "><h5 style="color: #454545;text-align:center;font-family:Bahnschrift">Si</h5></a>
								<div class="col-md-6" ></div> <a class="btn btn-light custom-btn col-md-3" style="text-align: center;border:2px lightgrey solid;border-radius:20px" href=" '.CController::createUrl("/site/aceptar_eva",array('id_plan_ev'=>$id_plan_ev, 'aceptado'=>1, 'evento_noti'=> $evento_noti,  'id'=>$notific->id)).' "><h5 style="color: #454545;text-align:center;font-family:Bahnschrift">No</h5></a>
								<hr>
								</div>	</div>	
								<br></br>'));}

		}
		if ($aceptado==1) {
			CaNotificaciones::model()->deleteByPK($id);
			CaEvaluacionAuditor::model()->updateByPk($evento_noti, array('aceptado' => "1"));
			$equipo=CaAuditor::model()->findAllByAttributes(array('equipo_de_auditores'=>$id_plan_ev, 'es_jefe'=>0));
			
			$terminada=true;
			foreach($equipo as $auditor){
			$ev=CaEvaluacionAuditor::model()->findByAttributes(array('auditor'=>$auditor->id));
			
			if($ev!=null){

	
			if($ev->aceptado==0){
			$terminada=false;
							}
							}
							else{
								$terminada=false;
							}}
			
			if($terminada==true){
			$equipo=CaAuditor::model()->findAllByAttributes(array('equipo_de_auditores'=>$id_plan_ev));
			$jefe=CaAuditor::model()->findByAttributes(array('equipo_de_auditores'=>$id_plan_ev, 'es_jefe'=>1));
			foreach($equipo as $auditor){
			CaAuditor::model()->updatebyPK($auditor->id, array('equipo_de_auditores' => 0, 'es_jefe'=>0, 'disponibilidad'=>1, 'es_papelera'=>0));}
			CaAuditoria::model()->updatebyPK($id_plan_ev, array('terminada'=>'Sí'));

			
				
			$auditoria=CaAuditoria::model()->findByPk($id_plan_ev);
			$us_dirigido2=Usuario::model()->findByAttributes(array('nombre'=> $jefe->nombre_apellido));
			if($us_dirigido2!=null){
			$id_us_dirigido2=$us_dirigido2->id;}

								
								if($us_dirigido2!=null){
								$notific= new CaNotificaciones;
								$notific->nombre='La auditoría con el rango de fecha "'.$auditoria->fecha_A.'" ha sido concluida';
								$notific->tipo= "Fin de Auditoría";
								$notific->autor=Yii::app()->user->id;
								$notific->evento=$evento_noti;
								$notific->receptor=$id_us_dirigido2;
								$notific->fecha=date('Y-m-d');
								$notific->contenido='La auditoría con el rango de fecha "'.$auditoria->fecha_A.'" ha sido concluida';
								$notific->hora=time();
								$notific->icono='bi bi-clipboard-check-fill';
								$notific->estado='Activo';
								$notific->save();}
			

							}}
    
		$urlReferer = Yii::app()->request->getUrlReferrer();
		
		// Redirigimos a la URL de referencia
		Yii::app()->getRequest()->redirect($urlReferer);
	}
	


	function actionca_listado_auditores()
    {
        $this->render('ca_listado_auditores'
			
		);

    }

    function actionca_reporte_programa_auditoria()
    {if(isset($_GET['unidad']))
		$unidad=$_GET['unidad'];
        $this->render('ca_reporte_programa_auditoria',array(
			'unidad'=>$unidad
            ,
			
		));

    }

    
    function actionca_reporte_revision_direccion()
    {if(isset($_GET['revision']))
		$revision=$_GET['revision'];
        $this->render('ca_reporte_revision_direccion',array(
			'revision'=>$revision,
			
		));

    }
    function actionca_reporte_plan_auditoria()
    {if(isset($_GET['plan']))
		$plan=$_GET['plan'];
        $this->render('ca_reporte_plan_auditoria',array(
			'plan'=>$plan,
			
		));

    }
    function actionca_reporte_informe_auditoria()
    {if(isset($_GET['informe']))
		$informe=$_GET['informe'];
        $this->render('ca_reporte_informe_auditoria',array(
			'informe'=>$informe,
			
		));

    }
    function actionca_reporte_lista_verificacion()
    {if(isset($_GET['lista']))
		$lista=$_GET['lista'];
        $this->render('ca_reporte_lista_verificacion',array(
			'lista'=>$lista,
			
		));

    }
    function actionca_reporte_evaluacion_auditor()
    {if(isset($_GET['evaluacion']))
		$evaluacion=$_GET['evaluacion'];
        $this->render('ca_reporte_evaluacion_auditor',array(
			'evaluacion'=>$evaluacion,
			
		));

    }

   

    







	public function actionAplicaciones()
	{
		$this->layout ="main1";
		$ing = Yii::app()->db->createCommand("
		Select * from aplicacion
		
		")->queryAll();
		$this->render('aplicaciones',array(
			'ing'=>$ing,
		));
	}
	
	public function actionAvales()
	{
		$this->layout ="main1";
		$ing = Yii::app()->db->createCommand("
		Select a.nombre, b.* from aval b, aplicacion a where a.id= b.id_aplicacion")->queryAll();
		$this->render('avales',array(
			'ing'=>$ing,
		));
	}
	
	public function actionNomencladores()
	{
		$this->layout ="plantilla2";
		$this->render('Nomencladores');
	}
	
	public function changeDate($date){
		if($date==NULL || $date=="0000-00-00")
			$fecha_recepcion = "";
		else
			$fecha_recepcion = date("d/m/Y", strtotime($date));
		return $fecha_recepcion;
	}	

	public function actionGraficas()
	{
		$this->layout ="plantilla2";
		$this->render('Graficas');
	}

	public function actionGraficasValor()
	{
		$choice="";
		if(isset($_GET['choice']))
		$choice=$_GET['choice'];

		$this->layout ="plantilla2";
		$this->render('GraficasValor',array('choice'=>$choice,));
	}

	public function actionCambioPass()
	{
		$this->layout = 'plantilla2';
		$id = Yii::app()->user->id;
			
		if (isset($_POST['Usuario'])) {
			if (isset($_POST['reset_password'])) {
				// Si se hace clic en el botón de restablecimiento de contraseña
				$username = $_POST['Usuario']['username'];
				$user = Usuario::model()->findByAttributes(array('username' => $username));
				$id = $user->id;
	
				// Restablecer la contraseña
				$newPasswordHash = password_hash('SIG.2024', PASSWORD_BCRYPT);
				Usuario::model()->updateByPk($user->id, array('password' => $newPasswordHash, 'bloqueado' => 0));
	
				// Puedes agregar un mensaje flash o redirigir a donde desees
				Yii::app()->user->setFlash('success', 'Contraseña restablecida con éxito');
				$this->redirect('index.php?r=site/index');
			}
			
			$newPassword = $_POST['Usuario']['new_password'];
			$repeatPassword = $_POST['Usuario']['repeat_password'];

			if(Yii::app()->user->roleid!=3){ 	
				$old_password = $_POST['Usuario']['old_password'];
				$user = Usuario::model()->findByAttributes(array('id' => $id));
				if (empty($old_password)) {
					$user->addError('old_password', 'La contraseña actual es obligatoria.');
				}
				// Validar la contraseña actual
			if (!$user->validatePassword($old_password)) {
				$user->addError('old_password', 'La contraseña actual es incorrecta.');
			}
			}else{
				$username = $_POST['Usuario']['username'];
				$user = Usuario::model()->findByAttributes(array('username' => $username));
				$id = $user->id;
			}
			// Validar que ningún campo esté vacío
			if (empty($newPassword)) {
				$user->addError('new_password', 'Introduzca una nueva contraseña.');
			} else {
				// Validar longitud mínima
				if (strlen($newPassword) < 8) {
					$user->addError('new_password', 'La contraseña debe tener al menos 8 caracteres.');
				}
	
				// Validar presencia de símbolos, números, y letras (mayúsculas y minúsculas)
				if (!preg_match('/^(?=.*[!@#$%^&*(),.?":{}|<>])(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/', $newPassword)) {
					$user->addError('new_password', 'La contraseña debe contener mayúsculas, minúsculas y al menos un símbolo y un número.');
				}
	
				// Validar que no sea igual al nombre de usuario
				if (strtolower($newPassword) == strtolower($user->username)) {
					$user->addError('new_password', 'La contraseña no puede ser igual al nombre de usuario.');
				}
			}	
			// Validar la coincidencia entre la nueva contraseña y la repetición de la contraseña
			if ($newPassword != $repeatPassword) {
				$user->addError('repeat_password', 'Las contraseñas nuevas no coinciden.');
			}
	
			// Verificar si hay errores antes de continuar
			if ($user->hasErrors()) {
				// Renderizar la vista con los errores
				$this->render('CambioPass', array('model' => $user));
				return;
			}
	
			// Actualizar la contraseña si no hay errores
			$newPasswordHash = password_hash($newPassword, PASSWORD_BCRYPT);
			Usuario::model()->updateByPk($id, array('password' => $newPasswordHash));
			Yii::app()->user->setFlash('success', 'Contraseña cambiada exitosamente.');
			$this->redirect('index.php?r=site/index');
		}
	
		// Si no se ha enviado el formulario, renderizar la vista con el modelo existente
		$model = Usuario::model()->findByAttributes(array('id' => $id));
		$this->render('CambioPass', array('model' => $model));
	}
	

	


	
			


	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
	
	public function actionHome()
	{
		$this->layout='plantilla2';
       // $cand_total
	    $desc = "Se accedió a site/index por el usuario ";
        $this->generateLog("Acceso",$desc);
		$con_aval = Yii::app()->db->createCommand("SELECT count(*) FROM aplicacion WHERE `avalado` like 'SI'")->queryScalar();
		$sin_aval = Yii::app()->db->createCommand("SELECT count(*) FROM aplicacion WHERE `avalado` like 'NO'")->queryScalar();
		$maplic = Yii::app()->db->createCommand("SELECT count(*) FROM aplicacion")->queryScalar();
		$bds = Yii::app()->db->createCommand("SELECT count(*) FROM bd_gestor")->queryScalar();
		$servers = Yii::app()->db->createCommand("SELECT count(*) FROM servidor")->queryScalar();
		$tech = Yii::app()->db->createCommand("SELECT count(*) FROM software")->queryScalar();
		$act_reciente = Yii::app()->db->createCommand("SELECT * FROM `trazas` WHERE `evento` NOT LIKE 'Acceso' and `evento` NOT LIKE 'Login' and `evento` NOT LIKE 'Logout' and usuario <> 'admin' ORDER BY `trazas`.`fecha` DESC LIMIT 6 ")->queryAll();
		


        $this->render('index',array('con_aval'=>$con_aval, 'sin_aval'=>$sin_aval,'maplic'=>$maplic,'bds'=>$bds,'servers'=>$servers,'tech'=>$tech, 'act_reciente'=>$act_reciente));
		//$this->render('index');
	}
	
	public function actionHome1()
	{
		$desc = "Se accedió a site/index por el usuario ";
            $this->generateLog("Acceso",$desc);
		$this->layout='main1';
       // $cand_total
		$con_aval = Yii::app()->db->createCommand("SELECT count(*) FROM aplicacion WHERE `avalado` like 'SI'")->queryScalar();
		$sin_aval = Yii::app()->db->createCommand("SELECT count(*) FROM aplicacion WHERE `avalado` like 'NO'")->queryScalar();
		$maplic = Yii::app()->db->createCommand("SELECT count(*) FROM aplicacion")->queryScalar();
		$docs = Yii::app()->db->createCommand("SELECT count(*) FROM documento")->queryScalar();
		$contactos = Yii::app()->db->createCommand("SELECT count(*) FROM contacto")->queryScalar();
		


        $this->render('index1',array('con_aval'=>$con_aval, 'sin_aval'=>$sin_aval,'maplic'=>$maplic,'docs'=>$docs,'contactos'=>$contactos,));
		//$this->render('index');
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout='plantilla2';
		$model=new LoginForm;
		$maplic = Yii::app()->db->createCommand("SELECT count(*) FROM aplicacion")->queryScalar();
		$tecnologias = Yii::app()->db->createCommand("SELECT count(*) FROM software")->queryScalar();
		$bds = Yii::app()->db->createCommand("SELECT count(*) FROM bd_gestor")->queryScalar();
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			$check = $model->ldap;
			$contador = null;
			$username = $model->username;
			$password = $model->password;
			$user = Usuario::model()->findByAttributes(array('username'=>$username));
			if($user !=null){
				$contador = $user->bloqueado;
			}
			if($check=="on")
			{	
				//---checking ldap--------
				$host = "ldap://ds.etecsa.cu";
				$puerto = 389;
				$conex = ldap_connect($host,$puerto) or die ("No ha sido posible conectarse al servidor");
				$r=@ldap_bind($conex, "uid=".$username.",ou=etecsa.cu,ou=People,dc=etecsa,dc=cu", $password);
				//echo var_dump($r);die;
				if ($r)
				{
					
					$results = Yii::app()->db->createCommand()->
					select('u.username,u.password')->from('usuario u')->where('username=:id', array(':id'=>$username))->queryRow();		
					
					if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != '')
					{
						$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
					}
					else
					{
						$ip_address = $_SERVER['REMOTE_ADDR'];
						if($ip_address=="::1")
							$ip_address="127.0.0.1";
						
					}
					if($results!=false){
						$password1 = $results['password'];
						$model->password = $password1;
						if($model->validate() && $model->login())
						{						
							$user = Yii::app()->user->id;
							echo $user;
							$access = new AccessControlController(1);
							$access->actionRefresh();
							$desc = "Se autenticó el usuario ";
            				$this->generateLog("Login",$desc);
							//if()
							$this->redirect(Yii::app()->user->returnUrl);
						}
					}						
					else{
            			Yii::app()->user->setFlash('Error','Usuario no registrado.');
						$this->redirect(Yii::app()->user->returnUrl);
					}					
				}
				else
				{
					Yii::app()->user->setFlash('Error','Usuario o Contraseña incorrectos.');
					$this->redirect(Yii::app()->user->returnUrl);
				}
				ldap_close($conex);
			}
			elseif($contador<5)
			{
				$results = Yii::app()->db->createCommand()->
				select('u.username,u.password')->from('usuario u')->where('username=:id', array(':id'=>$username))->queryRow();
				if($results!=false){

					if($model->validate() && $model->login())
					{
	                    $desc = "Se autenticó el usuario ";
	                    $this->generateLog("Login",$desc);
						Usuario::model()->updateByPk($user->id, array('bloqueado' => 0));
						$user = Yii::app()->user->id;
						$access = new AccessControlController(1);
						$access->actionRefresh();
						$this->redirect(Yii::app()->user->returnUrl);

					}
					else
					{
							if($user->rol!=3){
								$contador++;
								Usuario::model()->updateByPk($user->id, array('bloqueado' => $contador));
							}
						Yii::app()->user->setFlash('Error','Usuario o Contraseña incorrectos.');
						$this->redirect(Yii::app()->user->returnUrl);
					}
				}
				else
				{
					Yii::app()->user->setFlash('Error','Usuario no registrado.');
						$this->redirect(Yii::app()->user->returnUrl);
				}
			}else{
				Yii::app()->user->setFlash('Error','Usuario bloqueado, contacte con su administrador para reestablecer su contraseña.');
							$this->redirect(Yii::app()->user->returnUrl);	
			}
		}
		// display the login form
			$this->render('login',array('model'=>$model, 'maplic'=>$maplic, 'tecnologias'=>$tecnologias, 'bds'=>$bds));
	}


	public function actionReport($id)
	{	
		$dataPoint = '';
		$dataPoint1 = '';
		$dataPoint2 = '';
		$graphName = '';
		if($id==1){
			$results = Yii::app()->db->createCommand()->
			select('t.id,t.nombre as Nombre, t.descripcion as Descripción')->
			from('aplicacion t')->			
			//where ('ti.id_trab=:id_trab',array(':id_trab'=>$id))->
			queryAll();
			$headers=array('Nombre','Descripción');
			$headerSize = array('20','30');
			$reportName = 'Listado de Aplicaciones Empresariales';
			$colSize = 12;
			$dataPoint = array();
			$dataPoint1 = array();
			$dataPoint2 = array();
			foreach ($results as $row) {
	        	$id_app=$row['id'];
	        	$results1 = Yii::app()->db->createCommand()->
				select('bd.nombre as Nombre_bd')->
				from('bd_gestor bd, app_bd ab')->			
				where ('ab.id_bd=bd.id and ab.id_app=:id_app',array(':id_app'=>$id_app))->
				queryAll();
				$g_db="";
				foreach ($results1 as $row1) {
					$g_db.=$row1['Nombre_bd']."<br/>";					
				}
				$results2 = Yii::app()->db->createCommand()->
				select('bd.nombre as Nombre_sf')->
				from('software bd, app_tecnologia ab')->			
				where ('ab.id_tecnologia=bd.id and ab.id_app=:id_app',array(':id_app'=>$id_app))->
				queryAll();
				$app_tec="";
				foreach ($results2 as $row2) {
					$app_tec.=$row2['Nombre_sf']."<br/>";					
				}
				$results3 = Yii::app()->db->createCommand()->
				select('ac.id_contacto')->
				from('app_contacto ac')->			
				where ('ac.id_app=:id_app',array(':id_app'=>$id_app))->
				queryAll();
				$app_con="";
				foreach ($results3 as $row3) {
					$id_contac = $row3['id_contacto'];
					$results4 = Yii::app()->db_bdut->createCommand()->
					select('concat(t.nombre_apellidos, " ", t.correo) as contacto')->
					from('trabajador t')->			
					where('t.codigo like "%'.$id_contac.'"')->
					queryRow();
					if ($results4 != false) {
						$app_con.=$results4['contacto']."<br/>";					
					} 					
					//var_dump($results4);die();
				}

				array_push($dataPoint, $g_db);
				array_push($dataPoint1, $app_tec);
				array_push($dataPoint2, $app_con);

	        }
		}
		elseif($id==2){
			$results = Yii::app()->db->createCommand()->
			select('s.nombre as Nombre, count(ap.id) as Cantidad')->
			from('software s, app_tecnologia ap')->
			where ('s.id = ap.id_tecnologia')->
			group('ap.id_tecnologia')->
			queryAll();
			$headers=array('Nombre','Cantidad');
			$headerSize = array('50','45');
			$reportName = 'Listado de Tecnologías';
			$colSize = 6;
			$graphName = 'Cantidad de aplicaciones por tecnologías';

			$dataPoint = array();
	        foreach ($results as $row) {
	        	array_push($dataPoint, array('y'=>$row['Cantidad'], 'label'=>$row['Nombre']));
	        }
		}
		else{
			$results = Yii::app()->db->createCommand()->
			select('s.nombre as Nombre, count(ap.id) as Cantidad')->
			from('bd_gestor s, app_bd ap')->
			where ('s.id = ap.id_bd')->
			group('ap.id_bd')->
			queryAll();
			$headers=array('Nombre','Cantidad');
			$headerSize = array('50','45');
			$reportName = 'Listado de Base de Datos';
			$colSize = 6;
			$graphName = 'Cantidad de aplicaciones por gestores de BD';

			$dataPoint = array();
	        foreach ($results as $row) {
	        	array_push($dataPoint, array('y'=>$row['Cantidad'], 'label'=>$row['Nombre']));
	        }
		}

		$this->render('ini',array('id'=>$id,'results'=>$results, 'headers'=>$headers, 'headerSize'=>$headerSize, 'reportName'=>$reportName, 'colSize'=>$colSize, 'dataPoint'=>$dataPoint, 'dataPoint1'=>$dataPoint1, 'dataPoint2'=>$dataPoint2, 'graphName'=>$graphName, 'id_rep'=>$id));
		
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		$desc = "Se deslogueó el usuario ";
        $this->generateLog("Logout",$desc);
        $usuario = Yii::app()->user->name;
        $model=new AccessControl;
        $model->deleteAll('username=:username',array(':username'=>$usuario));
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionEventos($id, $start, $end)
	{
		$data = array();
		$results = Yii::app()->db->createCommand()->
		select('t.id,t.nombre, t.horas, t.fecha, ti.cumplimiento, t.tipo')->
		from('tarea t')->
		join('tarea_individual ti', 't.id=ti.id_tarea')->
		where ('ti.id_trab=:id_trab',array(':id_trab'=>$id))->
		queryAll();
		foreach($results as $row)
		{
			$data[] = array(
					'id'   => $row["id"],
					'nombre'   => $row["nombre"],
					'horas'   => $row["horas"],
					'fecha'   => $row["fecha"],
					'cumplimiento'   => $row["cumplimiento"],
					'tipo'   => $row["tipo"]
			);
		}
		$this->render('events',array('data1'=>$data));
		//echo json_encode($data);
		//return $results;
	}

    public function actionReportInd()
    {

		/*if(isset($_POST['mes'])) {
			$date = $_POST['mes'];
			$array_date = explode('-',$date);
			$mes = $array_date[0];
			$year = $array_date[1];
		}
		else
		{
			$mes = date('m');
			$year = date('Y');
		}

		$fullname = $_POST['fullname'];
		$fullname1 = Trabajador::model()->findByPk($id_trab)->getAttribute("especialidad"). " " . $fullname;
		$results = Yii::app()->db->createCommand()->
		select('t.id,t.nombre, t.horas, t.fecha, ti.cumplimiento, t.tipo')->
		from('tarea t')->
		join('tarea_individual ti', 't.id=ti.id_tarea')->
		where('t.fecha=:fecha', array(':fecha'=>$fecha))->
		andwhere ('ti.id_trab=:id_trab',array(':id_trab'=>$id_trab))->
		queryAll();
		return $results;*/
		if(isset($_POST['btn_buscar'])){
			$id_trab = $_POST['id_trab'];
			$trab = Usuario::model()->findByPk($id_trab);
			$fullname1 = $trab->fullname;
			$id_area = $trab->area;
			$area = Area::model()->findByPk($id_area);
			$area_nombre = $area->nombre;
		}			
		else{
			$id_trab = Yii::app()->user->id;
			$fullname1 = Yii::app()->user->fullname;
			$id_area = Yii::app()->user->idarea;
			$area_nombre = Yii::app()->user->area;
		}
		$data = array();
		/*$results = Yii::app()->db->createCommand()->
		select('t.id,t.nombre, t.horas, t.fecha, ti.cumplimiento, t.tipo')->
		from('tarea t')->
		join('tarea_individual ti', 't.id=ti.id_tarea')->
		where ('ti.id_trab=:id_trab',array(':id_trab'=>$id_trab))->
		queryAll();*/
		$results = Yii::app()->db_saget->createCommand()->
		select('t.id,t.nombre, t.horas, t.fecha, t.cumplimiento, t.tipo')->
		from('actividad t')->
		//join('trab_actv ti', 't.id=ti.id')->
		//where ('ti.responsable=:id_trab',array(':id_trab'=>$fullname1))->
		queryAll();
		foreach($results as $row)
		{
			$data[] = array(
					'id'   => $row["id"],
					'title'   => $row["horas"]." - ".$row["nombre"],
					'start'   => $row["fecha"],
					'cumplimiento'   => $row["cumplimiento"],
					'tipo'   => $row["tipo"]
			);
		}
		$results = Yii::app()->db->createCommand(
				array(
						'select'=>array('t.fullname', 'c.descripcion'),
						'from'=>'usuario t, cargo c',
						'where'=>'t.area=:departamento and t.rol=5 and c.id=2',
						'params' =>array(':departamento'=>$id_area),
				))->queryrow();
		$boss_name = $results['fullname'];
		$boss_charge = $results['descripcion'];
		$results = Yii::app()->db->createCommand()->
		select('fullname, id')->
		from('usuario u')->
		queryAll();
        $this->render('pti1',array('id_trab' =>  $id_trab, 'area_nombre'=>$area_nombre, 'boss_name'=>$boss_name, 'boss_charge'=>$boss_charge, 'fullname1'=>$fullname1,'results'=>$results,'data'=>$data));
    }

    public function actionPDF1()
    {
        $header = $_GET['header'];
        $num = $_GET['num'];
        $day1 = $_GET['day1'];
        $final1 = $_GET['final1'];
        $mes1 = $_GET['mes1'];
        $year1 = $_GET['year1'];
        $fullname = $_GET['fullname'];
       // echo var_dump($_GET['content']);die;
        $this->render('pti_pdf',array('num'=>$num,'header'=>$header,'day1'=>$day1,'final1'=>$final1,'fullname'=>$fullname,'mes1'=>$mes1,'year1'=>$year1));

    }

    public function actionReportIcm()
    {
        $this->render('icmi');
    }


}