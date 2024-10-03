<?php 
$auditores=CaAuditor::model()->findAll();

$this->p2_PageTitle("person-check-fill", "Auditores", "Reporte", "Gestión de Auditores");

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
.lateral{
display: none;
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

}

</style>

<p id="ppp" align="center"></p>

<!DOCTYPE html>

<html>
<head>
	
	
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Arial"; font-size:11px }
		a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
		a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
		comment { display:none;  } 
	</style>
	
</head>

<body >
<div class="row "><div class="d-flex d-flex justify-content-center align-items-center">
<table class="d-flex d-flex justify-content-center align-items-center" cellspacing="0" border="0">
	<colgroup span="1" width="16"></colgroup>

	<tr>
		<td height="19" align="left" valign=bottom><font color="#000000"><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 rowspan=4 align="center" valign=bottom><font color="#000000"><br><img   src="./images/logotipo-etecsa-version-horizontal-.png"></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=6 rowspan=4 align="center" valign=middle><font color="#000000">Listado de Auditores Internos      Año: <?=date("Y")?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="left" valign=bottom><font color="#000000"><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="center" valign=middle><font color="#000000">Revisión: 1</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 align="center" valign=middle><font color="#000000">Fecha de emisión: <?=date("d").'/'.date("m").'/'.date("Y")?></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" colspan=8 align="left" valign=bottom><font color="#000000"><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=bottom><font color="#000000">Hoja: 1</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=1 align="center" valign=bottom><font color="#000000">de: 1</font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td style="border-top: 1px solid #000000" colspan=4 align="center" valign=bottom><b><font color="#000000">Listado de Auditores Internos</font></b></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
		<td colspan=4 align="center" valign=bottom><b><font color="#000000">Unidad Organizativa: DCIE</font></b></td>
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
		<td style="border-bottom: 1px solid #000000" colspan=4 align="center" valign=bottom><b><font color="#000000">REG 4 PG-SC-012/03</font></b></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 height="38" align="center" valign=bottom bgcolor="#EDEDED"><b><font color="#000000">No.</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 align="center" valign=bottom bgcolor="#EDEDED"><font color="#000000">Nombres y Apellidos</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="center" valign=bottom bgcolor="#EDEDED"><font color="#000000">Cargo/Área</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="center" valign=bottom bgcolor="#EDEDED"><font color="#000000">Unidad Organizativa</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 align="center" valign=bottom bgcolor="#EDEDED"><font color="#000000">Correo/Teléfono</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="center" valign=bottom bgcolor="#EDEDED"><font color="#000000">Competencias</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="center" valign=bottom bgcolor="#EDEDED"><font color="#000000">Alcance</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="center" valign=bottom bgcolor="#EDEDED"><font color="#000000">Observaciones</font></td>
		</tr>
	<tr>
		</tr>
	<?php
	$a=0;
	if($auditores!=null){
		foreach($auditores as $auditor){
			$a=$a+1;
			$uni=UnidadOrganizativa::model()->findByPk($auditor->unidad);
		echo
		'<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 height="57" align="center" valign=middle sdval="1" sdnum="1033;"><font color="#000000"> '.($a) .' </font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=3 align="center" valign=middle><font color="#000000"> '.$auditor->nombre_apellido .' </font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=3 align="center" valign=middle><font color="#000000">'.$auditor->cargo .'</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=3 align="center" valign=middle><font color="#000000">'.$uni->siglas .'</font></td>
		<td colspan=3 rowspan=2 align="center" valign=bottom><font color="#000000">'.$auditor->correo.'</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=3 align="center" valign=middle><font color="#000000">'.$auditor->competencia .'</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=3 align="center" valign=middle><font color="#000000">'.$auditor->alcance .' </font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=3 align="center" valign=middle><font color="#000000">'.$auditor->observaciones .'</font></td>
		</tr>
	<tr>
		</tr>
	<tr>
';
$tele_movil="";
$tele_fijo="";

	if ($auditor->telf_movil=="---")
	$tele_movil="";
	if ($auditor->telf_fijo=="ND")
	$tele_fijo="";

	echo'
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=bottom><font color="#000000">'.$tele_movil.' - '.$tele_fijo .'</font></td>
		</tr>'; }}?>
		
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
	</tr>
	<tr>
		<td height="19" align="left" valign=bottom><font color="#000000"><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 align="center" valign=bottom><font color="#000000">Elaborado por:</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" valign=bottom><font color="#000000">Fecha</font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="left" valign=bottom><font color="#000000"><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 rowspan=2 align="center" valign=bottom><font color="#000000"><?=Yii::app()->user->fullname?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 rowspan=2 align="center" valign=bottom><font color="#000000"><?=date("d").'/'.date("m").'/'.date("Y")?></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="left" valign=bottom><font color="#000000"><br></font></td>
		<td align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
</table>
</div></div><br>
<!-- ************************************************************************** -->
<div class="col-lg-5"></div>

<div class="d-flex d-flex justify-content-center align-items-center">
<div class="btn-group row col-md-6 d-flex d-flex justify-content-end align-items-center" >
    <a href="#" id="exportarPDF" class="btn btn-light custom-btn" style="border-radius: 10px; margin-top: 10px; margin-left: 10px">
        <h2  style="font-family: 'Bahnschrift', sans-serif;color: #454545">Descargar Registro<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span><span class="bi bi-file-earmark" aria-hidden="true"></span></h2>
    </a>
</div></div>
<?php

?>
</body>
<br><br>
</html>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/node_modules/chart.js/dist/chart.umd.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.js"></script>



<script type="text/javascript">        
    $('#exportarPDF').click(function (){
        document.querySelector("#ppp").innerHTML="<b></b>"
        window.print();
        window.close();
    });
</script>

