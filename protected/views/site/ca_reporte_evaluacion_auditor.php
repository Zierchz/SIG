<?php 
$eva=CaEvaluacionAuditor::model()->findByPk($evaluacion)  ;
$auditor=CaAuditor::model()->findByAttributes(array('id'=>$eva->auditor))  ;
$equipo=CaEquipoAuditor::model()->findByAttributes(array('auditor'=>$auditor->id))  ;
$jefe=CaEquipoAuditor::model()->findByAttributes(array('plan_audit'=>$equipo->plan_audit,'funcion'=>'jefe'))  ;
$jef=CaAuditor::model()->findByAttributes(array('id'=>$jefe->auditor))  ;

$criteria = new CDbCriteria();
$criteria->compare('id_evaluacion', $evaluacion);
$notas = CaNotaCriterioEvaluacionAuditor::model()->findAll($criteria);
$fecha_eva=null;

foreach($notas as $nota){

	$fecha_eva=$nota->fecha;
}
$this->p2_PageTitle2("person-vcard-fill", "Evaluación de Auditor","Reporte","Gestión de Auditorías / Gestión de Evaluaciones");


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
.lateral{
display: none;
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

<body>
<div class="row"><div class="justify-content-center align-items-center">
<table class="d-flex d-flex justify-content-center align-items-center" cellspacing="0" border="0">
	<colgroup span="1" width="16"></colgroup>


	<tr>
	<div class="row"><strong style="text-align:center;">REG 5 PG-SC-012/03 </strong></div></br>

		<td   colspan=13 rowspan=2 height="39" align="center" valign=middle><b><font color="#000000">&quot;Evaluación del Auditor Interno&quot;</font></b></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=13 rowspan=2 height="38" align="left" valign=top><b><font color="#000000">&nbsp;Nombre del auditor evaluado:&nbsp;<?= $auditor->nombre_apellido ?></font></b></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=13 rowspan=2 height="38" align="left" valign=top><b><font color="#000000">&nbsp;Área a la que pertenece el auditor evaluado:&nbsp;<?= $eva->area ?></font></b></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=13 rowspan=2 height="38" align="left" valign=top><b><font color="#000000">&nbsp;Auditoría Realizada: <?= $eva->auditoria_realizada ?></font></b></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=13 rowspan=2 height="38" align="left" valign=top><b><font color="#000000">&nbsp;Fecha en la que se evalúa:&nbsp; <?= $fecha_eva ?></font></b></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=13 height="19" align="left" valign=top><b><font color="#000000">&nbsp;EVALUACIÓN:</font></b></td>
		</tr>





<?php

foreach($notas as $nota){

	$fecha_eva=$nota->fecha;
	



echo'	<tr>
<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=13  height="38" align="left" ><b><font color="#000000">&nbsp;'.$nota->nombre_criterio.': '.$nota->nota.' pts&nbsp;</font></b></td>
</tr>';




}





?>




	
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=7 rowspan=3 height="57" align="left" valign=middle><b><font color="#000000">&nbsp;Evaluación Final : <?= $eva->evaluacion_final ?></font></b></td>
		<?php
		if($eva->evaluacion_final<60){
		echo '<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=3 align="left" valign=middle><b><font color="#000000">&nbsp;Aceptado  <font style="text-decoration: underline;">&nbsp;&nbsp;&nbsp;</font></font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=3 rowspan=3 align="left" valign=middle><b><font color="#000000" >&nbsp;No aceptado <font style="text-decoration: underline;">&nbsp;X&nbsp;</font></font></b></td>'
	;}
	else{echo '<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=3 align="left" valign=middle><b><font color="#000000">&nbsp;Aceptado  <font style="text-decoration: underline;">&nbsp;X&nbsp;</font></font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=3 rowspan=3 align="left" valign=middle><b><font color="#000000" >&nbsp;No aceptado <font style="text-decoration: underline;">&nbsp;&nbsp;&nbsp;</font></font></b></td>';
	}
		?>
	</tr>
	<tr>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=13 rowspan=4 height="76" align="left" valign=top><b><font color="#000000">Observaciones: <?= $eva->observaciones ?></font></b></td>
		</tr>
	<tr>
		</tr>
	<tr>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=7 height="19" align="left" valign=top><b><font color="#000000">Nombre y Apellidos</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=top><b><font color="#000000">Firma</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=3 align="left" valign=top><b><font color="#000000">Fecha</font></b></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=7 rowspan=2 height="38" align="left" valign=top><b><font color="#000000">Auditor Jefe: <?= $jef->nombre_apellido ?></font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 align="left" valign=top><b><font color="#000000">     </font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=3 rowspan=2 align="left" valign=top sdval="44391" sdnum="1033;0;M/D/YYYY"><font color="#000000"><strong>&nbsp;<?=date("d").'/'.date("m").'/'.date("Y")?></strong></font></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=7 rowspan=2 height="39" align="left" valign=top><b><font color="#000000">Auditor evaluado:  <?= $auditor->nombre_apellido ?></font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 align="left" valign=top><b><font color="#000000"><br></font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=3 rowspan=2 align="left" valign=top sdval="44393" sdnum="1033;0;M/D/YYYY"><font color="#000000"><strong>&nbsp;<?=date("d").'/'.date("m").'/'.date("Y")?></strong></font></td>
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

<!-- <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/node_modules/chart.js/dist/chart.umd.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.js"></script>

 -->

   
</div>
</body>
<br><br>
</html>
<script type="text/javascript">        
    $('#exportarPDF').click(function (){
        document.querySelector("#ppp").innerHTML="<b></b>"
        window.print();
        window.close();
    });
</script>
