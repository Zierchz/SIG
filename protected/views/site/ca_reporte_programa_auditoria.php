

<?php



$uo=UnidadOrganizativa::model()->findByPk($unidad);
$idAuditadaList = CaRelacionUnidad::model()->findAllByAttributes(array('id_rectora' => $uo->id));

// Extract the id_auditada values into an array
$unidades = array();
foreach ($idAuditadaList as $rel) {
    $unidades[] = $rel->id_auditada;
}

$nombre_uo=$uo->nombre;
$siglas_uo=$uo->siglas;




$this->p2_PageTitle("calendar-event", "Programa Anual de Auditorías","Listado","Gestión de Programas Anuales");


?>

<style>
	td {
            word-wrap: break-word;
            word-break: break-all;
            white-space: normal;
        }
</style>

<style type="text/css"    media="print" >
@media print{
	td {
            word-wrap: break-word;
            word-break: break-all;
            white-space: normal;
        }
#header_area{
	display: none;
}
.logoini{
        display: none;
    }
.card{
        box-shadow: none;
    }

#regresar{

	display: none;	
}
.pagetitle{
	display: none;
}




#notass{
	display: none;
}
#exportarPDF{
	display: none;
}

#footer{
	display: none;
}
#footer2{
	display: none;
}
#miFormulario{
	display: none;
}

h1 > * {
  display: none;
}
    header > * {
  display: none;
}
#header{
  box-shadow: none;
}
#asd{
	display: none;
}
#url{
	display: none;
}
#asd{
	display: none;
}
#sidebar{
	display: none;
}
#exportarPDF{
	display: none;
}
.lateral{
display: none;
}
#footer{
	display: none;
}
#footer2{
	display: none;
}
#parameters{
	display: none;
}
#aceptar{
	display: none;
}
#anio_mes{
	display: none;
}
#graph{
	display: none;
}
#titulo{
	display: none;
}
#dropdownMenuButton1{
	display: none;
}
#miFormulario{
	display: none;
}

}

</style>

<p id="ppp" align="center"></p>
<!DOCTYPE html>




<html>
<head>
	
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title></title>
	<meta name="generator" content="LibreOffice 7.6.3.2 (Linux)"/>
	<meta name="author" content="Leonardo Suarez Prieto"/>
	<meta name="created" content="2015-06-05T18:17:20"/>
	<meta name="changedby" content="Leonardo Suarez Prieto"/>
	<meta name="changed" content="2024-02-01T20:00:28"/>
	<meta name="AppVersion" content="16.0300"/>
	
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Arial"; font-size:11px }
		a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
		a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
		comment { display:none;  } 
	</style>
	

</head>

<?php 
$as = ""; // Variable inicial
$bs = date('Y'); // Variable inicial
$meses = array();

$areass = UnidadOrganizativa::model()->findAll();
 
foreach ($areass as $area) {
    for ($i = 0; $i < count($areass); $i++) { 
        $meses[$i][$area->id] = $area->siglas;
    }
}

// Lista de años
$anios = array(
    date('Y') - 5,
    date('Y') - 4,
    date('Y') - 3,
    date('Y') - 2,
    date('Y') - 1,
    date('Y'),
    date('Y') + 1
);

// Verificar si se ha enviado una selección de mes
if (isset($_POST['mesSeleccionado'])) {
    $mesSeleccionado = $_POST['mesSeleccionado'];

    // Verificar si $mesSeleccionado contiene al menos un guion
    if (strpos($mesSeleccionado, '-') !== false) {
        // Obtener el ID del elemento seleccionado
        $idSeleccionado = explode('-', $mesSeleccionado)[1];
        $as = $meses[$idSeleccionado];
    } 
}

// Verificar si se ha enviado una selección de año
if (isset($_POST['anioSeleccionado'])) {
    $anioSeleccionado = $_POST['anioSeleccionado'];

    // Actualizar el valor de la variable $bs con el año seleccionado
    if (in_array($anioSeleccionado, $anios)) {
        $bs = $anioSeleccionado;
    }
}

// Unidad organizativa predeterminada
$unidad = "Valor predeterminado de la unidad";

?>

