<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
$this->p2_PageTitle("people", "Usuarios del Sistema", "Detalles", "Gestión de Usuarios", $model->id);
// echo '<div class="row">
//         <div class="col-md-2"><img style="width: 100%" src="'.Yii::app()->getBaseUrl(true).'/plantilla2/img/fotos/'.$model->foto.'"></div>
//         <div class="col-md-10">';
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'username',
		'nombre',
		array(
			'name'=>'rol0.rol',
			'label'=>'Rol',
		),
		// 
		array(
            'name'=>'id_uo',
            'value'=>$model->idUo->siglas,
            'header'=>'Unidad Organizativa',
        ),
		//'rol',
		//'grupo',
		//'trabajador',
	),
)); ?>
</div>
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->

