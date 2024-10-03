<?php
$inf=CaInformeAuditoria::model()->findByPk($informe)  ;
$plan=CaPlanAuditoria::model()->findByAttributes(array('auditoria'=>$inf->audit_id));
$equipos=CaEquipoAuditor::model()->findAllByAttributes(array('plan_audit'=>$plan->auditoria));
$r1=$inf->representantes;
$r2=$inf->representantes1;
$repre1=Trabajador::model()->findByAttributes(array('nombre_apellidos'=>$r1));
$area1=Area::model()->findByPK($repre1->departamento);
$cargo1=Cargo::model()->findByPK($repre1->cargo);
if($r2!=null)
{$repre2=Trabajador::model()->findByAttributes(array('nombre_apellidos'=>$r2));
$area2=Area::model()->findByPK($repre2->departamento);
$cargo2=Cargo::model()->findByPK($repre2->cargo);
}
$this->p2_PageTitle2("card-checklist", "Informe de Auditoría","Reporte","Gestión de Auditorías / Gestión de Informes");

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
.lateral{
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
<div class="row" ><div class="d-flex d-flex justify-content-center align-items-center">
<table class="d-flex d-flex justify-content-center align-items-center" cellspacing="0" border="0">
	<colgroup span="1" width="16"></colgroup>

	<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=4 height="77" align="left" valign=bottom><font color="#000000"><img   src="./images/logotipo-etecsa-version-horizontal-.png"></font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=7 rowspan=4 align="center" valign=middle><font color="#000000">Informe Resumen de Auditoría Interna</font></td>
		<td style="border-top: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=4 align="left" valign=bottom><font color="#000000">Código: REG 3 PG-SC-012/03</font></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000" colspan=2 align="left" valign=top><font color="#000000">Revisión: </font></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000" align="left" valign=top><font color="#000000">Fecha de Emisión:</font></td>
		<td style="border-top: 1px solid #000000; border-right: 2px solid #000000" align="left" valign=top><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=2 align="center" valign=top><font color="#000000">1</font></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=2 align="center" valign=top><font color="#000000"><?=date("d").'/'.date("m").'/'.date("Y")?></font></td>
		</tr>
	<tr>
		<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="left" valign=bottom><font color="#000000">Página 1 de 1</font></td>
		<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=2 align="left" valign=bottom><font color="#000000">Total de páginas:1</font></td>
		</tr>
	<tr>
		<td style="border-left: 2px solid #000000" colspan=13 height="20" align="left" valign=bottom><font color="#000000"><br></font></td>
		<td style="border-right: 2px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=14 rowspan=2 height="38" align="left" valign=top><b><font color="#000000">Fecha: <?= $inf->fecha_informe ?></font></b></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=14 rowspan=2 height="38" align="left" valign=top><b><font color="#000000">Objetivos de la Auditoría: <?= $inf->objetivo_auditoria ?></font></b></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=14 height="19" align="left" valign=top><b><font color="#000000">Alcance de la auditoría: <?= $inf->alcance ?></font></b></td>
		</tr>
	<tr>
		<td style="border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=14 height="19" align="left" valign=top><b><font color="#000000">Equipo Auditor.</font></b></td>
		</tr>
	<tr>
		<td style="border-left: 2px solid #000000" rowspan=10 height="190" align="left" valign=bottom><font color="#000000"><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=6 align="left" valign=bottom><font color="#000000">Nombre y Apellidos</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=6 align="left" valign=bottom><font color="#000000">Área</font></td>
		<td style="border-right: 2px solid #000000" rowspan=4 align="left" valign=bottom><font color="#000000"><br></font></td>
	</tr>
	<?php
	if($equipos!=null){
		foreach($equipos as $equipo){
			$aud=CaAuditor::model()->findByPk($equipo->auditor);
			if($equipo->funcion=='jefe'){$funcion='Auditor Líder';}
			if($equipo->funcion=='miembro'){$funcion='Auditor';}
			if($equipo->funcion=='formacion'){$funcion='En Formación';}
	echo '<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=6 align="left" valign=bottom><font color="#000000">'.$aud->nombre_apellido.'&nbsp ('.$funcion.')'.'</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=6 align="left" valign=bottom><font color="#000000">'.$aud->area.'</font></td>
		</tr>'
	;}}
	else{
		echo'<tr>
		<td style=style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan= height="19" align="center" valign=bottom ><font color="#000000">&nbsp;No se ha determinado un equipo de auditores.</font></td>
		</tr>'
	;}
	?>
	
	<tr style="border-right: 2px solid #000000">
		<td style="border-bottom: 1px solid #000000" colspan=12 rowspan=2 align="left" valign=bottom><b><font color="#000000">Representantes del Auditado:</font></b></td>
		</tr>
	<tr style="border-right: 2px solid #000000">
		</tr>
	<tr style="border-right: 2px solid #000000">
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><font color="#000000">Nro.</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="left" valign=bottom><font color="#000000">Nombre y Apellidos</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="left" valign=bottom><font color="#000000">Área</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=4 align="left" valign=bottom><font color="#000000">Cargo</font></td>
</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top sdval="1" sdnum="1033;"><font color="#000000">1</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="left" valign=bottom><font color="#000000"> <?= $r1 ?> </font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="left" valign=bottom><font color="#000000"><?= $area1->nombre ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=4 align="left" valign=bottom><font color="#000000"><?= $cargo1->nombre ?></font></td>
		</tr>
		<?php
		if($r2!=null){
		echo '<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top sdval="1" sdnum="1033;"><font color="#000000">1</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="left" valign=bottom><font color="#000000">'.$r2.'</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="left" valign=bottom><font color="#000000">'. $area2->nombre .'</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=4 align="left" valign=bottom><font color="#000000"><?='. $cargo2->nombre .'</font></td>
		</tr>';}
	?>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=14 rowspan=3 height="57" align="left" valign=middle><b><font color="#000000">Rutas de la auditoría y hallazgos: <?= $inf->rutas .','. $inf->hallazgos ?></font></b></td>
		</tr>
	<tr>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=14 rowspan=2 height="38" align="left" valign=top><b><font color="#000000">Evaluación y Conclusiones: <?= $inf->evaluacion  ?></font></b></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=14 height="20" align="center" valign=bottom><b><font color="#000000">Documentos revisados</font></b></td>
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

