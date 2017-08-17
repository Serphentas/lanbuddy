<?php
/* @var $this GameController */
/* @var $data Game */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idGame')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idGame), array('view', 'id'=>$data->idGame)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logo')); ?>:</b>
	<?php echo CHtml::encode($data->logo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('baseRules')); ?>:</b>
	<?php echo CHtml::encode($data->baseRules); ?>
	<br />


</div>