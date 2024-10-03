<?php
$plan=CaPlanAuditoria::model()->findByPk($plan);
$equipos=CaEquipoAuditor::model()->findAllByAttributes(array('plan_audit'=>$plan->auditoria));
$actividades=CaActividad::model()->findAllByAttributes(array('plan'=>$plan->id));
$area=UnidadOrganizativa::model()->findByAttributes(array('id'=>$plan->area));
$auditoria=CaAuditoria::model()->findByPk($plan->auditoria);

$this->p2_PageTitle2("briefcase", "Plan de Auditorías","Listado","Gestión de Auditorías / Gestión de Planes");

?>


<style>
	td {
            word-wrap: break-word;
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
<div class="row"><div class="d-flex d-flex justify-content-center align-items-center">
<table class="d-flex d-flex justify-content-center align-items-center" cellspacing="0" border="0">
	<colgroup span="1" width="16"></colgroup>

	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=4 height="76" align="center" valign=bottom><font color="#000000"><img   src="./images/logotipo-etecsa-version-horizontal-.png"></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 rowspan=4 align="center" valign=middle><font color="#000000">Plan de Auditoría</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=bottom><font color="#000000"></font></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=top><font color="#000000">Revisión: 3</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=top><font color="#000000">Fecha de emisión: <?=date("d").'/'.date("m").'/'.date("Y")?></font></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="left" valign=bottom><font color="#000000">Página 1</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="left" valign=bottom><font color="#000000">Total de páginas: 1</font></td>
		</tr>
		<tr>
		<td  colspan=10 height="29" align="right" valign=middle><b><font color="#000000"> REG 2 PG-CA-004/03</font></b></td>
		</tr>
	<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=5 rowspan=2 height="38" align="left" valign=middle><b><font color="#000000">Area: <?= $area->nombre ?></font></b></td>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=5 rowspan=2 align="left" valign=middle><b><font color="#000000">Objetivo: <?= $plan->objetivo_plan?></font></b></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=5 height="19" align="left" valign=middle><b><font color="#000000">Fecha: <?= $auditoria->fecha_A!='' ? $auditoria->fecha_A : 'Fecha sin determinar'?></font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=5 rowspan=2 align="left" valign=middle><b><font color="#000000">Alcance: <?= $plan->alcance ?></font></b></td>
	
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=10 height="19" align="left" valign=middle><b><font color="#000000">Período a Evaluar: <?= $plan->periodo ?></font></b></td>
		</tr>
		<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=10 height="19" align="left" valign=middle><b><font color="#000000">Equipo Auditor:</font></b></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=5 height="19" align="left" valign=middle><b><font color="#000000">Nombres y Apellidos:</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=5 align="left" valign=middle><b><font color="#000000">Cargos:</font></b></td>
		</tr>
	<?php
	if($equipos!=null){
		foreach($equipos as $equipo){
			$aud=CaAuditor::model()->findByPk($equipo->auditor);
			if($equipo->funcion=='jefe'){$funcion='Auditor Líder';}
			if($equipo->funcion=='miembro'){$funcion='Auditor';}
			if($equipo->funcion=='formacion'){$funcion='En Formación';}
		echo '<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=5 height="19" align="left" valign=middle><font color="#000000">'.$aud->nombre_apellido.'&nbsp ('.$funcion.')'.'</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=5 align="left" valign=middle><font color="#000000">'.$aud->cargo.'</font></td>
		</tr>';
		}}
		else{
			echo'<tr>
			<td style="border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=13 height="19" align="center" valign=bottom><font color="#000000">&nbsp;No se ha determinado un equipo de auditores.</font></td>
			</tr>'
		;}
		?>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=10 height="25" align="left" valign=middle><b><font color="#000000">Programación de las actividades</font></b></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000;border-bottom: 1px solid #000000" height="19" align="center" valign=middle><b><font color="#000000">Fecha </font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 rowspan=2 align="center" valign=middle><b><font color="#000000">Actividad</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=5 rowspan=2 align="center" valign=middle><b><font color="#000000">Objetivos</font></b></td>
		</tr>
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle><b><font color="#000000">Hora</font></b></td>
		</tr>
		<?php
	if($actividades!=null){
		foreach($actividades as $actividad){
	echo '<tr>
		<td  class="col-lg-2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle><font color="#000000">'.$actividad->fecha.'</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 rowspan=2 align="center" valign=top><font color="#000000">'.$actividad->actividad.'</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=5 rowspan=2 align="center" valign=top><font color="#000000">'.$actividad->objetivo.'</font></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle><font color="#000000">Desde '.$actividad->hora.' '.$actividad->dia.'</br> hasta '.$actividad->hora_fin.' '.$actividad->dia_fin.'</font></td>
		</tr>';
		}}
		else{
			echo'<tr>
			<td style="border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=13 height="19" align="center" valign=bottom><font color="#000000">&nbsp;No hay actividades asociadas a este plan.</font></td>
			</tr>'
		;}
		?>
	
	
	<tr>
	<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=10 height="19" align="left" valign=middle><b><font color="#000000"></font></b></td>

	</tr>
	<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=5 height="19" align="left" valign=middle><font color="#000000">Nombre y Apellidos</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="left" valign=middle><font color="#000000">Firma</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=3 align="left" valign=middle><font color="#000000">Fecha</font></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=5 height="19" align="left" valign=middle><font color="#000000">Elaborado por: <?= $plan->plan_elaborado_por ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="left" valign=middle><font color="#000000"><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=3 align="left" valign=middle sdval="44631" sdnum="1033;0;M/D/YYYY"><font color="#000000"><?= $plan->fecha_plan ?></font></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=5 height="20" align="left" valign=middle><font color="#000000">Aprobado por:  <?= $plan->plan_aprobado_por ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="left" valign=middle><font color="#000000"><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=3 align="left" valign=middle sdval="44631" sdnum="1033;0;M/D/YYYY"><font color="#000000"><?= $plan->fecha_plan ?></font></td>
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

    
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/node_modules/chart.js/dist/chart.umd.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.js"></script>


   
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


