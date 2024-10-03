<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
<?php
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
?>
$this->p2_PageTitle("cogs","<?php echo $label;?>","Listado de <?php echo $label;?>", "Admin","<?php echo $this->modelClass;?>","");
<?php echo "echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>