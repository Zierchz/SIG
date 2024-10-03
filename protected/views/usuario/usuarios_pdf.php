<?php
/* @var $this SiteController */
$pdf = Yii::createComponent('application.extensions.mpdf60.mpdf');
$mpdf = new mPDF('win-1252','A4-L');
$mpdf->WriteHTML("<style>table {border-collapse: collapse;}table, th, td {border: 1px solid black;}</style>");
$mpdf->WriteHTML("<div align='center'><b>LISTADO DE USUARIOS DEL PORTAL EJECUTIVO</b></div><br/>");
$mpdf->WriteHTML("<div align='center'><b>FECHA: ".date('y-m-d') ."</b></div><br/>");
$c=1;
$html= "<table style='width: 100%'>";
$html.= '<thead>
            <tr>
                <th width="5%">#</th>
                <th width="15%">Usuario</th>
                <th width="10%">Rol</th>
                <th width="30%">Nombre</th>
				<th width="35%">Cargo</th>
                <th width="5%">U.O</th>
            </tr>
        </thead>';
$data1=$data;
foreach($data as $row):
    $html.= "<tr>";
    $html.= "<td align='center'>".$c."</td>";
    $html.= "<td> ".$row['username']."</td>";
    $html.= "<td> ".$row['rolname']."</td>";
    $html.= "<td> ".$row['fullname']."</td>";
	$html.= "<td> ".$row['cargo']."</td>";
	$html.= "<td align='center'> ".$row['siglas']."</td>";
    $html.= "</tr>";
    $c+=1;
endforeach;
$html.= "</table>";
$html.="</div>";
$mpdf->WriteHTML($html);
$pie = "<br/><br/><br/><div align='right'><b>Elaborado por:<br/>PORTAL EJECUTIVO</b></div>";
$mpdf->WriteHTML($pie);
$mpdf->Output('Listado de usuarios Portal Ejecutivo','D');
exit;
?>