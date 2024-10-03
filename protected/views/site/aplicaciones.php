<?php
/* @var $this CandidatoController */
/* @var $model Candidato */
$this->myBreadCrumb("Aplicaciones","","Aplicaciones Empresariales");
$this->myHeader("Aplicaciones Empresariales");
$this->myTableHeader("desktop","Candidatos","Listado de Aplicaciones Empresariales", "","Candidato","");
?>
<div class="box">	
	<div class="box-content no-padding table-responsive">
		<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-2">
			<thead>
				<tr>
					<th width="5%">No.</th>
					<th width="20%">Nombre</th>
					<th width="40%">Descripción</th>
					<th width="10%">Siglas</th>
					<th width="20%">Palabras Claves</th>
					<th width="5%"></th>
				</tr>
				<tr>
					<th></th>
					<th><label><input type="text" name="search_nombre" value="" class="search_init" /></label></th>
					<th><label><input type="text" name="search_descripcion" value="" class="search_init" /></label></th>
					<th><label><input type="text" name="search_siglas" value="" class="search_init" /></label></th>
					<th><label><input type="text" name="search_url" value="" class="search_init" /></label></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$c=1;
				foreach ($ing as $name) {					
					echo '
					<tr>
					<td>'.$c.'</td>
					<td>'.$name['nombre'].'</td>
					<td>'.$name['descripcion'].'</td>
					<td>'.$name['siglas'].'</td>
					<td>'.$name['palabras_claves'].'</td>
					<td align="center"><a href="'.Yii::app()->createUrl("Aplicacion/view",array("id"=>$name['id'])).'"><i class="fa fa-search" title="Modificar"></i></a></td>	
					</tr>
					';
					$c+=1;
				}
				?>
				
			</tbody>
			<tfoot>
				<tr>
					<th>No.</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Siglas</th>
					<th>URL</th>
					<th></th>
					
				</tr>
			</tfoot>
		</table>
	</div>
</div>
