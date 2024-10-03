<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
?>
<div class="container-fluid" style="margin-top: 60px;">

	<div id="page-login" class="row" style="margin-top: -61px;min-height:fit-content;">
		<div class="col-xs-12" style="height: 100%;border-color:unset">
                <div class="login-panel panel panel-primary" style="width: 103%; margin-left: -20px;border-color: unset;">
					<div class="panel-heading col-xs-12" align="left" height="50px" style="background-image: url(img/banner.jpg);;height: 140px;background-size: cover;">
                        <span><img src="img/fondo3.png" height="100%"></span>
                    </div>                    
					<div class="panel-body">
						<div>&nbsp;</div>
						<div><b><i class="fa fa-home"></i> <a href="<?=Yii::app()->createUrl('site/index');?>">Inicio</a> / Reporte: Listado de Aplicaciones Empresariales</b></div>	
						<div>&nbsp;</div>	
						<div class=<?php echo "col-xs-".$colSize?>>
							<div class="box-header">
								<div class="box-name" style="background-color:#c5ddf1;">
									<i class="fa fa-sitemap"></i>
									<span><?= $reportName ?></span>
								</div>
							</div>
							<div class="box-content no-padding table-responsive">
								<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-2">
									<thead>
										<tr>
											<th width="5%"><label><b>No.</b></label></th>
										<?php
											$cont = 0;

											foreach ($headers as &$h) {
												echo '
													<th width="'.$headerSize[$cont].'%"><label><b>'.$h.'</b></label></th>
												';
												
												$cont++;
												
											}
											if($id_rep==1){
													echo '
														<th width="15"><label><b>Tecnologías</b></label></th>
														<th width="15"><label><b>Gestores BD</b></label></th>
														<th width="15"><label><b>Contactos</b></label></th>
													';
												}
										?>	
										</tr>
									</thead>									
									<tbody>
									<?php
									$cont = 1;
									foreach ($results as &$res) {
										echo '
										<tr>
											<td>'.$cont.'</td>';
											foreach ($headers as &$h) {
												echo '<td>'.$res[$h].'</td>';
											}
											if($id_rep==1){
													echo '
														<td><label>'.$dataPoint1[$cont - 1].'</label></td>
														<td><label>'.$dataPoint[$cont - 1].'</label></td>
														<td><label>'.$dataPoint2[$cont - 1].'</label></td>
													';
												}
										echo '</tr>';
										$cont+=1;
									}
									?>										
									</tbody>
									<tfoot>
										<tr>
											<th>No.</th>
											<?php
												$cont = 0;
												foreach ($headers as &$h) {
													echo '
														<th>'.$h.'</th>
													';
													$cont++;
												}
												if($id_rep==1){
													echo '
														<th>Tecnologías</th>
														<th>Gestores BD</th>
														<th>Contactos</th>
													';
												}
											?>	
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
						<?php if ($id>1) {
							echo '
							<div class="col-xs-6">
								<div id="chartContainer" style="height: 300px; width: 100%;"></div>
							</div>
							';
						} ?>
					</div><!-- form -->
				</div>
            </div>
        </div>
    </div>
    <script src="js/jquery-1.10.2.js"></script>
<script type="text/javascript">	
window.onload = function() {

var reportName = <?php echo json_encode($graphName); ?>;
var data = <?php echo json_encode($dataPoint); ?>;

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: reportName
	},
	data: [{
		type: "pie",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - {y}",
		dataPoints: data
	}]
});
chart.render();

}


function AllTables(){
	TestTable1();
	TestTable2();
	TestTable3();
	LoadSelect2Script(MakeSelect2);
}
function MakeSelect2(){
	//$('select').select2();
	$('.dataTables_filter').each(function(){
		$(this).find('label input[type=text]').attr('placeholder', 'Search');
	});
}
$(document).ready(function(){
	LoadDataTablesScripts(AllTables);
	WinMove();
  $("#LoginForm_password").on('paste', function(e){
    e.preventDefault();
    //alert('Esta acción está prohibida');
  })
  
  $("#LoginForm_password").on('copy', function(e){
    e.preventDefault();
    //alert('Esta acción está prohibida');
  })
})
</script>