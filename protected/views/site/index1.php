<?php
///* @var $this SiteController */
/* @var $this TareaController */
/* @var $model Tarea */
date_default_timezone_set("America/Havana");


//$this->pageTitle=Yii::app()->name;
$fecha_actual=date("d-M-Y");
$fecha = date('Y-m-d');

?>
<?php //if(!Yii::app()->user->isGuest):

    //$access = new AccessControlController(1);
    //$access->actionRefresh();
    ?>

<!-- /.row -->
<div class="row">
    <div id="breadcrumb" class="col-xs-12">
        <ol class="breadcrumb">
		<h1></h1>
            <li><a href="<?php echo CController::createUrl('/site/index');?>">Inicio</a></li>			
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-sitemap fa-fw"></i> Estadisticas:</h3>
		
		<table width="100%">                    
						<tr align="center">
							<td width="14%" style="color: #5a8db6;"><h2><i class="fa fa-desktop"></i></h2></b></td>
							<td width="14%" style="color: #178530"><h2><a href="<?php
                                echo Yii::app()->createUrl('aplicacion/reporteappconaval'); ?>
                                " style="color: #178530"> <i class="fa fa-long-arrow-up"> &nbsp;
                                <i class="fa fa-clipboard"></i></a></h2></td>
							<td width="14%" style="color: #D15E5E"><h2><a href="<?php
							    echo Yii::app()->createUrl('aplicacion/reporteappsinaval'); ?>
                                " style="color: #D15E5E"> <i class="fa fa-long-arrow-down"> &nbsp;<i class="fa fa-clipboard"></i></a></h2></td>
							<td width="14%" style="color: #a87732"><h2><img src="img/gitlab.png" width="75px"/></h2></td>
							<td width="14%" style="color: #178530"><h2><a href="<?php
                                    echo Yii::app()->createUrl('aplicacion/admin'); ?>
                                " style="color: #178530"><img src="img/fondo.png" width="75px"/></a></h2></td>
							<td width="14%" style="color: #D15E5E"><h2><a href="<?php
                                    echo Yii::app()->createUrl('contacto/admin'); ?>
                                " style="color: #D15E5E"><i class="fa fa-users"></i></a></h2></td>
							<td width="16%" style="color: #1a4d0e"><h2><a href="<?php
                                    echo Yii::app()->createUrl('documento/admin'); ?>
                                " style="color: #1a4d0e" class="fa fa-long-arrow-up"><i class="fa fa-book"></i></a></h2></td>
						</tr>
						<tr align="center">
							<td style="color: #5a8db6;"><b>Total</b></td>
							<td style="color: #178530"><b>Con Aval</b></td>
							<td style="color: #D15E5E;"><b>Sin Aval</b></td>
							<td style="color: black"><b>Subidas GitLab</b></td>
							<td style="color: #034A76"><b>Subidas MAPLIC</b></td>
							<td style="color: #D15E5E;"><b>Cant. Contactos</b></td>
							<td style="color: #1a4d0e"><b>Cant. Documentos</b></td>
						</tr>
						<tr align="center" style="color: #5a8db6;">
							<td style="color: #5a8db6;"><h1><b>159</b></h1></td>
							<td style="color: #178530"><h1><b><?=$con_aval?></b></h1></td>
							<td style="color: #D15E5E;"><h1><b><?=$sin_aval?></b></h1></td>
							<td style="color: black"><h1><b>0</b></h1></td>
							<td style="color: #034A76"><h1><b><?=$maplic?></b></h1></td>
							<td style="color: #D15E5E;"><h1><b><?=$contactos?></b></h1></td>
							<td style="color: #1a4d0e"><h1><b><?=$docs?></b></h1></td>
						</tr>
					</table>
					
        
    </div>
</div>
<h4 class="page-header"></h4>
<br/>
<?php $this->myTableHeader("info","Noticias","Listado de Noticias", "Admin","Noticia","");?>
	<?php $model_not=new Noticia('search');?>
	<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'noticia-grid',
	'dataProvider'=>$model_not->search(),
	'filter'=>$model_not,
	'summaryText' => 'Mostrando {start} a {end} de {count} resultados',
	'pager'=>array(
		'header' => 'Ir a la pagina:',
		'firstPageLabel' => '< <',
		'prevPageLabel' => 'Anterior',
		'nextPageLabel' => 'Siguiente',
		'lastPageLabel' => '>>;'
	),
	'columns'=>array(
		array('header'=>'No.',
			'value'=>'++$row',
		),
		//'id',
		'titulo',
		'descripcion',
		'autor',
		'fecha',
		array(
			'class'=>'CButtonColumn',
			'deleteConfirmation'=>"js:'¿Seguro que desea eliminar este elemento?'",
			'buttons'=>['delete'=>['visible'=>'($data->autor == Yii::app()->user->name?true:Yii::app()->user->name=="admin"?true:false)', 'label'=>'Eliminar','url'=>'CController::createUrl("/Noticia/delete",array("id"=>$data->primaryKey))'],
					'update'=>['visible'=>'($data->autor == Yii::app()->user->name?true:Yii::app()->user->name=="admin"?true:false)','label'=>'Modificar','url'=>'CController::createUrl("/Noticia/update",array("id"=>$data->primaryKey))'],
					'view'=>['visible'=>'($data->id == "")','label'=>'Mostrar datos'],
			]
		),
	),
)); ?>

                </div>
            </div>
        </div>
    </div>
</div>
			
			
			
	 
	 
<script src="plugins/jquery/jquery-2.1.0.min.js"></script>
    
	<?php ?>
			<?php //endif?>