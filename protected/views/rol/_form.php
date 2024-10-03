<?php
/* @var $this RolController */
/* @var $model Rol */
/* @var $form CActiveForm */
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'rol-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>['class'=>'row g-3'],
)); 
$this->p2_MyInput(4, $form, $model, 'rol', 'text', array('size'=>60,'maxlength'=>100,'class'=>'form-control'));
$this->p2_MyInput(8, $form, $model, 'descripcion', 'text', array('size'=>60,'maxlength'=>255,'class'=>'form-control'));
?>
 	<div><br/></div>
	<ul class="nav nav-tabs" id="myTab" role="tablist">
	<?php
		for($i=0;$i<count($labels);$i++){
			if ($i == 0) {
				echo '
				<li class="nav-item" role="presentation">
					<button class="nav-link active" id="'.$labels[$i].'-tab" data-bs-toggle="tab" data-bs-target="#'.$labels[$i].'" type="button" role="tab" aria-controls="'.$labels[$i].'" aria-selected="true">'.$labels[$i].'</button>
				</li>
				';
				
			} else {
			echo '
				<li class="nav-item" role="presentation">
		          	<button class="nav-link" id="'.$labels[$i].'-tab" data-bs-toggle="tab" data-bs-target="#'.$labels[$i].'" type="button" role="tab" aria-controls="'.$labels[$i].'" aria-selected="false">'.$labels[$i].'</button>
		        </li>
			';			
			}
		}		
	?>
	</ul>
    <div class="tab-content pt-2" id="myTabContent">  
    	<?php
		for($i=0;$i<count($labels);$i++){				
			if ($i == 0) {
				echo '<div class="tab-pane fade show active" id="'.$labels[$i].'" role="tabpanel" aria-labelledby="'.$labels[$i].'">';
				$this->permisoTab($model, $labels[$i]);					
				echo '</div>';

			} else {
				echo '<div class="tab-pane fade" id="'.$labels[$i].'" role="tabpanel" aria-labelledby="'.$labels[$i].'">';
				$this->permisoTab($model, $labels[$i]);
				echo '</div>';	
			}
		}
		?> 
	</div>

	<!--  -->



	
	<?php $this->myButton($model);?>

<?php $this->endWidget(); ?>

                   </div><!-- form -->
		</div>
	</div>
</div>
<?php  ?>
    <!-- Core Scripts - Include with every page -->
<script type="text/javascript">
$(document).ready(function() {
	$("#tabs").tabs();
} );
</script>
