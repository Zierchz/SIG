<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
 $label=$this->pluralize($this->class2name($this->modelClass));
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
$this->p2_PageTitle("<?php echo $label;?>","Datos del <?php echo $this->modelClass;?> ","View","<?php echo $this->modelClass;?>",$model->id);
<?php
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
?>
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
<?php
foreach($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."',\n";
?>
	),
)); ?>
</div>
