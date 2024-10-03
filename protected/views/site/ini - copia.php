<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */


?>
<div class="container-fluid" style="margin-top: 60px;">
	
	<div id="page-login" class="row">
		<div class="col-xs-12" style="width: 100%;margin-top: -40px;">
                <div class="login-panel panel panel-primary">
					<div class="panel-heading col-xs-9" align="left" height="50px" style="background-color:#c5ddf1;height: 140px;">
                        <span><img src="img/fondo2.png" height="100%"></span>
                    </div>
                    <div class="panel-heading col-xs-3" align="right" height="50px" style="background-color:#c5ddf1;height: 140px;">
                        <span align="right"><img src="img/unnamed.jpg" height="100%" style="border-radius: 60px;"></span>
                    </div>
					<div class="panel-body">						
						<div class="col-xs-12">
							<div class="box-header">
								<div class="box-name" style="background-color:#c5ddf1;">
									<i class="fa fa-sitemap"></i>
									<span>LinuxJournal Readers' Choice Awards 2013 Linux distro</span>
								</div>
							</div>
							<div class="box-content no-padding table-responsive">
								<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-2">
									<thead>
										<tr>
											<th><label><input type="text" name="search_rate" value="Search rate" class="search_init"></label></th>
											<th><label><input type="text" name="search_name" value="Search distro" class="search_init"></label></th>
											<th><label><input type="text" name="search_votes" value="Search votes" class="search_init"></label></th>
											<th><label><input type="text" name="search_homepage" value="Search homepage" class="search_init"></label></th>
											<th><label><input type="text" name="search_version" value="Search versions" class="search_init"></label></th>
										</tr>
									</thead>
									<tbody>
									<?php
									$cont = 1;
									foreach ($results as &$res) {
										echo '
										<tr>
											<td>'.$cont.'</td>
											<td>Ubuntu</td>
											<td>16%</td>
											<td><i class="fa fa-home"></i><a href="http://ubuntu.com" target="_blank">http://ubuntu.com</a></td>
											<td>13.10</td>
										</tr>
										';
									}
									?>										
									</tbody>
									<tfoot>
										<tr>
											<th>Rate</th>
											<th>Distro</th>
											<th>Votes</th>
											<th>Homepage</th>
											<th>Version</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div><!-- form -->
				</div>
            </div>
        </div>
    </div>
    <script src="js/jquery-1.10.2.js"></script>
<script type="text/javascript">	
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