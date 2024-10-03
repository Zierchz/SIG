<?php
$list=CaListaVerificacion::model()->findByPk($lista);
$aud=CaAuditor::model()->findbyAttributes(array('id'=>$list->lider));
$preguntas=CaPreguntas::model()->findAllByAttributes(array('lista_id'=>$list->id));
$area=UnidadOrganizativa::model()->findByAttributes(array('id'=>$list->area_audit));

$this->p2_PageTitle2("list-check", "Lista de Verificación","Reporte","Gestión de Auditorías / Gestión de Listas");


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
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=5 height="95" align="left" valign=middle><font color="#000000"><img   src="./images/logotipo-etecsa-version-horizontal-.png"></font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=7 rowspan=5 align="center" valign=middle><font color="#000000">Modelo de Lista de Verificación</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=4 align="left" valign=middle><font color="#000000">Código: REG 3 PG-SC-012/03</font></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="left"><font color="#000000">Revisión: 1</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=2 rowspan=2 align="left"><font color="#000000">Fecha de emisión: <?=date("d").'/'.date("m").'/'.date("Y")?> </font></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="left"><font color="#000000">Pág: 1</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=2 rowspan=2 align="left"><font color="#000000">Total de páginas: 1</font></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=8 rowspan=2 height="38" align="left" valign=middle><font color="#000000">Auditor: <?=$aud->nombre_apellido ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=middle><font color="#000000">Fecha: <?=$list->fecha ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=4 rowspan=2 align="left" valign=middle><font color="#000000">Área Auditada: <?=$area->siglas ?></font></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=5 rowspan=2 height="38" align="left" valign=middle><font color="#000000">Preguntas</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 align="center" valign=middle><font color="#000000">Referencias</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle><font color="#000000">Conformidad</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=4 rowspan=2 align="center" valign=middle><font color="#000000">Observaciones</font></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><font color="#000000">Si</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><font color="#000000">No</font></td>
		</tr>
	<?php
	if($preguntas!=null){
		foreach($preguntas as $pregunta){
		echo '<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=5 height="19" align="left" valign=middle><font color="#000000">'.$pregunta->pregunta.'</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=middle><font color="#000000">'.$pregunta->referencia.'</font></td>';
		if($pregunta->conformidad=="Si"){
		echo '<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><font color="#000000">X</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><font color="#000000"><br></font></td>';}
		if($pregunta->conformidad=="No"){
			echo '<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><font color="#000000"></font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><font color="#000000">X<br></font></td>';}
			if($pregunta->conformidad==null){
				echo '<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000;" align="right" valign=middle><font color="#000000">Pendi</font></td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><font color="#000000">ente<br></font></td>';}
				
		echo '<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=4 align="left" valign=middle><font color="#000000">'.$pregunta->observaciones.'</font></td>
		</tr>';
	}}
	else{
		echo'<tr>
		<td style="border-left: 2px solid #000000; border-right: 2px solid #000000; border-bottom: 1px solid #000000;" colspan=14 height="19" align="center" valign=bottom><font color="#000000">&nbsp;No hay preguntas asociadas a esta lista.</font></td>
		</tr>'
	;}?>
	
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


