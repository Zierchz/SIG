<?php

/* @var $this SiteController */

$header = $_GET['header'];
$fullname= $_GET['fullname'];
$mes= $_GET['mes1'];
$year= $_GET['year1'];
//Variables Globales Declaration---------------------------------------------
global $tareasxdias;
$tareasxdias = array();
global $num;
$num = $_GET['num'];
global $day1;
$day1 = $_GET['day1'];
global $final1;
$final1 = $_GET['final1'];
global $cuerpo;
$cuerpo="";
global $dia;
$dia = 1;
global $d;
$d = 1;
global $days;
$days = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado',);
$ms = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
//----------------------------------------------------------------------------
function listarTarea($fecha)
{
    $results = Yii::app()->db->createCommand()->
    select('t.id,t.nombre, t.horas, t.fecha, ti.cumplimiento, t.tipo')->
    from('tarea t')->
    join('tarea_individual ti', 't.id=ti.id_tarea')->
    where('t.fecha=:fecha', array(':fecha'=>$fecha))->
    andwhere ('ti.id_trab=:id_trab',array(':id_trab'=>$_SESSION['id_trab']))->
    queryAll();
    return $results;
}
$ltask = "";
while($d<=$num)
{
    $pfecha = date("Y-m-d",mktime(0, 0, 0, $mes, $d, $year));
    $results = listarTarea($pfecha);
    foreach($results as $tarea)
    {
        $nombre = $tarea['nombre'];
        $hora = $tarea['horas'];
        $id = $tarea['id'];
        $cumplimiento = $tarea['cumplimiento'];
        if ($cumplimiento == 0)
            $cumplimiento1 = "No Cumplida";
        else
            $cumplimiento1 = "Cumplida";
        $ltask=$ltask."&nbsp;" . $hora . "&nbsp;&nbsp;" . $nombre."<br/>";
    }
    $tareasxdias[$d] = $ltask;
    $d+=1;
    $ltask="";
}
$d=1;
//-----------------------------------------------------------------------------
$pdf = Yii::createComponent('application.extensions.mpdf60.mpdf');
$mpdf = new mPDF('win-1252','LETTER');
$mpdf->WriteHTML($header);

function print_Cell_Header_All()
{
    global $cuerpo;
    global $dia;
    global $day1;
    global $days;
    global $num;
    $cuerpo=$cuerpo. "<tr>";
    if($dia==1)
    {
        if($day1=="Domingo")
            $position=7;
        else
            $position = array_search($day1,$days);
    }
    foreach ($days as &$valor)
    {
        if(array_search($valor,$days)<$position||(($dia > $num)&&($dia <0)))
            $cuerpo=$cuerpo. "<td align='center' bgcolor='#99CCFF' width='200px'>&nbsp;</td>";
        else
        {
            $cuerpo=$cuerpo. "<td align='center' bgcolor='#99CCFF' width='200px'><b>".$valor."&nbsp;".$dia."</b></td>";
            if(($dia < $num)&&($dia >0))
                $dia+=1;
            else
                $dia = 0;
        }
    }
    unset($valor);
    $cuerpo=$cuerpo. "</tr>";
}
function print_Cell_Content_All(){
    global $cuerpo;
    global $tareasxdias;
    global $d;
    global $dia;
    global $day1;
    global $days;
    global $num;
    global $final1;
    if($day1=="Domingo")
        $position = 6;
    else
        $position = array_search($day1, $days);
    $cuerpo=$cuerpo. "<tr>";
    $i = 0;
    while($i<5)
    {
        $cuerpo=$cuerpo."<td rowspan='3' valign='top'>";
        if(($d==1 && $position==$i)||($d>1&&$d<=$num)) {
            $cuerpo = $cuerpo . $tareasxdias[$d];
            $d+=1;
        }
        $cuerpo=$cuerpo."</td>";
        $i+=1;
    }
    $cuerpo=$cuerpo."<td valign='top'>";
    if(($d==1 && $position==$i)||($d>1&&$d<=$num)) {
        $cuerpo = $cuerpo . $tareasxdias[$d];
        $d+=1;
    }
    $cuerpo=$cuerpo."</td></tr>";
    if($dia==0)
        $dia="";
    $cuerpo=$cuerpo. "<tr><td align='center' bgcolor='#99CCFF' height='20px'><b>Domingo ".$dia."</b></td></tr>";
    $dia+=1;
    $cuerpo=$cuerpo. "<tr><td valign='top'>";
    $cuerpo = $cuerpo . $tareasxdias[$d];
    $d+=1;
    $cuerpo=$cuerpo."</td></tr>";
}

for ($i=0; $i < 6; $i++)
{
    if($dia>$num)
        break;
    $cuerpo=$cuerpo. '<div class="table-responsive">';
    $cuerpo=$cuerpo. '<table border="1" width="100%">';
    print_Cell_Header_All();
    print_Cell_Content_All();
    $cuerpo=$cuerpo. "</table>";
    $cuerpo=$cuerpo. "</div><br/>";

    if($d>$num)
        break;
}
$cuerpo=$cuerpo. "</div>";

$mpdf->WriteHTML($cuerpo);
$pie = "<br/><br/><br/><div align='right'><b>Elaborado por:<br/>".$fullname."</b></div>";
$mpdf->WriteHTML($pie);
$mpdf->Output('PTI '.$fullname.' '.$ms[$mes-1].' '.$year.'.pdf','D');
exit;
?>