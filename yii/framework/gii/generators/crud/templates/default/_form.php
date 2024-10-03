<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
  $label=$this->modelClass;
  $label1=$this->pluralize($this->class2name($this->modelClass));
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form CActiveForm */

?>

<div class="form">

<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' =>['class'=>'row g-3'],
)); ?>\n"; ?>
<?php
echo "<?php\n";
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
?>
$this->myInput(6, $form, $model,'<?php echo $column->name;?>','text',array('size'=>50,'maxlength'=>50, 'class'=>'form-control'));
<?php
}
?>
<?php echo "?>\n"; ?>
	<?php echo "<?php \$this->myButton(".'$model'."); ?>\n"; ?>
<?php echo "<?php \$this->endWidget(); ?>\n"; ?>
</div>

