<?php
/* @var $this TypeController */
/* @var $data Type */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idType')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idType), array('view', 'id'=>$data->idType)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />


</div>