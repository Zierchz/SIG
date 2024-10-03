<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;

 if(!Yii::app()->user->isGuest):
     $id = Yii::app()->user->trabid;
     $fullname = Yii::app()->user->name;
     $fullname1 = Trabajador::model()->findByPk($id)->getAttribute("especialidad"). " " . $fullname;
     $ms = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
     $dayEng = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
     $dayEsp = array('Lunes',' Martes','Miercoles','Jueves','Viernes','Sábado','Domingo');

     $id_trab = Yii::app()->user->trabid;
     if(isset($_POST['btn_buscar']))
     {
         $id_trab = $_POST['id_trab'];
         $date = $_POST['mes'];
         $array_date = explode('-',$date);
         $mes = $array_date[0];
         $year = $array_date[1];

     }
     $this->myBreadCrumb("Reportes","Plan de Trabajo Individual");
?>
<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Reportes: Plan de Trabajo Individual</h1>
        </div>
    </div>
    <?php
    $url = "img/etecsa2.png";
    echo '<div class="row">';
    echo '<div class="col-lg-12">';
    echo '<div class="panel panel-primary">';
    echo '<div align="right" class="panel-heading">
         <form role="form" action="" id="mesanof" method="post">';
        if($_SESSION['grupo'] != 1)
        {
            echo '<div class="col-lg-3">
                    <div class="form-group">
                            <select class="form-control" name="id_trab" id="id_trab">
                                <option value = "NULL"> Seleccione el trabajador </option>';
                                $vacia = true;
                                $results = Yii::app()->db->createCommand()->
                                select('primer_nombre, primer_apellido, segundo_apellido, ci, id, especialidad')->
                                from('trabajador u')->
                                queryAll();
                                foreach($results as $trabajador)
                                {
                                    $full_name = $trabajador['primer_nombre']." ".$trabajador['primer_apellido']." ".$trabajador['segundo_apellido'];
                                    $full_name1 = $trabajador['especialidad']." ".$full_name;
                                    $ci = $trabajador['ci'];
                                    $id = $trabajador['id'];
                                    echo "<option value = '$id'>".$full_name."</option>";
                                }
            echo '</select></div></div>';
            echo "<input id='fullname' name='fullname' type ='hidden' value=\"".$fullname1."\">";
        }
        else /*ok*/
        {
            echo "<input name='id_trab' id='id_trab' type='hidden' value=\"".$id."\">";
            echo "<input id='fullname' name='fullname' type ='hidden' value='".$fullname1."'>";
        }
    ?>
        <div class="col-lg-3">
            <div class="form-group">
                <div class="input-group" id="sandbox-container">
                    <input type="text" name="mes" readonly="readonly" id="mes" class="form-control" placeholder="Seleccione Mes-Año">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-1">
            <div class="form-group" align="left">
                <button type="submit" class="btn btn-primary" name='btn_buscar' id='btn_buscar'><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
    </form>

    <span align="right"><button type="button" class="btn btn-primary" name='btn_reload' id='btn_reload' style="margin: 0px 0px 0px;" onClick="document.location.reload();"><i class="glyphicon glyphicon-repeat"></i></button> |&nbsp;
    <button type="button" class="btn btn-primary" name='btn_pdf' id='btn_pdf' style="margin: 0px 0px 0px;"><i class="glyphicon glyphicon-save"></i> PDF</button></div>
    <?php
    //echo '<a id="pdf" style="color: white" href=""><i class="fa fa-save"></i> PDF</span></a></div>';
    echo '<div class="panel-body"  id="cuerpo">';
    echo '<div id="headerpdf">';
    echo '<p align="right"><img src='.$url.' height="50px" width="200px" /><br/>';
    echo '<b>Direcci&oacute;n Operaciones de Seguridad</b></p>';
    echo '<p><b>Aprobado:<br/>';
    $id_area = Yii::app()->user->trabarea;
    $area = Area::model()->findByPk($id_area);
    $area_nombre = $area->nombre;
    $results = Yii::app()->db->createCommand(
        array(
            'select'=>array('t.primer_nombre', 't.segundo_nombre', 't.primer_apellido', 't.segundo_apellido', 'c.descripcion'),
            'from'=>'trabajador t, cargo c',
            'where'=>'t.departamento=:departamento and t.cargo=2 and c.id=2',
            'params' =>array(':departamento'=>$id_area),
        ))->queryrow();
    $boss_name = $results['primer_nombre']." ".$results['segundo_nombre']." ".$results['primer_apellido']." ".$results['segundo_apellido'];
    $boss_charge = $results['descripcion'];
    echo '<label>Nombre: '.$boss_name.'<br/>';
    echo ''.$boss_charge.' '.$area_nombre.'</label></b></p>';
    echo "<p align='center'><b>PLAN DE TRABAJO INDIVIDUAL DEL ESPECIALISTA: <u>".$fullname."</u> PARA EL MES DE <u>".$ms[$mes-1]."</u> DE <u>$year</u></b></p>";
    echo '<p><b>  TAREAS PRINCIPALES:<br/>';
    echo '<p><b>  TAREAS GENERALES:<br/>';
    echo '</div>';
    global $tareasxdias;
    $tareasxdias = array();
    function listarTarea($fecha, $id_trab)
    {


    }
    function listTask($mes, $year, $id_trab)
    {
        global $tareasxdias;
        global $d;
        $ltask = "";
        $pfecha = date("Y-m-d",mktime(0, 0, 0, $mes, $d, $year));
        $results = listarTarea($pfecha, $id_trab);
		echo "<td align='left' valign='top'>";
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
            echo CHtml::link("&nbsp;" . $hora . "&nbsp;&nbsp;" . $nombre . "&nbsp;&nbsp;(" . $cumplimiento1 . ")",array('tarea/update','id'=>$id, 'temp'=>1),
                array(
                    'submit'=>'tarea/update'
                ));
            echo CHtml::ajaxLink("<i class='glyphicon glyphicon-trash'></i>",Yii::app()->createUrl('tarea/delete'),
                array(
                    'type'=>'GET',
                    'data'=>array('id'=>$id),
                    "success"=>"function(link,success,data){
                         if(success){
                            window.location.reload();
                        }}",
                ),
                array(
                    'confirm'=>'Seguro que desea eliminar esa tarea?'
                )
            );
            echo "<br/>";
		}
        $tareasxdias[$d] = $ltask;
		$d+=1;
		echo"</td>";

    }
    function listTask1($mes, $year, $id_trab, $t)
    {
        global $tareasxdias;
        global $d;
        $ltask = "";
        $pfecha = date("Y-m-d",mktime(0, 0, 0, $mes, $d, $year));
        $results = listarTarea($pfecha,$id_trab);
        if($t==0)
            echo "<td align='left' valign='top'>";
        else
            echo "<td align='left' valign='top' rowspan = '3'>";
        if($results!=null) {
            foreach ($results as $tarea) {
                $nombre = $tarea['nombre'];
                $hora = $tarea['horas'];
                $id = $tarea['id'];
                $cumplimiento = $tarea['cumplimiento'];
                $tipo = $tarea['tipo'];
                if ($cumplimiento == 0)
                    $cumplimiento1 = "No Cumplida";
                else
                    $cumplimiento1 = "Cumplida";
                $ltask=$ltask."&nbsp;" . $hora . "&nbsp;&nbsp;" . $nombre."<br/>";
                echo CHtml::link("&nbsp;" . $hora . "&nbsp;&nbsp;" . $nombre . "&nbsp;&nbsp;(" . $cumplimiento1 . ")",array('tarea/update','id'=>$id, 'temp'=>1),
                    array(
                        'submit'=>'tarea/update',
                    ));
                if($tipo=="Individual") {
                    echo CHtml::ajaxLink("<i class='glyphicon glyphicon-trash'></i>", Yii::app()->createUrl('tarea/delete'),
                        array(
                            'type' => 'GET',
                            'data' => array('id' => $id),
                            "success" => "function(link,success,data){
                         if(success){
                            window.location.reload();
                        }}",
                        ),
                        array(
                            'confirm' => 'Seguro que desea eliminar esa tarea?'
                        )
                    );
                }
                echo "<br/>";
            }
        }
        $tareasxdias[$d] = $ltask;
        $d+=1;
        echo"</td>";
    }
    function print_Cell_Header($day1, $dia, $mes, $year,$days,$num){
        echo "<tr>";
        if($day1=="Domingo")
            $position=7;
        else
            $position = array_search($day1,$days);
        foreach ($days as &$valor)
        {
            if(array_search($valor,$days)<$position||(($dia > $num)&&($dia <0)))
            {

                echo "<td align='center' bgcolor='#99CCFF'>&nbsp;</td>";
            }
            else
            {
                $fecha_dia = date("Y-m-d",mktime(0, 0, 0, $mes, $dia, $year));
                echo "<th align='center' width='16%' bgcolor='#99CCFF'><table width='100%'>
                        <tr>
                            <td>".$valor."&nbsp;".$dia."</td>
                            <td align='right'>
                                <a href='index.php?r=Tarea/Create&fecha=".$fecha_dia."'><i class='fa fa-plus-square'></i></a>
                            </td>
                        </tr></table></td>";
                if(($dia < $num)&&($dia >0))
                    $dia+=1;
                else
                    $dia = 0;
            }
        }
        unset($valor);
        echo "</tr>";
        return $dia;
    }
    function print_Cell_Header1($dia, $mes, $year,$days,$num)
     {
         echo "<tr>";
         foreach ($days as &$valor)
         {
             if(($dia <= $num)&&($dia >0))
             {
                 $fecha_dia = date("Y-m-d",mktime(0, 0, 0, $mes, $dia, $year));
                 echo "<td align='center' width='16%' bgcolor='#99CCFF'><table width='100%'><tr><th>".$valor."&nbsp;".$dia."</th><td align='right'><a href='index.php?r=Tarea/Create&fecha=".$fecha_dia."'><i class='fa fa-plus-square'></i></a></td></tr></table></td>";
             }
             else
             {
                 echo "<td align='center' bgcolor='#99CCFF'>&nbsp;</td>";
             }
             if(($dia < $num)&&($dia >0))
                 $dia+=1;
             else
                 $dia = 0;
         }
         echo "</tr>";
         return $dia;
     }
    function print_Cell_Content($day1, $dia, $mes, $year,$days,$d,$id_trab,$param){
        echo "<tr>";
        if($param)
        {
            global $d;
            $d = 1;
        }
        $position = array_search($day1,$days);
        foreach ($days as &$valor)
        {
            if(array_search($valor,$days)<$position)
            {
                if($valor=="Sabado")
                {
                    echo "<td align='center'>no hay</td>";
                    echo "</tr>";
                    $fecha_dia = date("Y-m-d",mktime(0, 0, 0, $mes, $dia, $year));
                    echo "<tr height='20px'>
                            <td bgcolor='#99CCFF'>
                                <table width='100%'>
                                    <tr>
                                        <th>Domingo ".$dia."</th>
                                        <td align='right'><a href='AdicionarTarea.php?fecha=".$fecha_dia."' target='_blank'><i class='fa fa-plus-square'></i></a></td>
                                    </tr>
                                </table>
                            </td>
                          </tr>";
                    echo "<tr>";
                    listTask($mes, $year, $id_trab);
                    echo "</tr>";
                    $dia+=1;
                }
                else
                    echo "<td align='center'rowspan='3'></td>";
            }
            else
            {
                if($valor=="Sabado")
                {
                    listTask1($mes, $year, $id_trab,0);
                    echo "</tr>";
                    $fecha_dia = date("Y-m-d",mktime(0, 0, 0, $mes, $dia, $year));
                    echo "<tr height='20px'>
                            <td bgcolor='#99CCFF'>
                                <table width='100%'>
                                    <tr>
                                        <th>Domingo ".$dia."</th>
                                        <td align='right'>
                                            <a href='AdicionarTarea.php?fecha=".$fecha_dia."' target='_blank'>
                                                <i class='fa fa-plus-square'></i>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>";
                    echo "<tr>";
                    listTask($mes, $year, $id_trab);
                    echo "</tr>";

                    $dia+=1;
                }
                else
                {
                    listTask1($mes, $year, $id_trab,1);
                }
            }
        }
        return $dia;
    }
    function print_Cell_Content1($final1, $dia, $mes, $year,$days,$d,$id_trab){
        global $d;
        if($final1=="Domingo")
        {
            foreach ($days as &$valor)
            {
                if($valor=="Sabado")
                {
                    listTask1($mes, $year, $id_trab,0);
                    echo "</tr>";
                    $fecha_dia = date("Y-m-d",mktime(0, 0, 0, $mes, $dia, $year));
                    echo "<tr height='20px'><td bgcolor='#99CCFF'><table width='100%'><tr><th>Domingo ".$dia."</th><td align='right'><a href='AdicionarTarea.php?fecha=".$fecha_dia."' target='_blank'><i class='fa fa-plus-square'></i></a></td></tr></table></td></tr>";
                    echo "<tr>";
                    listTask($mes, $year, $id_trab);
                    echo "</tr>";
                }
                else
                    listTask1($mes, $year, $id_trab,1);
            }
        }
        else
        {
            $position = array_search($final1,$days);
            foreach ($days as &$valor)
            {
                if(array_search($valor,$days)>$position)
                    echo "<td align='center'>&nbsp;</td>";
                else
                    listTask1($mes, $year, $id_trab,0);
            }
            unset($valor);
        }
        return $dia;
    }

    $num = cal_days_in_month(CAL_GREGORIAN, $mes, $year);
    $day1=$dayEsp[array_search(date("l", mktime(0, 0, 0, $mes, 1, $year)),$dayEng)];
    $final1 = $dayEsp[array_search(date("l", mktime(0, 0, 0, $mes, $num, $year)),$dayEng)];
    $dia = 1;
    $d = 1;
    $days = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado',);
    echo '<input type="hidden" name="num" id="num" value="'.$num.'">';
    echo '<input type="hidden" name="day1" id="day1" value="'.$day1.'">';
    echo '<input type="hidden" name="final1" id="final1" value="'.$final1.'">';
     echo '<input type="hidden" name="mes1" id="mes1" value="'.$mes.'">';
     echo '<input type="hidden" name="year1" id="year1" value="'.$year.'">';


    echo '<div class="table-responsive">';
    echo '<table class="table table-bordered" width="100%">';

    //-----Begin First Week----------------------------
    $dia = print_Cell_Header($day1, $dia, $mes, $year,$days,$num);
    $dia = print_Cell_Content($day1, $dia, $mes, $year,$days,$d,$id_trab,true);
    //-----End First Week------------------------------

    //-----Begin Other Week----------------------------
    for ($i=0; $i < 5; $i++)
    {
        if($dia>$num)
            break;
        $dia = print_Cell_Header1($dia, $mes, $year,$days,$num);
        echo "<tr>";
        if($dia == 0)
        {
            $dia = print_Cell_Content1($final1, $dia, $mes, $year,$days,$d,$id_trab);
            break;
        }
        else
        {
            $dia = print_Cell_Content("Lunes", $dia, $mes, $year,$days,$d,$id_trab,false);
            if($d>$num)
                break;
        }
    }
    echo "</table>";

    echo "</div>";
    $_SESSION['tareaxdia'] = $tareasxdias;
    ?>
    </div>
    </div>
    </div>
    </div>

     <div id="test">
     </div>
     <div id="editor">
     </div>
     <script src="js/jspdf/jspdf.js"></script>
    <script src="plugins/jquery/jquery-2.1.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            var specialElementHandlers = {
                '#editor':function(element,renderer){
                    return true;
                }
            };
            var headerpdf = $('#headerpdf').html();
            $("#btn_pdf").click( function() {
                var num = $("#num").val();
                var day1 = $("#day1").val();
                var final1 = $("#final1").val();
                var fullname =$("#fullname").val();
                var mes1 = $("#mes1").val();
                var year1 =$("#year1").val();
                window.open("index.php?r=site/pdf1&header="+headerpdf+"&num="+num+"&fullname="+fullname+"&day1="+day1+"&final1="+final1+"&mes1="+mes1+"&year1="+year1+"",'_blank');
            });


            $('#sandbox-container input').datepicker({
                format:"mm-yyyy",
                viewMode:"months",
                minViewMode:"months"
            });
            $("#id_trab").change(function() {
                $( "#fullname" ).val( $("#id_trab option:selected").html() );
            });
            $("a.eliminar_dato").click( function() {
                if(!confirm('Estas seguro que deseas eliminar esta tarea?'))
                    return false;
                else
                {
                    location.href = url;
                    return true;
                }
            });
        });
    </script>

	<?php endif?>