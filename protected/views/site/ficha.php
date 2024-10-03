<?php
/* @var $this TrabajadorController */
/* @var $model Trabajador */
$this->myBreadCrumb("Trabajadores","Trabajador", "Listado de Trabajadores");
$this->myHeader("Gestionar Trabajadores");
$this->myTableHeader("male","Trabajadores","Ficha del Trabajador: ".$usuario->fullname,"","Trabajador",null);
$labels=array('Personales','Estudios','Trabajos','Proyectos/Tareas','Capacitación','Eventos','Reconocimientos','Capacidades','Idiomas','Viajes');
?>
<div id="tabs">
	<ul>
	<?php
		for($i=0;$i<count($labels);$i++)
			echo '<li><a href="#tabs-'.($i+1).'">'.$labels[$i].'</a></li>';
	?>
	</ul>
	<div id="tabs-1">
		<div class="col-lg-4" style="vertical-align: middle">
			<div class="row">
				<?php
				$path = "img/fotos/";
				if($personal){
					$foto=$personal->foto;
					if($foto=="")
						$foto="avatar.png";
				}
				else
					$foto="avatar.png";
				echo CHtml::image($path.$foto,"foto",array("width"=>"100%")); ?>
			</div>
		</div>
		<div class="col-lg-8">
		<?php
			if($personal==NULL)
				echo "No se han registrado los datos";
			else
			$this->widget('zii.widgets.CDetailView', array(
				'data'=>$personal,
				'attributes'=>array(
					'ci',
					'sexo',
					'direccion',
					'telef_casa',
					'correo',
					'movil',
					'edad',
					'fecha_nac',
					'color_piel',
					'color_ojos',
					'estatura',
					'peso',
					'lugar_nac',
					'ciudadania',
					'estado_civil'
				),
			));
		?>
	</div>
	</div>
	<div id="tabs-2"><?php $this->Gridview($centro_estudios, array('nombre','titulo','desde','hasta')); ?> </div>
	<div id="tabs-3"><?php $this->Gridview($centro_laboral, array('departamento','entidad','organismo','provincia','pais','cargo','desde','hasta')); ?></div>
	<div id="tabs-4"><?php $this->Gridview($proyectos, array('nombre','desde','hasta','comentario')); ?></div>
	<div id="tabs-5"><?php $this->Gridview($capacitacion, array('nombre','anno','capacitador','region','pais','categoria','tipo')); ?></div>
	<div id="tabs-6"><?php $this->Gridview($eventos, array('nombre','anno','entidad','organismo')); ?></div>
	<div id="tabs-7"><?php $this->Gridview($reconocimentos, array('nombre','anno','entidad','organismo')); ?></div>
	<div id="tabs-8"><?php $this->Gridview($competencias, array('nombre','descripcion')); ?></div>
	<div id="tabs-9"><?php $this->Gridview($idiomas, array('lengua','nivel')); ?></div>
	<div id="tabs-10"><?php $this->Gridview($viajes, array('pais','anno')); ?></div>
</div>                    
</div>
</div>
</div>
</div>
</div>
<script src="plugins/jquery/jquery-2.1.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#tabs").tabs();
    /*$('#table').DataTable();
	
	var t = $('#table1').DataTable({
        aaSorting: [[6, 'desc']],
		iDisplayLength: 15,
		bLengthChange: false,
		bInfo : false,
		bPaginate: false		
    });
	t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).fnDraw();*/
} );
</script>
