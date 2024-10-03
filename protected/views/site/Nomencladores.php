<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$array_actions = array('Cargo','Area');
$id_rol=Yii::app()->user->roleid;
$results1 = Yii::app()->db->createCommand()
            ->select('p.permiso,p.modelo, p.url, p.descripcion, p.icono')
            ->from('permiso p, rol_permiso rp, rol r')
            ->where('p.visible=0 and p.id = rp.permiso and r.id=rp.rol and p.menu="Nomencladores" and r.id="'.$id_rol.'"')
            ->order('p.permiso ASC')
            ->queryAll();        
?>
<?=$this->p2_PageTitle("gear-fill","Nomencladores del sistema", "", "Nomencladores");?>


<div class="card">
    <div class="card-body">
    	<h5 class="card-title"></h5>
        <!-- List group with custom content -->
		<ol class="list-group list-group-numbered">
		<?php 
			if(count($results1)>0){
				foreach($results1 as &$menu)
            	{
            		$cant = count($menu['modelo']::model()->findAll());
            		//Yii::app()->db->createCommand("SELECT count(*) FROM servidor")->queryScalar();
			?>
            <li class="list-group-item d-flex justify-content-between align-items-start">
				<div class="ms-2 me-auto">
                    <div class="fw-bold"><?=$menu['permiso']?> <span class="badge bg-secondary rounded-pill" style="font-size:14px"><?=$cant?></span></div>                	
              	</div>
          		<a  href="<?=CController::createUrl('/'.$menu['modelo'].'/admin')?>" class="custom-tooltip" style="font-style:normal"><span class="badge bg-secondary  bi bi-list-ol custom-btn"    style="font-size:17px; font-family: Bahnschrift;font-style:normal"><i class=" custom-tooltiptext ">Ver Listado</i></span></a>          		
            </li>
        <?php }} ?>
        </ol><!-- End with custom content -->
	</div>
</div>