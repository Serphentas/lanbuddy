<?php
/* @var $this OrderController */
/* @var $data Order */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idOrder')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idOrder), array('view', 'id'=>$data->idOrder)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tblUser')); ?>:</b>
	<?php echo CHtml::encode($data->tblUser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tblItem')); ?>:</b>
	<?php echo CHtml::encode($data->tblItem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivered')); ?>:</b>
	<?php echo CHtml::encode($data->delivered); ?>
	<br />


</div>