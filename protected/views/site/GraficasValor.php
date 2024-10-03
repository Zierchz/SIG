<style type="text/css"    media="print" >
@media print{

    h1 > * {
  display: none;
}
    header > * {
  display: none;
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

<?php
if($choice==""){
header('Location: http://localhost/cmi/index.php?r=site/Graficas');
}

$choice_value="";
$choice_name="";
$choice_model="";
$choice_date=array("Gráfica por años", "Gráfica por meses");
$choice_graph=array("Gráfica de Pastel","Gráfica de Curva","Gráfica de Barra");
$nombre="";
$objeto_value=array();
$valor=0;
$objeto_infoValor_ant="";
$valor_ant=0;
if ($choice==1) {
    $nombre="Criterios de Medida";
    $choice_model="CmiCriteriomedida";
    $choice_modelValor="CmiCriteriomedidavalor";
    $choice_name="crit_descripcion";
    $choice_nameValor="id_criterio";
    $choice_mes="crit_mes";
    $choice_anno="crit_anno";
    $choice_real="crit_real";
} elseif ($choice==2) {
    $nombre="Indicadores";
    $choice_model="CmiIndicadores";
    $choice_modelValor="CmiIndicadoresvalor";
    $choice_name="descripcion_id";
    $choice_nameValor="id_indicador";
    $choice_mes="mes_id";
    $choice_anno="anno_ind";
    $choice_real="real_id";
} elseif ($choice==3) {
    $nombre="Indicadores del Proceso";
    $choice_model="CmiIndicadoresProceso";
    $choice_modelValor="CmiIndicadoresProcesovalor";
    $choice_name="descripcion";
    $choice_nameValor="id_indicadorproceso";
    $choice_mes="ind_mes";
    $choice_anno="ind_anno";
    $choice_real="valor_real";
} else {
    $nombre="Indicadores Operativos";
    $choice_model="CmiIndicadoresOp";
    $choice_modelValor="CmiIndicadoresOpvalor";
    $choice_name="descripcion";
    $choice_nameValor="id_indicadorop";
    $choice_mes="op_mes";
    $choice_anno="op_anno";
    $choice_real="valor_real";
}
if (Yii::app()->user->roleid!=3) {
    if ($choice==1) {
        $choice_value=$choice_model::model()->findAllByAttributes(array('id_entidad'=>Yii::app()->user->id_uo));
    }if($choice==2) {
        $temp=CmiCriteriomedida::model()->findAllByAttributes(array('id_entidad'=>Yii::app()->user->id_uo));
        for ($i=0; $i < count($temp); $i++) { 
            $choice_value=$choice_model::model()->findAllByAttributes(array('id_criteriomedida'=>($temp[$i]->id)));
        }
    }
}else {
    $choice_value=$choice_model::model()->findAll();
}


?>
<?=$this->p2_PageTitle("file-bar-graph","Gráficas del sistema", $nombre, "Gráficas","titulo");?>

<?php
$info = ""; // Variable inicial para el parametro 
$fecha = ""; // Variable inicial para el año/mes
$grafica = $choice_graph[2]; //Variable inicial para el tipo de grafica
$objeto_infoValor="";
$objeto_infoValorSort="";

// Verificar si se ha enviado una selección para el parametro y el año/mes
if (isset($_POST['parametroSeleccionado'])) {
    $parametroSeleccionado = $_POST['parametroSeleccionado'];

    // Actualizar el valor de la variable $a con el mes seleccionado
    if (isset($parametroSeleccionado)) {
        $info = $parametroSeleccionado;
    }
}

if (isset($_POST['anio_mesSeleccionado'])) {
    $anio_mesSeleccionado = $_POST['anio_mesSeleccionado'];

    // Actualizar el valor de la variable $b con el año seleccionado
    if (isset($anio_mesSeleccionado)) {
        $fecha = $anio_mesSeleccionado;
    }
}

if (isset($_POST['graph_seleccionada'])) {
    $graph_seleccionada = $_POST['graph_seleccionada'];

    // Actualizar el valor de la variable $b con el año seleccionado
    if (isset($graph_seleccionada)) {
        $grafica = $graph_seleccionada;
    }
}
?>

<div>

<h3><p align="center"   style="margin-top: 30px;"> <b>     <?=$info ?> </b></h3></p>

<!-- <p id="ppp" align="center"> -->
</div>

<!-- Formulario con los botones desplegables -->
<form method="post">
    <select name="parametroSeleccionado" id="parameters">
        <?php if(!is_array($choice_value))
        $choice_value = array();
        foreach ($choice_value as $value): ?>
            <option value="<?php echo $value->$choice_name; ?>"><?php echo $value->$choice_name?></option>
        <?php endforeach; ?>
    </select>

    <select name="anio_mesSeleccionado" id="anio_mes">
    <?php foreach ($choice_date as $date): ?>
            <option value="<?php echo $date; ?>"><?php echo $date?></option>
            <?php endforeach; ?>
    </select>

    <select name="graph_seleccionada" id="graph">
    <?php foreach ($choice_graph as $graph): ?>
            <option value="<?php echo $graph; ?>"><?php echo $graph?></option>
            <?php endforeach; ?>
    </select>

    <button type="submit" name="submit" id="aceptar" class="btn btn-primary"style="background-color: #00309E; font-size: 18px;">Aceptar</button></form>

    <?php
    $objeto_info=$choice_model::model()->findByAttributes(array($choice_name=>$info));
if($objeto_info!=null){
    for ($i=1; $i<13 ; $i++) { 
       $objeto_infoValor=$choice_modelValor::model()->findAllByAttributes(array($choice_nameValor=>$objeto_info->id,$choice_mes=>$i,$choice_anno=>date('Y')));
       if ($objeto_infoValor==null) {
        $objeto_value[$i-1]=0;
       }
       if ($objeto_infoValor!=null) {
        foreach ($objeto_infoValor as $objeto) {
            $valor+=$objeto->$choice_real;
            $objeto_value[$i-1]=$objeto->$choice_real;
        }  
       }
    }
    $objeto_infoValor_ant=$choice_modelValor::model()->findAllByAttributes(array($choice_nameValor=>$objeto_info->id,$choice_anno=>date('Y')-1));
    if ($objeto_infoValor_ant!=null) {
        foreach ($objeto_infoValor_ant as $objeto) {
            $valor_ant+=$objeto->$choice_real;
        }
       }
}
 
$maja=array();  
$maja[0]=$valor_ant;
$maja[1]=$valor;
    $c=array();
    $labels="";
    $b="";
    if ($grafica=="Gráfica de Pastel") {
        $b="pie";
    }
    if ($grafica=="Gráfica de Curva") {
        $b="line";
    }
    if ($grafica=="Gráfica de Barra") {
        $b="bar";
    }
    if ($fecha=="Gráfica por meses") {
        $labels = array("Enero","Febrero", "Marzo","Abril","Mayo","Junio","Julio", "Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
        $c=$objeto_value;
    }if ($fecha=="Gráfica por años"){
        $labels=array(date('Y')-1,date('Y'));
        $c=$maja;
    }

?>

<br>
<div class="row">
        <div  class="col-lg-12" >
             <canvas id="miGrafico"></canvas>
        </div><br>
</div>


<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/node_modules/chart.js/dist/chart.umd.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        console.log('dffds');

        const graph = $('#miGrafico');//document.querySelector("#grafica");

        const data = {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: "Valor",
                data: <?php echo json_encode($c); ?>,
                backgroundColor: ["rgba(78, 115, 223, 0.7)","rgba(10, 800, 323, 2.0)",],
                borderColor: "rgba(78, 115, 223, 0.7)",
                pointBackgroundColor: "rgba(78, 115, 223, 0.7)",
                pointBorderColor: "rgba(78, 115, 223, 0.7)",
                pointHoverBackgroundColor: "rgba(78, 115, 223, 0.7)",
                pointHoverBorderColor: "rgba(78, 115, 223, 0.7)",
            }],
        };

        const option = {
            maintainAspectRatio: <?php echo ($b === 'pie') ? 'false' : 'true'; ?>,
            plugins: {
                legend: {
                    display: false,
                    position: 'bottom'
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            beginAtZero: true
                        }
                    }
                },
                datalabels: {
                    anchor: 'center',
                    align: 'center',
                    color: 'black',
                    font: {
                        weight: 'bold',
                        size: 20 // Ajusta el tamaño de la fuente a tu preferencia
                    },
                }
            }
        };

        const config = { 
            type: <?php echo json_encode($b); ?>,
            data: data,
            options: option,
            plugins: [ChartDataLabels]
        };

        new Chart(graph, config);
    });
</script>






  


  <a  href="#" id="exportarPDF" class="btn btn-primary " style="border-radius:10px;margin-top: 10px;margin-left: 660px;"> <h2>Exportar<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span><span class="glyphicon glyphicon-file" aria-hidden="true"></span></h2></a>
<br>.


						







<script type="text/javascript">        
$('#exportarPDF').click(function (){
	window.print();
window.close();
})




</script>
