<?php
/* @var $this CandidatoController */
/* @var $model Candidato */
$this->myBreadCrumb("Avales","","Avales Registrados");
$this->myHeader("Avales de Aplicaciones");
$this->myTableHeader("file","Candidatos","Listado de Avales", "","Candidato","");
?>
<input type="hidden" id="ident"/>
<div class="box">	
	<div class="box-content no-padding table-responsive">
		<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-2">
			<thead>
				<tr>
					<th width="5%">No.</th>
					<th width="30%">Aplicacion</th>
					<th width="10%">Fecha</th>
					<th width="10%">Estado</th>
					<th width="35%">Comentario</th>
					<th width="5%"></th>
					<th width="5%"></th>
				</tr>
				<tr>
					<th></th>
					<th><label><input type="text" name="search_nombre" value="" class="search_init" /></label></th>
					<th><label><input type="text" name="search_descripcion" value="" class="search_init" /></label></th>
					<th><label><input type="text" name="search_siglas" value="" class="search_init" /></label></th>
					<th><label><input type="text" name="search_url" value="" class="search_init" /></label></th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$c=1;
				foreach ($ing as $name) {					
					$doc = Yii::app()->db->createCommand("Select d.url, a.siglas from documento d, aplicacion a where d.id_aplicacion =a.id and d.id_aplicacion = ".$name['id_aplicacion'])->queryRow();
					echo '
					<tr>
					<td>'.$c.'</td>
					<td>'.$name['nombre'].'</td>
					<td>'.$name['fecha_recepcion'].'</td>
					<td>'.$name['estado'].'</td>
					<td>'.$name['comentario'].'</td>
					<td align="center"><a onclick="setId($id21);" href = "javascript:setId($id21);" data-toggle="modal" data-target="#2$id21"><i class="fa fa-search" title="Detalles"></i></a></td>';	
					if($doc["url"]=="")
						echo '<td align="center"><i class="fa fa-ban" title="Descargar"></i></td>';
					else
						echo '<td align="center"><a href="docs/Aplicaciones/'.$doc["siglas"].'/'.$doc["url"].'" target="_blank"><i class="fa fa-download" title="Descargar"></i></a></td>';	
					echo '
					</tr>
					';
					$c+=1;
					//$this->myModal($id21,$row,$um,$acum,$real,$plan,"2",$id_meta, "");
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
					<th></th>
					
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<script>
    function setId(id)
    {
        document.getElementById('ident').value=id;
    }    
</script>