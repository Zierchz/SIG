







<?php 
$rev=CaRevisionDireccion::model()->findByPk($revision)  ;
$procesos=CaProceso::model()->findAllByAttributes(array('revision'=>$revision))  ;



$this->p2_PageTitle("clipboard-check", "Programa Anual de Revisión por la Dirección", "Reporte", "Gestión de Programas Anuales de Revisión por la Dirección");



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
.lateral{
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
<br><br>
<body>
	<div class="row"><div class="col-lg-3"></div><div class="col-lg-6">
<table cellspacing="0" border="0">
	<colgroup span="12" width="64"></colgroup>
	<colgroup width="55"></colgroup>
	
	
	<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=4 height="76" align="center" valign=bottom><font color="#000000"><img   src="./images/logotipo-etecsa-version-horizontal-.png"><br></font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=6 rowspan=4 align="center" valign=middle><b><font color="#000000">Programa de Revisión del SGC por la máxima Dirección</font></b></td>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=5 rowspan=2 align="center" valign=top><b><font color="#000000">CÓDIGO:  REG 1-PG-SC-006/03</font></b></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=5 rowspan=2 align="center" valign=middle><b><font color="#000000">Fecha de emisión: <?= date("d").'/'.date("m").'/'.date("Y") ?> </font></b></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 height="38" align="center" valign=middle><b><font color="#000000">Proceso</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=6 align="center" valign=bottom><b><font color="#000000">Fecha de la Revisión</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=5 align="center" valign=bottom><b><font color="#000000">Responsable del proceso</font></b></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=bottom><b><font color="#000000">Programada</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=3 align="center" valign=bottom><b><font color="#000000">Efectuada</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=5 align="center" valign=bottom><b><font color="#000000">Nombre y Apellidos/Firma</font></b></td>
		</tr>
		<?php
		if($procesos!=null){
		foreach($procesos as $proceso){
			echo
	'<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=2 height="19" align="center" valign=bottom><font color="#000000">'.$proceso->nombre.'</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=bottom><font color="#000000">'.$proceso->fecha_programada.'</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=3 align="center" valign=bottom><font color="#000000">'.$proceso->fecha_efectuada.'</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=5 align="center" valign=bottom><font color="#000000">'.$proceso->responsable.'</font></td>
		</tr>'
		;}}
		else{
			echo'<tr>
			<td style="border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=13 height="19" align="center" valign=bottom><font color="#000000">&nbsp;No hay procesos asociados a esta revisión.</font></td>
			</tr>'
		;}
	?>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000" colspan=2 rowspan=2 height="38" align="center" valign=middle><b><font color="#000000">Observaciones</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=11 rowspan=2 align="left" valign=middle><font color="#000000">&nbsp; <?= $rev->observaciones?></font></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 height="38" align="center" valign=middle><b><font color="#000000">Elaborado por:</font></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 align="left" valign=middle><font color="#000000"> &nbsp;<?= $rev->revision_elaborado_por ?></font></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 align="center" valign=middle><b><font color="#000000">Aprobado por:</font></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=5 rowspan=2 align="left" valign=middle><font color="#000000">&nbsp; <?= $rev->revision_aprobado_por ?></font></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 height="39" align="center" valign=middle><b><font color="#000000">Fecha de elaborado:</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 align="left" valign=middle><font color="#000000"> &nbsp; <?= $rev->fecha_elaborado ?> </font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 align="center" valign=middle><b><font color="#000000">Fecha de Aprobado:</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=5 rowspan=2 align="left" valign=middle><font color="#000000">&nbsp;<?= $rev->fecha_aprobado ?></font></td>
		</tr>
	<tr>
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