<!-- Contenedor principal con ID -->
<div class="row d-flex d-flex justify-content-between">
    <div id="miFormulario" style="margin-left: 50px;">
        <!-- Formulario con los campos -->
        <form method="post" style="display: inline-block;">
            <div style="display: inline-block; margin-right: 20px;">
                <h5 style="font-family: 'Bahnschrift', sans-serif; color: #454545; margin-left: 10px;">Año</h5>
                <select class="form-select" aria-label="Default select example" name="anioSeleccionado" style="width: 250px;">
                    <option value="">Seleccione un año</option> <!-- Opción vacía -->
                    <?php foreach ($anios as $anio): ?>
                        <option value="<?php echo $anio; ?>"><?php echo $anio; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <?php
            $t_letra='Bahnschrift';
            if (Yii::app()->user->areaid == 7) {
                echo'
                <div style="display: inline-block; margin-right: 20px;font-size:15px">
                    <h5 style="font-family: '.$t_letra.', sans-serif; color: #454545; margin-left: 10px;">Unidad Organizativa</h5>
                    <select class="form-select" aria-label="Default select example" name="mesSeleccionado" id="mesSeleccionado" style="width: 250px;font-size:15px">
                        <option value="">Seleccione una unidad</option> <!-- Opción vacía -->
                        ';
                        foreach ($meses as $mesNumero => $areas) {
                            foreach ($areas as $areaIds => $siglas) {
                                $textoSiglas = !empty($siglas) ? $siglas : "Sin siglas";
                                echo '<option value="' . $mesNumero . '-' . $areaIds . '">' . $textoSiglas . '</option>';
                            }
                        }
                        echo'
                    </select>
                </div>
                ';
            }
			Yii::app()->clientScript->registerScript('mesSeleccionado_select2', "
        $('#mesSeleccionado').select2({
            minimumInputLength: 1
        });
    ");
            ?>        
        
            <div style="display: inline-block;">
                <button type="submit" name="submit" class="btn btn-secondary custom-btn" aria-expanded="false" style="border-radius: 10px; margin-bottom: 6px; width: 250px;font-size:25px">
                    <h5 style="font-family: 'Bahnschrift', sans-serif; color: white;">Aceptar</h5> 
                </button>
            </div>
        </form>
    </div>
</div>

<br></br>

<?php
$idSeleccionado = null; // ID de la unidad organizativa seleccionada
$nombre_uo = ""; // Nombre de la unidad organizativa
$siglas_uo = ""; // Siglas de la unidad organizativa

if (isset($_POST['mesSeleccionado'])) {
    $mesSeleccionado = $_POST['mesSeleccionado'];
    
    // Verificar si $mesSeleccionado contiene al menos un guion
    if (strpos($mesSeleccionado, '-') !== false) {
        // Obtener el ID del elemento seleccionado
        $idSeleccionado = explode('-', $mesSeleccionado)[1];
        $uo = UnidadOrganizativa::model()->findByPk($idSeleccionado);
        $nombre_uo = $uo->nombre;
        $siglas_uo = $uo->siglas;
    } else {
        // Asignar el valor predeterminado de la unidad organizativa
        $nombre_uo = $unidad;
        $siglas_uo = $uo->siglas; // Puedes cambiar esto si hay un valor predeterminado de las siglas
    }
}
?>




<body>
<div class="row "><div class=" col-md-12 d-flex d-flex justify-content-center align-items-center">
<table class="  align-items-center" cellspacing="0" border="0" >
	<colgroup span="10" width="16" ></colgroup>
	<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=6 rowspan=4 height="80" align="center" valign=center><font color="#000000"><img   src="./images/logotipo-etecsa-version-horizontal-.png"><br></font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=6 rowspan=4 align="center" valign=middle><font color="#000000">Programa de Auditoría   Año : <?=$bs?></font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=5 align="center" valign=bottom><font color="#000000">Código: REG 1-PG-SC-006/03</font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=2 rowspan=2 align="center" valign=middle><font color="#000000">Revisión: 3</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=3 rowspan=2 align="center" valign=middle><font color="#000000">Fecha de emisión: <?=date("d").'/'.date("m").'/'.date("Y")?></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=2 align="center" valign=bottom><font color="#000000">Hoja: 1</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=3 align="center" valign=bottom><font color="#000000">de: 1</font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td colspan=5 height="19" align="center" valign=bottom><font color="#000000">Unidad Organizativa: <?=$uo->siglas?></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td colspan=5 align="center" valign=bottom><font color="#000000">REG 1-PG-SC-006/03</font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="20" align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td  align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" rowspan=3 height="40" width="60" align="center" valign=middle><font color="#000000">Unidad <br>Organizativa/ Área</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000"  rowspan=3 height="40" width="60" align="center" valign=middle><font color="#000000">E</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000"  rowspan=3 height="40" width="60" align="center" valign=middle><font color="#000000">F</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000"  rowspan=3 height="40" width="60" align="center" valign=middle><font color="#000000">M</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000"  rowspan=3 height="40" width="60" align="center" valign=middle><font color="#000000">A</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" rowspan=3 height="40" width="60" align="center" valign=middle><font color="#000000">M</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000"  rowspan=3 height="40" width="60" align="center" valign=middle><font color="#000000">J</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000"  rowspan=3 height="40" width="60" align="center" valign=middle><font color="#000000">J</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000"  rowspan=3 height="40" width="60" align="center" valign=middle><font color="#000000">A</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000"  rowspan=3 height="40" width="60" align="center" valign=middle><font color="#000000">S</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000"  rowspan=3 height="40" width="60" align="center" valign=middle><font color="#000000">O</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" rowspan=3 height="40" width="60" align="center" valign=middle><font color="#000000">N</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000"  rowspan=3 height="40" width="60" align="center" valign=middle><font color="#000000">D</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000"  colspan="2" rowspan=3 height="40" width="60" align="center" valign=middle><font color="#000000">Observaciones</font></td>
		
	</tr>
	<tr>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
	<?php

$objetivos = array();
$riesgos = array();
$programas = array();
$aux = array();
$user = Usuario::model()->findByAttributes(array('nombre' => Yii::app()->user->fullname));

if ($unidades != null) {
    foreach ($unidades as $unidad) {
        $p = CaProgramaAuditoria::model()->findByAttributes(array('unidad_rectora' => $uo->id, 'unidad_a_auditar' => $unidad, 'anno' => $bs));
        $u = UnidadOrganizativa::model()->findByPK($unidad);

        if ($p != null) {
			$aux[]=$p;
            $objetivos[] = $p->objetivos_programa;
            $riesgos[] = $p->riesgos_programa;
            $programas[] = $p;

            $meses = array(
                'Enero' => $p->Enero,
                'Febrero' => $p->Febrero,
                'Marzo' => $p->Marzo,
                'Abril' => $p->Abril,
                'Mayo' => $p->Mayo,
                'Junio' => $p->Junio,
                'Julio' => $p->Julio,
                'Agosto' => $p->Agosto,
                'Septiembre' => $p->Septiembre,
                'Octubre' => $p->Octubre,
                'Noviembre' => $p->Noviembre,
                'Diciembre' => $p->Diciembre,
            );

            $fechasInicio = array(
                'Enero' => $p->f_Enero ? date('d', strtotime($p->f_Enero)) : '',
                'Febrero' => $p->f_Febrero ? date('d', strtotime($p->f_Febrero)) : '',
                'Marzo' => $p->f_Marzo ? date('d', strtotime($p->f_Marzo)) : '',
                'Abril' => $p->f_Abril ? date('d', strtotime($p->f_Abril)) : '',
                'Mayo' => $p->f_Mayo ? date('d', strtotime($p->f_Mayo)) : '',
                'Junio' => $p->f_Junio ? date('d', strtotime($p->f_Junio)) : '',
                'Julio' => $p->f_Julio ? date('d', strtotime($p->f_Julio)) : '',
                'Agosto' => $p->f_Agosto ? date('d', strtotime($p->f_Agosto)) : '',
                'Septiembre' => $p->f_Septiembre ? date('d', strtotime($p->f_Septiembre)) : '',
                'Octubre' => $p->f_Octubre ? date('d', strtotime($p->f_Octubre)) : '',
                'Noviembre' => $p->f_Noviembre ? date('d', strtotime($p->f_Noviembre)) : '',
                'Diciembre' => $p->f_Diciembre ? date('d', strtotime($p->f_Diciembre)) : '',
            );

            $fechasFin = array(
                'Enero' => $p->fin_Enero ? date('d', strtotime($p->fin_Enero)) : '',
                'Febrero' => $p->fin_Febrero ? date('d', strtotime($p->fin_Febrero)) : '',
                'Marzo' => $p->fin_Marzo ? date('d', strtotime($p->fin_Marzo)) : '',
                'Abril' => $p->fin_Abril ? date('d', strtotime($p->fin_Abril)) : '',
                'Mayo' => $p->fin_Mayo ? date('d', strtotime($p->fin_Mayo)) : '',
                'Junio' => $p->fin_Junio ? date('d', strtotime($p->fin_Junio)) : '',
                'Julio' => $p->fin_Julio ? date('d', strtotime($p->fin_Julio)) : '',
                'Agosto' => $p->fin_Agosto ? date('d', strtotime($p->fin_Agosto)) : '',
                'Septiembre' => $p->fin_Septiembre ? date('d', strtotime($p->fin_Septiembre)) : '',
                'Octubre' => $p->fin_Octubre ? date('d', strtotime($p->fin_Octubre)) : '',
                'Noviembre' => $p->fin_Noviembre ? date('d', strtotime($p->fin_Noviembre)) : '',
                'Diciembre' => $p->fin_Diciembre ? date('d', strtotime($p->fin_Diciembre)) : '',
            );

            $ob = $p->observaciones != null ? $p->observaciones : "";

            echo '<tr class="justify-content-between">';
            echo '<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" rowspan=2 height="40" align="center" valign=middle><font color="#000000">' . $u->siglas . '</font></td>';

            foreach ($meses as $mes => $valor) {
                $fechaInicio = $fechasInicio[$mes] ? $fechasInicio[$mes] : '?';
                $fechaFin = $fechasFin[$mes] ? $fechasFin[$mes] : '?';
                $rangoFechas = ($fechasInicio[$mes] || $fechasFin[$mes]) ? $fechaInicio . '-' . $fechaFin : '';
                $rangoFechas = $rangoFechas ? ' (' . $rangoFechas . ')' : '';
                echo '<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" rowspan=2 height="40" align="center" valign=middle sdval="1" ;"><font color="#000000">' . $valor . $rangoFechas . '</font></td>';
            }

            echo '<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan="2" rowspan=2 height="40" align="center" valign=middle><font color="#000000">' . $ob . '</font></td>';
            echo '<td align="left" valign=bottom><font color="#000000"><br></font></td>';
            echo '<td align="left" valign=bottom><font color="#000000"><br></font></td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td align="left" valign=bottom><font color="#000000"><br></font></td>';
            echo '<td align="left" valign=bottom><font color="#000000"><br></font></td>';
            echo '</tr>';
        }

        if ($objetivos == null) {
            $objetivos[] = "";
        }
        if ($riesgos == null) {
            $riesgos[] = "";
        }
    }

    if ($programas == null) {
        echo '<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=16 rowspan=1 height="58" align="center" valign=center><font color="#000000">No hay Programas de Auditoría correspondientes a esta Unidad Organizativa</font></td>';
    }
} else {
    $objetivos[] = "";
    $riesgos[] = "";
    echo '<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=16 rowspan=1 height="58" align="center" valign=center><font color="#000000">No se ha determinado una estructura de auditorías para esta Unidad Organizativa</font></td>';
}
?>



	
	
	<tr>
		<td height="19" align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="20" align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=16 height="19" align="left" valign=top><font color="#000000">Objetivos del programa:</font></td>
		</tr>
	<?php
	if($objetivos!=""){
		$a=1;
		
		echo '<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=16 height="20" align="left" valign=top><font color="#000000">'.$a.'-'.$objetivos[0].'</font></td>
		</tr>';
		$a++;}
		?>
		<tr>
		<td ><br></font></td>
		</tr>
		<tr>
		<td ><br></font></td>
		</tr>
		<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=16 height="19" align="left" valign=top><font color="#000000">Riesgos del programa:</font></td>
		</tr>
		<?php
	if($riesgos!=""){
		$b=1;
		
		echo '<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=16 height="20" align="left" valign=top><font color="#000000">'.$b.'-'.$riesgos[0].'</font></td>
		</tr>';
		$b++;}
		?>
		<tr>
		<td ><br></font></td>
		</tr>
	<tr>
		<td colspan=3 height="19" align="center" valign=bottom><font color="#000000">Aprobado por :</font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="8" align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=5 height="20" align="center" valign=bottom><font color="#000000">Nombre y Apellidos</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=5 align="center" valign=bottom><font color="#000000">Cargo</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=3 align="center" valign=bottom><font color="#000000">Fecha</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=3 align="center" valign=bottom><font color="#000000">Firma</font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
	<?php
		if(!empty($aux)){
	$trabajador=Trabajador::model()->findByAttributes(array('nombre_apellidos'=>$aux[0]->aprobado_por));
	$carg= Cargo::model()->findByAttributes(array('id'=>$trabajador->cargo));

	
	echo '<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=5 height="20" align="center" valign=bottom><font color="#000000">'.$aux[0]->aprobado_por.'<br></font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=5 align="center" valign=bottom><font color="#000000"><br>'.$carg->nombre.'</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=3 align="center" valign=bottom><font color="#000000">'.date("d").'/'.date("m").'/'.date("Y").'<br></font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=3 align="center" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>';}
	?>
</table>
</div></div><br>
<!-- ************************************************************************** -->

<div class="d-flex d-flex justify-content-center align-items-center">
<div class="btn-group row col-md-6 d-flex d-flex justify-content-end align-items-center" >
    <a href="#" id="exportarPDF" class="btn btn-light custom-btn" style="border-radius: 10px; margin-top: 10px; margin-left: 10px">
        <h2  style="font-family: 'Bahnschrift', sans-serif;color: #454545">Descargar Registro<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span><span class="bi bi-file-earmark" aria-hidden="true"></span></h2>
    </a>
</div></div>

    

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/node_modules/chart.js/dist/chart.umd.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.js"></script>


</div>
</body>

</html>
<script type="text/javascript">        
    $('#exportarPDF').click(function (){
        document.querySelector("#ppp").innerHTML="<b></b>"
        window.print();
        window.close();
    });
</script>