<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;

 if(!Yii::app()->user->isGuest):

     $fullname = "";
     $ms = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
     if(isset($_GET['mesano'])) {
         $fecha = $_GET['mesano'];
         $array_date = split('-',$fecha);
         $mes = $array_date[1];
         $year = $array_date[0];
     }
     else
     {
         $mes = date('m');
         $year = date('Y');
     }
     $id_trab = $_SESSION['id_trab'];
     if(isset($_POST['btn_buscar']))
     {
         $id_trab = $_POST['id_trab'];
         $date = $_POST['mes'];
         $array_date = split('-',$date);
         $mes = $array_date[0];
         $year = $array_date[1];
         $fullname = $_POST['fullname'];
     }
     $this->myBreadCrumb("Reporte","Informe de Cumplimiento Individual");
?>
<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Reportes: Informe de Cumplimiento Individual</h1>
        </div>
    </div>
    <?php
    $url = "img/etecsa2.png";
    echo '<div class="row">';
    echo '<div class="col-lg-12">';
    echo '<div class="panel panel-primary">';
    echo '<div align="right" class="panel-heading">
         <form role="form" action="" method="post">';
        if($_SESSION['grupo'] != 1)
        {
            echo '<div class="col-lg-3">
                    <div class="form-group">
                            <select class="form-control" name="id_trab" id="id_trab">
                                <option value = "NULL"> Seleccione el trabajador </option>';
                                $vacia = true;
                                $results = Trabajador::model()->findAll();
                                foreach($results as $trabajador)
                                {
                                    $full_name = $trabajador['primer_nombre']." ".$trabajador['primer_apellido']." ".$trabajador['segundo_apellido'];
                                    $ci = $trabajador['ci'];
                                    $id = $trabajador['id'];
                                    echo "<option value = '$id'>".$full_name."</option>";
                                }
            echo '</select></div></div>';
            echo "<input id='fullname' name='fullname' type ='hidden' value=\"".$fullname."\">";
        }
        else /*ok*/
        {
            $id = $_SESSION['id_trab'];
            $fullname = $_SESSION['full_name'];
            echo "<input name='id_trab' id='id_trab' type='hidden' value=\"".$id."\">";
            echo "<input id='fullname' name='fullname' type ='hidden' value=''>";
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
    <span align="right">
        <a style="color: white" href="JavaScript:;" onClick="document.location.reload();">
            <i class="fa fa-repeat"></i>
        </a> |&nbsp;
        <a style="color: white" href="JavaScript:;" onclick="javascript:Determinar_Impresion_Plan_Trabajo(1), reporte_trabajo_individual.submit()">
            <i class="fa fa-save"></i> PDF
        </a>
    </span>
    </div>
    <?php
     echo "<input type='hidden' id='m' name='m' value='".$mes."'>";
     echo "<input type='hidden' id='y' name='y' value='".$year."'>";
     echo '<div class="panel-body">';
     echo '<p align="right"><img src='.$url.' height="50px" width="200px" /><br/>';
     echo '<b>Direcci&oacute;n Operaciones de Seguridad</b></p>';
     echo '<p align="center"><b>RESUMEN DE CUMPLIMIENTO DEL MES '.$ms[$mes-1].' DE '.$year.'<br/></b></p>';
     echo '<p><b>RESUMEN CUANTITATIVO<br/></b></p>';
     $resultsTotal = Tarea::model()->stats($mes,$year,$_SESSION['id_trab']);
     $incumplidas = array();
     $modificadas = array();
     $extra_plan = array();
     foreach($resultsTotal as $task) {
         if($task['cumplimiento']==0)
             $incumplidas[]=$task;
         if($task['modificada']==1)
             $modificadas[]=$task;
         if($task['extra']==1)
             $extra_plan[]=$task;
     }

    echo '<div class="table-responsive" id="tarea-grid">';
    echo '<table class="table table-bordered" width="100%">';
    echo "<tr bgcolor='#99CCFF'>";
    echo "<th colspan='3' valign='top'><center>TAREAS INCUMPLIDAS, MODIFICADAS Y EXTRA PLANES</center></th>";
    echo "</tr>";
    echo "<tr bgcolor='#99CCFF'>";
    echo "<th width='25%' valign='top'><center>INCUMPLIDAS</center></th>";
    echo "<th width='75%' valign='top' colspan='2'><center>CAUSAS</center></th>";
    echo "</tr>";
     if(count($incumplidas)==0)
     {
         echo "<tr><td width='45%' valign='top'>&nbsp;</td><td width='50%' valign='top'>&nbsp;</td><td width='5%' valign='top'>&nbsp;</td></tr>";
     }
     else
     {
         $contad = 1;
         foreach($incumplidas as $incump)
         {
            $id_task = $incump['id'];
            $nombre = $incump['nombre'];
            $date_task = $incump['fecha'];
            $comentario = $incump['comentario'];
             echo "<tr>";
             echo "<td width='45%' valign='top'><a href='ModificarActividad.php?id=".$id_task."&plus=1' target='_blank'>&nbsp;&nbsp;".$contad."- ".$nombre."--".$date_task."</a></td>";
             echo "<td width='50%' valign='top'>  ".$comentario."</td>";
             echo "<td class='clase_listar' align='center'>";
             echo CHtml::ajaxLink('<i class="fa fa-edit" title="Modificar"></i>',array('/TareaIndividual/cumplir'),array(
                         "type"=>"GET",
                         "data"=>array('id'=>$id_task),
                         "success"=>"function(link,success,data){
                         if(success){
                            window.location.reload();
                         }
                 }",
                     ),
                     array('confirm'=>'Se cambiara el estado de la tarea a cumplida. Esta seguro de realizar esta operacion?')
                 );
             echo "<input class='checkBoxClass' type='checkbox' name='chk[]' value=".$id_task."></td>";
             echo "</tr>";
             $contad++;
         }
     }

     echo "<tr>";
     echo "<td width='45%' valign='top' colspan='3' align='right'><button type='submit' class='btn btn-default' name='btn_cump' id='btn_cump'>Dar cumplimiento a las tareas seleccionadas</button></td>";
     echo "</tr>";
    echo "<tr bgcolor='#99CCFF' align='center'>";
    echo "<td width='25%' valign='top'><strong>MODIFICADAS</strong></td>";
    echo "<td width='75%' valign='top' colspan='2'><strong>QUIEN LAS MODIFICO</strong></td>";
    echo "</tr>";
    if(count($modificadas)==0)
    {
        echo "<tr><td width='25%' valign='top'>&nbsp;</td><td width='75%' valign='top' colspan='2'>&nbsp;</td></tr>";
    }
    else
    {
        $contad = 1;
        foreach($modificadas as $modif)
        {
            $id_task = $modif['id'];
            $nombre = $modif['nombre'];
            $responsable = $modif['responsable'];
            echo "<tr>";
            echo "<td width='25%' valign='top'><a href='ModificarActividad.php?id=".$id_task."&plus=1' target='_blank'>&nbsp;&nbsp;".$contad."- ".$nombre."</a></td>";
            echo "<td width='75%' valign='top' colspan='2'>&nbsp;&nbsp;".$responsable."</td>";
            echo "</tr>";
            $contad++;
        }
    }
    echo "<tr bgcolor='#99CCFF' align='center'>";
    echo "<td width='25%' valign='top'><strong>EXTRA PLANES</strong></td>";
    echo "<td width='75%' valign='top' colspan='2'><strong>QUIEN LAS ORIGINO Y MOTIVO</strong></td>";
    echo "</tr>";
     if(count($extra_plan)==0)
    {
        echo "<tr><td width='25%' valign='top'>&nbsp;</td><td width='75%' valign='top' colspan='2'>&nbsp;</td></tr>";
    }
    else
    {
        $conta = 1;
        foreach($extra_plan as $extra)
        {
            $id_task = $extra['id'];
            $motivo = $extra['motivo'];
            $nombre = $extra['nombre'];
            $responsable = $extra['responsable'];
            $date_task = $extra['fecha'];

            echo "<tr>";
            echo "<td width='25%' valign='top'><a href='ModificarActividad.php?id=".$id_task."&plus=1' target='_blank'>&nbsp;&nbsp;".$conta."- ".$nombre." - ".$date_task."</a></td>";
            echo "<td width='75%' valign='top' colspan='2'>&nbsp;&nbsp;".$responsable." - ".$motivo."</td>";
            echo "</tr>";
            $conta++;
        }
    }
    echo "</table>";
    echo "</div>";
    echo '<div class="form-group">
                        <label>BREVE RESUMEN CUALITATIVO:</label>';
     $inf = "";
     $val = "";
    $informeCump = InfCump::model()->findByAttributes(array('id_trab'=>$id_trab,'mes'=>$mes,'anno'=>$year));
     if($informeCump){
         $inf = $informeCump->inf_cualitativo;
         $val = $informeCump->valoracion;
     }
    echo '<textarea class="form-control" rows="5" name="texto" id="texto">'.$inf.'</textarea>';
    echo '</div>';
    echo "<div align='right'><button type='submit' class='btn btn-default' name='btn_cual' id='btn_cual'>Guardar Resumen Cualitativo</button></div>";
    echo '<div class="form-group">
                   <label>VALORACION PERSONAL DEL JEFE:</label>';
    if($_SESSION['grupo']>1){
        echo '<textarea class="form-control" rows="5" name="valoracion" id="valoracion">'.$val.'</textarea>';
        echo "<div align='right'><button type='submit' class='btn btn-default' name='btn_cump' id='btn_cump' onclick='javascript:setTarget(3);'>Guardar Valoraci&oacute;n</button></div>";
    }
    else
        echo '<textarea class="form-control" rows="5" name="valoracion" id="valoracion" disabled>'.$val.'</textarea>';
    echo '</div>';
    echo "<br/>";
     $especialidad = Trabajador::model()->findByPk($id_trab)->especialidad;
    echo "<p align='right'><b>Elaborado por: ".$especialidad." ".$fullname."</b></p>";
     echo "</div>";
    ?>
    </div>
    </div>
    </div>
    </div>
    </div>

    <script src="plugins/jquery/jquery-2.1.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var cualitativo = $("#texto").val();
            if(cualitativo=="")
                $("#btn_cual").attr('disabled',true);
            $("#texto").keypress(function(){
                var cualitativo = $("#texto").val();
                if(cualitativo=="")
                    $("#btn_cual").attr('disabled',true);
                else
                    $("#btn_cual").attr('disabled',false);
            });
            $("#btn_cual").click(function(){
                var model = new Array();
                model.push($("#m").val());
                model.push($("#y").val());
                model.push($("#texto").val());
                model.push($("#valoracion").val());

                $.ajax({
                    type:"POST",
                    url:"index.php?r=InfCump/insert",
                    data:{inf:model},
                    success:function(data){
                        //window.location.reload();
                        alert(data);
                    }
                });
                return false;
            });
            $("#btn_cump").click(function() {
                if (!confirm("Esta intentando modificar el estado de cumplimiento de esa tarea. ¿Seguro que desea realizar esta operacion?"))
                    return false;
                else
                {
                    var chk = new Array();
                    $("input:checked").each(function(){
                        chk.push($(this).val());
                    });
                    $.ajax({
                        type:"POST",
                        url:"index.php?r=TareaIndividual/cumplirAll",
                        data:{chk:chk},
                        success:function(data){
                            window.location.reload();
                        }
                    });
                    return false;
                }
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