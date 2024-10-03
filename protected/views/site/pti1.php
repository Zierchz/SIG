<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
 if(!Yii::app()->user->isGuest):
     $ms = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
     $mes = date('m');
     $year = date('Y');
     $this->myBreadCrumb("Reportes","Plan de Trabajo Individual");
     $this->myHeader("Reportes: Plan de Trabajo Individual");
?>
<div class="col-lg-12">
    <?php
    $url = "img/etecsa2.png";
    echo '<div class="row">';
    echo '<div class="col-lg-12">';
    echo '<div class="panel panel-primary">';
    echo '<div align="right" class="panel-heading">
         <form role="form" action="'.CController::createUrl('/Site/ReportInd').'" method="post">';
        if(Yii::app()->user->usergroup != 1)
        {
            echo '<div class="col-lg-3">
                    <div class="form-group">
                            <select class="form-control" name="id_trab" id="id_trab">
                                <option value = "NULL"> Seleccione el trabajador </option>';
                                foreach($results as $trabajador)
                                {
                                    $full_name1 = $trabajador['fullname'];
                                   // $full_name1 = $trabajador['especialidad']." ".$full_name;
                                    $id = $trabajador['id'];
                                    echo "<option value = '$id'>".$full_name1."</option>";
                                }
            echo '</select></div></div>';
			echo "<input name='id_trab1' id='id_trab1' type='hidden' value='".Yii::app()->user->id."'>";
			echo '<input id="fullname" name="fullname" type ="hidden" value="'.$fullname1.'">';
			echo '<div class="col-lg-1">
            <div class="form-group" align="left">
                <button type="submit" class="btn btn-primary" name="btn_buscar" id="btn_buscar"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
    </form>';
        }
        
        //echo var_dump(json_encode($data));
    ?>
        

    <span align="right"><button type="button" class="btn btn-primary" name='btn_reload' id='btn_reload' style="margin: 0px 0px 0px;" onClick="document.location.reload();"><i class="glyphicon glyphicon-repeat"></i></button> |&nbsp;
    <button type="button" class="btn btn-primary" name='btn_pdf' id='btn_pdf' style="margin: 0px 0px 0px;"><i class="glyphicon glyphicon-save"></i> PDF</button></div>
    <?php
    //echo '<a id="pdf" style="color: white" href=""><i class="fa fa-save"></i> PDF</span></a></div>';
    echo '<div class="panel-body"  id="cuerpo">';
    echo '<div id="headerpdf">';
    echo '<p align="right"><img src='.$url.' height="50px" width="200px" /><br/>';
    echo '<b>Vicepresidencia de Tecnologías de la Información</b></p>';
    echo '<p><b>Aprobado:<br/>';
    echo '<label>Nombre: '.$boss_name.'<br/>';
    echo ''.$boss_charge.' '.$area_nombre.'</label></b></p>';
    echo "<p align='center'><b>PLAN DE TRABAJO INDIVIDUAL DEL ESPECIALISTA: <u>".$fullname1."</u> PARA EL MES DE <u>".$ms[$mes-1]."</u> DE <u>$year</u></b></p>";
    echo '<p><b>  TAREAS PRINCIPALES:<br/>';
    echo '<p><b>  TAREAS GENERALES:<br/>';
    echo '</div>';
    ?>
    <div id='calendar'></div>
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
                var str = $("span.fc-header-title").text();
                var res = str.split(" ");
                var meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
                var days = ['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'];
                var mes1 =meses.indexOf(res[0])+1;
                var year1 = res[1];
                var isLeap = ((year1%4)==0 && ((year1%100)!=0 || (year1%400)==0));
                var arr = [31, (isLeap ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
                var num = arr[mes1-1];
                var day1 = days[(new Date(year1+"-"+mes1+"-01").getDay()) - 1];
                var final1 = days[(new Date(year1+"-"+mes1+"-"+num).getDay()) - 1];
                var fullname =$("#fullname").val();
                window.open("index.php?r=site/pdf1&header="+headerpdf+"&num="+num+"&fullname="+fullname+"&day1="+day1+"&final1="+final1+"&mes1="+mes1+"&year1="+year1+"",'_blank');
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
            var date = new Date();
  var d = date.getDate();
  var m = date.getMonth();
  var y = date.getFullYear();
  var id_trab = $('#id_trab1').val();
  var eventos = <?php print json_encode($data); ?>;
  //var arr = new Array();
  //arr= JSON.parse(eventos);
  var calendar = $('#calendar').fullCalendar({
   editable: true,
   lang: 'es',
   header: {
    left: 'prev,next today',
    center: 'title',
    //right: 'month,agendaWeek,agendaDay'
   },
   events: eventos,
   eventRender: function(event, element, view) {
    if (event.allDay === 'true') {
     event.allDay = true;
    } else {
     event.allDay = false;
    }
   },
   selectable: true,
   selectHelper: true,
   select: function(start, end, allDay) {
   var start = moment(start).format("YYYY-MM-DD");
   window.location.href ='index.php?r=Tarea/Create&start='+ start + '&source=1';
   calendar.fullCalendar('unselect');
   },

   editable: false,
   eventClick: function(event) {
   var id = event.id;
   window.location.href ='index.php?r=Tarea/Update&id='+ id+ '&source=1';
	/*var decision = confirm("Do you really want to do that?");
	if (decision) {
	$.ajax({
		type: "POST",
		url: "delete_event.php",
		data: "&id=" + event.id,
		 success: function(json) {
			 $('#calendar').fullCalendar('removeEvents', event.id);
			  alert("Updated Successfully");}
	});
	}*/
  	},
   eventResize: function(event) {
	   var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
	   var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
	   $.ajax({
	    url: 'update_events.php',
	    data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
	    type: "POST",
	    success: function(json) {
	     alert("Updated Successfully");
	    }
	   });
	},
	eventRender: function(event, element) {
                if(event.cumplimiento == 0) {
                    element.css('background-color', 'red');
                }
                if(event.cumplimiento == 1) {
                    element.css('background-color', 'green');
                }
            },

  });
        });
    </script>
	<?php endif?>