<?php
/* @var $this RolController */
$this->p2_PageTitle("person-badge", "Roles del Sistema", "Detalles", "Gestión de Roles ", $model->id);
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'rol',
		'descripcion',
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
