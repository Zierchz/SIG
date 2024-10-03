<?php
/* @var $this SiteController */
/*$sql = "SELECT c.full_mes_esp, d.anno_p from mes c, mes_param d where c.id=d.mes_p";
$data1 = Yii::app()->db->createCommand($sql)->queryAll();
$mes_esp = "";
$anno ="";
foreach($data1 as $row1):
    $mes_esp = $row1['full_mes_esp'];
	$anno = $row1['anno_p'];
endforeach;*/
$this->pageTitle=Yii::app()->name;
?>
<div id="services" class="content-section">
    <div class="container" style="width: 100%">
        <div class="row">
            <div class="box" style="height: auto">
                <div class="box-icon">
                    <span class="service-icon first"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span></span>
                </div>
                <div class="service-item">
                    <p>&nbsp;</p>
                    <div class="about-head">
                        <h4 class="about-head-border-success"><span class="about-head-heading_border about-head-bg-success">Usuarios por Sistemas</span></h4>
                    </div>                   
                    <div class="panel panel-primary">
                        <div class="panel-heading" align="left">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <h4>Listados de usuarios por sistemas</h4>
                                        <input type="hidden" id="ident"/>
                                    </div>
                                </div>
                                <div class="col-lg-6" align="right">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary" name='btn_pdf1' id='btn_pdf1' style="margin: 0px 0px 0px;"><i class="glyphicon glyphicon-save"></i> PDF</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">TIE</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">SCIBIWEB</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">CGESTION</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="other-tab" data-toggle="tab" href="#other" role="tab" aria-controls="other" aria-selected="false">CIND</a>
								</li>
							</ul>
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade in active" id="home" role="tabpanel" aria-labelledby="home-tab">
									&nbsp;
									<div class="table-responsive">
										<table class="table table-striped table-bordered table-hover" id="dataTables-example">
											<thead>
												<tr>
													<th width="5%">#</th>
													<th width="25%">Usuario</th>
													<th width="25%">Nombre y Apellidos</th>
													<th width="25%">Cargo</th>
													<th width="20%">Unidad Organizativa</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>#</th>
													<th>Usuario</th>
													<th>Nombre y Apellidos</th>
													<th>Cargo</th>
													<th>Unidad Organizativa</th>
												</tr>
											</tfoot>
											<tbody>
											<?php
												$c=1;
												foreach($tie as $row):
													echo "<tr>";
														echo "<td class='hide_col' align='center'>".$c."</td>";
														echo "<td  class='hide_col' align='center'>".$row['username']."</td>";
														echo "<td  class='hide_col' align='center'>".$row['fullname']."</td>";
														echo "<td  class='hide_col' align='center'>".$row['cargo']."</td>";
														echo "<td  class='hide_col' align='center'>".$row['siglas']."</td>";
													echo "</tr>";
													$c+=1;
												endforeach;
											?>
											</tbody>
											
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
									&nbsp;
									<div class="table-responsive">
										<table class="table table-striped table-bordered table-hover" id="dataTables-example1">
											<thead>
												<tr>
													<th width="5%">#</th>
													<th width="25%">Usuario</th>
													<th width="25%">Nombre y Apellidos</th>
													<th width="25%">Cargo</th>
													<th width="20%">Unidad Organizativa</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>#</th>
													<th>Usuario</th>
													<th>Nombre y Apellidos</th>
													<th>Cargo</th>
													<th>Unidad Organizativa</th>
												</tr>
											</tfoot>
											<tbody>
											<?php
												$c=1;
												foreach($scibiweb as $row):
													echo "<tr>";
														echo "<td class='hide_col' align='center'>".$c."</td>";
														echo "<td  class='hide_col' align='center'>".$row['username']."</td>";
														echo "<td  class='hide_col' align='center'>".$row['fullname']."</td>";
														echo "<td  class='hide_col' align='center'>".$row['cargo']."</td>";
														echo "<td  class='hide_col' align='center'>".$row['siglas']."</td>";
													echo "</tr>";
													$c+=1;
												endforeach;
											?>
											</tbody>
											
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
								&nbsp;
									<div class="table-responsive">
										<table class="table table-striped table-bordered table-hover" id="dataTables-example2">
											<thead>
												<tr>
													<th width="5%">#</th>
													<th width="25%">Usuario</th>
													<th width="25%">Nombre y Apellidos</th>
													<th width="25%">Cargo</th>
													<th width="20%">Unidad Organizativa</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>#</th>
													<th>Usuario</th>
													<th>Nombre y Apellidos</th>
													<th>Cargo</th>
													<th>Unidad Organizativa</th>
												</tr>
											</tfoot>
											<tbody>
											<?php
												$c=1;
												foreach($cgestion as $row):
													echo "<tr>";
														echo "<td class='hide_col' align='center'>".$c."</td>";
														echo "<td  class='hide_col' align='center'>".$row['username']."</td>";
														echo "<td  class='hide_col' align='center'>".$row['fullname']."</td>";
														echo "<td  class='hide_col' align='center'>".$row['cargo']."</td>";
														echo "<td  class='hide_col' align='center'>".$row['siglas']."</td>";
													echo "</tr>";
													$c+=1;
												endforeach;
											?>
											</tbody>
											
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
								&nbsp;
									<div class="table-responsive">
										<table class="table table-striped table-bordered table-hover" id="dataTables-example3">
											<thead>
												<tr>
													<th width="5%">#</th>
													<th width="25%">Usuario</th>
													<th width="25%">Nombre y Apellidos</th>
													<th width="25%">Cargo</th>
													<th width="20%">Unidad Organizativa</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>#</th>
													<th>Usuario</th>
													<th>Nombre y Apellidos</th>
													<th>Cargo</th>
													<th>Unidad Organizativa</th>
												</tr>
											</tfoot>
											<tbody>
											<?php
												$c=1;
												foreach($cind as $row):
													echo "<tr>";
														echo "<td class='hide_col' align='center'>".$c."</td>";
														echo "<td  class='hide_col' align='center'>".$row['username']."</td>";
														echo "<td  class='hide_col' align='center'>".$row['fullname']."</td>";
														echo "<td  class='hide_col' align='center'>".$row['cargo']."</td>";
														echo "<td  class='hide_col' align='center'>".$row['siglas']."</td>";
													echo "</tr>";
													$c+=1;
												endforeach;
											?>
											</tbody>
											
										</table>
									</div>
								</div>
							</div>
                            
                                    <?php
                                    $c=1;
                                    /*foreach($data as $row):
                                        $id21 = $row['idmv'];
                                        $um=$row['um'];
                                        $orden=$row['orden'];
                                        $formato=$row['formato'];
                                        $comportamiento = $row['comportamiento'];
                                        $real = $row['valor_real'];
                                        //$real=round($real * 100) / 100;
                                        $plan = $row['valor_plan'];
                                        $plan=round($plan * 100) / 100;
                                        $acum = $row['valor_acum'];
                                        //$acum=round($acum * 100) / 100;
                                        if($um=="%")
                                        {
                                            $real = $real*100;
                                            $acum = $acum*100;
                                            //$plan = $plan*100;
                                        }
										$real1=$real;
										$plan1=$plan;
                                        $real=number_format($real,$formato);
                                        $plan=number_format($plan,$formato);
                                        $acum=number_format($acum,$formato);
										if($real<0)
											$real=0;
                                        echo "<tr>";
                                        echo "<td class='hide_col' align='center'>".$c."</td>";
                                        $nombre=$row['nombre'];
                                        if((substr($nombre, 0, strlen("Densidad")) === "Densidad") && Yii::app()->user->roleid==1)
                                            echo "<td class='show_col' data-original-title='".$row['descripcion']."' data-toggle='tooltip' data-container='body' data-placement='top' title=''><b><a href='#Nota' style='color:red;'>*</a></b> ".$nombre." (".$row['um'].")</td>";
										elseif(($nombre==="Servicio telefónico en asentamientos de población de 200 o más habitantes" || $nombre==="Porciento de municipios con densidad telefónica >=4%")&&Yii::app()->user->roleid==1)
											echo "<td class='show_col' data-original-title='".$row['descripcion']."' data-toggle='tooltip' data-container='body' data-placement='top' title=''><b><a href='#Nota' style='color:red;'>**</a></b> ".$nombre." (".$row['um'].")</td>";
                                        else
                                            echo "<td class='show_col' data-original-title='".$row['descripcion']."' data-toggle='tooltip' data-container='body' data-placement='top' title=''>".$nombre." (".$row['um'].")</td>";
                                        echo "<td  class='hide_col' align='center'>".$row['tipo']."</td>";
                                        echo "<td  class='hide_col' align='center'>".$acum."</td>";
                                        echo "<td  class='hide_col' align='center'>".$plan."</td>";
                                        echo "<td  class='hide_col' align='center'>".$real."</td>";
                                        echo "<td  align='center'>
													<div class='resumen'><b>Real Año Ant.:</b> ".$acum." <br/><b>Real:</b> ".$real." &nbsp;|&nbsp;<b>Plan:</b> ".$plan."</div><br/>
													<a onclick='setId($id21);' href = 'javascript:setId($id21);' data-toggle='modal' data-target='#$id21' title='Ver mas'>";
										if(($nombre==="Servicio telefónico en asentamientos de población de 200 o más habitantes" || $nombre==="Porciento de municipios con densidad telefónica >=4%")&&Yii::app()->user->roleid==1)
										{
											echo "<span style='color: #FF8C00' class='fa fa-arrow-circle-up'></span></a>";
										}
										else
										{
											if(($comportamiento=="Positivo" && $real1>=$plan1) || ($comportamiento=="Negativo" && $real1<=$plan1)){
												echo "<span style='color: #4eb305' class='fa fa-arrow-circle-up'></span></a>";
											}
											else
                                            {
                                                if($orden<=7&&$mes_esp!="Diciembre")
                                                    echo "<span style='color: #FF8C00' class='fa fa-arrow-circle-up'></span></a>";
                                                else
                                                    echo "<span style='color: #9f191f' class='fa fa-arrow-circle-down'></span></a>";
                                            }

										}                                        
										if(Yii::app()->user->roleid==1) {
                                        if(((substr($nombre, 0, strlen("Densidad")) === "Densidad") || $nombre==="Servicio telefónico en asentamientos de población de 200 o más habitantes" || $nombre==="Porciento de municipios con densidad telefónica >=4%")&& Yii::app()->user->roleid==1)
                                            echo " <a onclick='setId($id21);' href = 'javascript:setId($id21);' data-toggle='modal' data-target='#1$id21' title='Ver mas'><span class='fa fa-pencil-square'></span></a>";
										}
										echo " <a onclick='setId($id21);' href = 'javascript:setId($id21);' data-toggle='modal' data-target='#2$id21' title='Ver gráfico de comportamiento'><span style='color: #8E561B' class='fa fa-line-chart'></span></a>";
                                        echo "</td>";
                                        echo "</tr>";
                                        $c+=1;
                                        $this->myModal($id21,$row,$um,$acum,$real,$plan);
                                        if(((substr($nombre, 0, strlen("Densidad")) === "Densidad") || $nombre==="Servicio telefónico en asentamientos de población de 200 o más habitantes" || $nombre==="Porciento de municipios con densidad telefónica >=4%") && Yii::app()->user->roleid==1){
                                            $this->myModal($id21,$row,$um,$acum,$real,$plan,"1");
                                        }
                                        $this->myModal($id21,$row,$um,$acum,$real,$plan,"2");

                                    endforeach;*/
                                    ?>
                                    
					
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/dataTables.bootstrap.min.js"></script>
<script>   
    jQuery(document).ready(function ($) {
		$('#dataTables-example').DataTable();
		$('#dataTables-example tfoot th').each( function () {
			$(this).html( '<input class="form-control" type="text" style="width: 100%;"/>' );
		} );
		var table2 = $('#dataTables-example').DataTable();
		table2.columns().every( function () {
			var that = this;
			$('select', this.footer() ).on( 'change', function() {
				if ( that.search() !== this.value) {
					that
							.search( this.value )
							.draw();
				}
			});
			$( 'input', this.footer() ).on( 'keyup change', function () {
				if ( that.search() !== this.value ) {
					that
							.search( this.value )
							.draw();
				}
			} );
		} );
		$('#dataTables-example1').DataTable();
		$('#dataTables-example1 tfoot th').each( function () {
			$(this).html( '<input class="form-control" type="text" style="width: 100%;"/>' );
		} );
		var table1 = $('#dataTables-example1').DataTable();
		table1.columns().every( function () {
			var that = this;
			$('select', this.footer() ).on( 'change', function() {
				if ( that.search() !== this.value) {
					that
							.search( this.value )
							.draw();
				}
			});
			$( 'input', this.footer() ).on( 'keyup change', function () {
				if ( that.search() !== this.value ) {
					that
							.search( this.value )
							.draw();
				}
			} );
		} );
        $('#dataTables-example2').DataTable();
		$('#dataTables-example2 tfoot th').each( function () {
			$(this).html( '<input class="form-control" type="text" style="width: 100%;"/>' );
		} );
		var table3 = $('#dataTables-example2').DataTable();
		table3.columns().every( function () {
			var that = this;
			$('select', this.footer() ).on( 'change', function() {
				if ( that.search() !== this.value) {
					that
							.search( this.value )
							.draw();
				}
			});
			$( 'input', this.footer() ).on( 'keyup change', function () {
				if ( that.search() !== this.value ) {
					that
							.search( this.value )
							.draw();
				}
			} );
		} );
		$('#dataTables-example3').DataTable();
		$('#dataTables-example3 tfoot th').each( function () {
			$(this).html( '<input class="form-control" type="text" style="width: 100%;"/>' );
		} );
		var table4 = $('#dataTables-example3').DataTable();
		table4.columns().every( function () {
			var that = this;
			$('select', this.footer() ).on( 'change', function() {
				if ( that.search() !== this.value) {
					that
							.search( this.value )
							.draw();
				}
			});
			$( 'input', this.footer() ).on( 'keyup change', function () {
				if ( that.search() !== this.value ) {
					that
							.search( this.value )
							.draw();
				}
			} );
		} );
    });
</script>

