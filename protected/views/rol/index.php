<?php
/* @var $this RolController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rols',
);

$this->menu=array(
	array('label'=>'Crear Rol', 'url'=>array('create')),
	array('label'=>'Modificar Rol', 'url'=>array('admin')),
);
?>

<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Rol</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
