<?php /* @var $this Controller */


?>
<!DOCTYPE html>
<style>
	#header,
	#sidebar {
		font-family: Bahnschrift;
	}
</style>
<html>

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>SIG - Sistema Integral de Gestion</title>
	<meta content="" name="description">
	<meta content="" name="keywords">
	<!-- Favicons -->
	<link href="images/unnamed.jpg" rel="icon">
	<link href="images/unnamed.jpg" rel="apple-touch-icon">
	<!-- Google Fonts -->
	<!-- <link href="https://fonts.gstatic.com" rel="preconnect">
  		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->
	<!-- Vendor CSS Files -->
	<link href="plantilla2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="plantilla2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="plantilla2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="plantilla2/vendor/quill/quill.snow.css" rel="stylesheet">
	<link href="plantilla2/vendor/quill/quill.bubble.css" rel="stylesheet">
	<link href="plantilla2/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="plantilla2/vendor/simple-datatables/style.css" rel="stylesheet">
	<link href="plantilla2/css/simple-iconpicker.min.css" rel="stylesheet">
	<link href="plantilla2/vendor/select2/select2.min.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="plantilla2/css/style.css" rel="stylesheet">
	<!-- <style>
			body{
				background-color:cornsilk;
			}
			</style> -->
</head>

<body>
	<?php if (!Yii::app()->user->isGuest): ?>
		<header id="header" class="header fixed-top d-flex align-items-center">
			<div class="d-flex align-items-center justify-content-between col-lg-1" style="vertical-align:bottom">
				<a href="<?php echo CController::createUrl('/site/index'); ?>" class="logo d-flex align-items-center menu">

					<img class="logoini" src="./images/unnamed.jpg" />
					<h1 style="color: #012970; margin-top: 10px;margin-right:70px"><b> SIG</b></h1>
				</a>
				<i class="bi bi-list toggle-sidebar-btn lateral" style="margin-left: 57px;font-size:40px;"></i>
			</div>
			<!-- End Logo -->
			<nav class="header-nav ms-auto">
				<ul class="d-flex align-items-center">
					<li class="nav-item d-block d-lg-none">
						<a class="nav-link nav-icon search-bar-toggle " href="#">
							<i class="bi bi-search"></i>
						</a>
					</li>


					<?= $this->p2_Notificaciones();
						$eva = CaEvaluacionAuditor::model()->findAll();
						foreach ($eva as $ev) {
							$fecha_inicial = $ev->fecha_evaluacion;
							$fecha_obj = DateTime::createFromFormat('d-m-y', $fecha_inicial);
							$fecha_obj->modify('+10 days');
							$nueva_fecha = $fecha_obj->format('d-m-y');
							$fecha_actual = (new DateTime())->format('d-m-y');
							if ($ev->aceptado != 1 && $fecha_actual >= $nueva_fecha) {
								$us = Usuario::model()->findByAttributes(array('nombre' => $ev->nombre_auditor));
								if ($us != null) {
									$noti = CaNotificaciones::model()->findByAttributes(array('receptor' => $us->id));
									$id = $noti->id;
									$id_plan_ev = $ev->id_plan_ev;
									$evento_noti = $noti->evento;
									CaNotificaciones::model()->deleteByPK($id);
									CaEvaluacionAuditor::model()->updateByPk($noti->evento, array('aceptado' => "1"));
									$equipo = CaAuditor::model()->findAllByAttributes(array('equipo_de_auditores' => $id_plan_ev, 'es_jefe' => 0));

									$terminada = true;
									foreach ($equipo as $auditor) {
										$ev = CaEvaluacionAuditor::model()->findByAttributes(array('auditor' => $auditor->id));

										if ($ev != null) {
											if ($ev->aceptado == 0) {
												$terminada = false;
											}
										} else {
											$terminada = false;
										}
									}

									if ($terminada == true) {
										$equipo = CaAuditor::model()->findAllByAttributes(array('equipo_de_auditores' => $id_plan_ev));
										$jefe = CaAuditor::model()->findByAttributes(array('equipo_de_auditores' => $id_plan_ev, 'es_jefe' => 1));
										foreach ($equipo as $auditor) {
											CaAuditor::model()->updatebyPK($auditor->id, array('equipo_de_auditores' => 0, 'es_jefe' => 0, 'disponibilidad' => 1, 'es_papelera' => 0));
										}
										CaAuditoria::model()->updatebyPK($id_plan_ev, array('terminada' => 'Sí'));



										$auditoria = CaAuditoria::model()->findByPk($id_plan_ev);
										$us_dirigido2 = Usuario::model()->findByAttributes(array('nombre' => $jefe->nombre_apellido));
										if ($us_dirigido2 != null) {
											$id_us_dirigido2 = $us_dirigido2->id;
										}


										if ($us_dirigido2 != null) {
											$notific = new CaNotificaciones;
											$notific->nombre = 'La auditoría con el rango de fecha "' . $auditoria->fecha_A . '" ha sido concluida';
											$notific->tipo = "Fin de Auditoría";
											$notific->autor = Yii::app()->user->id;
											$notific->evento = $evento_noti;
											$notific->receptor = $id_us_dirigido2;
											$notific->fecha = date('Y-m-d');
											$notific->contenido = 'La auditoría con el rango de fecha "' . $auditoria->fecha_A . '" ha sido concluida';
											$notific->hora = time();
											$notific->icono = 'bi bi-clipboard-check-fill';
											$notific->estado = 'Activo';
											$notific->save();
										}
									}

									// $urlReferer = Yii::app()->request->getUrlReferrer();

									// // Redirigimos a la URL de referencia
									// Yii::app()->getRequest()->redirect($urlReferer);
								}
							}
						}
					?>
					<?= $this->p2_MenuSuperior("Administración", "shield-lock-fill"); ?>
					<li class="nav-item d-block menu">
						<a class="nav-link nav-icon search-bar-toggle " href="<?= CController::createUrl('/site/nomencladores'); ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nomencladores">
							<i class="bi bi-gear-fill"></i>
						</a>
						<?php
						if (Yii::app()->user->areaid == 7) {
							echo '
						  <li class="nav-item d-block menu" >
          				<a class="nav-link nav-icon search-bar-toggle " href="' . Yii::app()->baseUrl . '/calidaddocs/Manual de Usuarios Sistema Integrado de Gestión.pdf" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Manual de Usuario" target="_blank">
            				<i class="bi bi-clipboard-fill"></i>
          				</a>';
						}
						?>

					<li class="nav-item dropdown pe-3 ">
						<a class="nav-link nav-profile d-flex align-items-center pe-0 menu" href="#" data-bs-toggle="dropdown">
							<img src="plantilla2/img/fotos/<?= Yii::app()->user->foto; ?>" alt="Profile" class="rounded-circle">
							<span class="d-none d-md-block dropdown-toggle ps-2"><?= Yii::app()->user->fullname; ?></span>
						</a>
						<!-- End Profile Iamge Icon -->
						<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
							<li class="dropdown-header">
								<h6><?= Yii::app()->user->fullname; ?></h6>
								<span><? ?></span><!--aqui se pudiera cambiar por el cargo del usuario logueado-->
							</li>
							<!-- <li><hr class="dropdown-divider"></li>
        					<li>
              					<a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                					<i class="bi bi-person"></i>
                					<span>Mi Perfil</span>
          						</a>
            				</li>
            				<li><hr class="dropdown-divider"></li>
        					<li> -->
							<!-- <a class="dropdown-item d-flex align-items-center" href="<?= CController::createUrl('/site/CambioPass'); ?>">
                					<i class="bi bi-gear"></i>
                					<span>Cambio de Contraseña</span>
          						</a> -->
					</li>
					<!-- <li><hr class="dropdown-divider"></li>
            				<li>
              					<a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                					<i class="bi bi-question-circle"></i>
                					<span>Ayuda</span>
              					</a> -->
					</li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<li>
						<a class="dropdown-item d-flex align-items-center" href="<?= CController::createUrl('/site/logout'); ?>">
							<i class="bi bi-box-arrow-right"></i>
							<span>Cerrar Sesión</span>
						</a>
					</li>
				</ul>
				<!-- End Profile Dropdown Items -->
				</li>
				<!-- End Profile Nav -->
				</ul>
			</nav>
			<!-- End Icons Navigation -->
		</header>
		<!-- End Header -->

		<!-- ======= Sidebar ======= -->
		<aside id="sidebar" class="sidebar">
			<ul class="sidebar-nav" id="sidebar-nav">
				<li class="nav-item">
					<!-- <a class="nav-link collapsed" href="<?= CController::createUrl('/site/index'); ?>">
          				<i class="bi bi-grid-1x2"></i>
          				<span>Inicio</span>
        			</a> -->
				</li>
				<?= $this->p2_LateralMenu(); ?>
			</ul>
		</aside>
		<!-- End Sidebar-->
		<main id="main" class="main">
		<?php endif ?>
		<?php echo $content; ?>
		</main>
		<!-- End #main -->
		<?php if (!Yii::app()->user->isGuest): ?>
			<!-- ======= Footer ======= -->
			<footer id="footer" class="footer">
				<div class="copyright">
					&copy; <strong><span>ETECSA <?= date("Y") ?></span></strong>.
				</div>
				<div class="credits">DCIE</div> <!--aqui va la unidad organizativa-->
			</footer>
			<!-- End Footer -->
		<?php endif ?>
		<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short" id="asd"></i></a>
		<!-- Vendor JS Files -->
		<script src="plantilla2/vendor/apexcharts/apexcharts.min.js"></script>
		<script src="plantilla2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="plantilla2/vendor/chart.js/chart.umd.js"></script>
		<script src="plantilla2/vendor/echarts/echarts.min.js"></script>
		<script src="plantilla2/vendor/quill/quill.min.js"></script>
		<script src="plantilla2/vendor/simple-datatables/simple-datatables.js"></script>
		<script src="plantilla2/vendor/tinymce/tinymce.min.js"></script>
		<script src="plantilla2/vendor/php-email-form/validate.js"></script>
		<script src="plantilla2/vendor/simple-iconpicker.min.js"></script>
		<script src="plantilla2/vendor/select2/select2.min.js"></script>
		<!-- Template Main JS File -->
		<script src="plantilla2/js/main.js"></script>
</body>

</html>