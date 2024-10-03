<?php /* @var $this Controller */

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MAPLIC - Mapa de Aplicaciones Empresariales</title>

    <!-- Core CSS - Include with every page -->
    <link href="plugins/bootstrap/bootstrap.css" rel="stylesheet">
	<link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="plugins/select2/select2.css" rel="stylesheet">
	<link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="datepicker/css/datepicker.css" rel="stylesheet">
    <link href="css/timepicker.css" rel="stylesheet">
	<link href="css/simple-iconpicker.min.css" rel="stylesheet">
	<link href="css/bootstrap-treeview.css" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="img/fondo.ico" />
</head>

<body>
	
	<div id="screensaver">
		<canvas id="canvas"></canvas>
		<i class="fa fa-lock" id="screen_unlock"></i>
	</div>
	<div id="modalbox">
		<div class="devoops-modal">
			<div class="devoops-modal-header">
				<div class="modal-header-name">
					<span>Basic table</span>
				</div>
				<div class="box-icons">
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
			</div>
			<div class="devoops-modal-inner">
			</div>
			<div class="devoops-modal-bottom">
			</div>
		</div>
	</div>
	<header class="navbar">
		<div class="container-fluid expanded-panel">
			<div class="row">
				<div id="top-panel" class="col-xs-12 col-sm-12">
					<div class="row">
                        <div style="background-color: #eee;HEIGHT:50PX" class="col-xs-6 col-sm-4">
                            <a href="#" class="show-sidebar"><i class="fa fa-bars"></i></a>&nbsp;&nbsp;&nbsp;
                            <a href="<?php echo CController::createUrl('/site/index');?>"><img src="img/fondo2.png" height="50px"></a>
                        </div>
						<div class="col-xs-6 col-sm-8 top-panel-right">
							<ul class="nav navbar-nav pull-right panel-menu">
								<?php //$this->Menu_Superior("Perfil","male"); ?>
								<?php //$this->Menu_Superior("Administración","shield"); ?>
								<?php //$this->Menu_Superior("Nomencladores","cogs"); ?>								
								<li class="dropdown">
									<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
										<div class="avatar">
											<?php 
											$fotoName="noFoto"
											?>
                                            <?php $foto = "img/avatar.png";?>
											<img src="<?php echo $foto;?>" class="img-rounded" alt="avatar" />
										</div>
										<i class="fa fa-angle-down pull-right"></i>
										<div class="user-mini pull-right">
											<span class="welcome">Bienvenid@,</span>
											<span>
											<?php echo $_SESSION['fullname'];?>
											</span>
										</div>
									</a>
									<ul class="dropdown-menu">
										<li><a href="index.php?r=Usuario/modify&id=<?php echo Yii::app()->user->id;?>"><i class="fa fa-pencil-square-o"></i><span>Modificar Contraseña</span></a></li>
                                        <li><a href="<?php echo CController::createUrl('/site/logout');?>"><i class="fa fa-sign-out"></i><span>Salir</span></a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div id="main" class="container-fluid">
		<div class="row">
			<div id="sidebar-left" class="col-xs-2 col-sm-2">
				<ul class="nav main-menu">	
					<li>
						<a href="<?=CController::createUrl('/site/index');?>">
							<i class="fa fa-home"></i>
							<span class="hidden-xs">Inicio</span>
						</a>
					</li>
					<li>
						<a href="<?=CController::createUrl('/Site/Aplicaciones');?>">
							<i class="fa fa-desktop"></i>
							<span class="hidden-xs">Aplicaciones</span>
						</a>
					</li>
					<li>
						<a href="<?=CController::createUrl('/site/Avales');?>">
							<i class="fa fa-file"></i>
							<span class="hidden-xs">Avales</span>
						</a>
					</li>
					<li>
						<a href="<?=CController::createUrl('/site/Contactos');?>">
							<i class="fa fa-users"></i>
							<span class="hidden-xs">Contactos</span>
						</a>
					</li>
					
					<?php //$this->lateralMenu();?>
				</ul>
			</div>
			<!--Start Content-->
			<div id="content" class="col-xs-12 col-sm-10">
				<div class="preloader">
					<img src="img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/>
				</div>
				<?php echo $content;?>
			</div>
			<!--End Content-->
		</div>
	</div>
	
	
	
    <!-- Core Scripts - Include with every page -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="plugins/jquery/jquery-2.1.0.min.js"></script>
	<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="plugins/bootstrap/bootstrap.min.js"></script>
	<script src="js/timepicker.js"></script>
	<script src="js/devoops.js"></script>
	<script src="datepicker/js/bootstrap-datepicker.js"></script>
	<script src="plugins/jquery/jquery.ba-bbq.min.js"></script>
	<script src="plugins/moment/moment.min.js"></script>
	<script src="plugins/fullcalendar/fullcalendar.min.js"></script>
	<script src="plugins/fullcalendar/lang/es.js"></script>
	<script src="plugins/simple-iconpicker.min.js"></script>
	<script src="plugins/Picker/Picker/Scripts/mi-picker.js"></script>
	<script src="plugins/bootstrap-treeview.js"></script>
	<script type="text/javascript">
// Run Datables plugin and create 3 variants of settings
function AllTables(){
	TestTable1();
	TestTable2();
	TestTable3();
	LoadSelect2Script(MakeSelect2);
}
function MakeSelect2(){
	//$('select').select2();
	$('.dataTables_filter').each(function(){
		$(this).find('label input[type=text]').attr('placeholder', 'Search');
	});
}
function Select2Test(){
		$("#Candidato_especialidad").select2();
		$("#Candidato_cargo").select2();
		$("#CandCargo_id_cargo").select2();
		$("#CandCargo_id_uo").select2();
		//$("#Candidato_tipo").select2();
	}
$(document).ready(function() {
	// Load Datatables and run plugin on tables 
	LoadSelect2Script(Select2Test);
	LoadDataTablesScripts(AllTables);
	$('#sandbox-container input').datepicker({
		format: "yyyy-mm-dd",
		multidate: false,
		language: 'es',
	});	
	$("a.eliminar_dato").click( function() {
            if(!confirm('Seguro que desea eliminar ese candidato?'))
                return false;
            else
            {
                location.href = url;
                return true;
            }
        });
	// Add Drag-n-Drop feature
	WinMove();
});
</script>

</body>

</html>
