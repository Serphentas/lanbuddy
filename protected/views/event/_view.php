<?php
/* @var $this EventController */
/* @var $data Event */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEvent')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEvent), array('view', 'id'=>$data->idEvent)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('challonge')); ?>:</b>
	<?php echo CHtml::encode($data->challonge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUser')); ?>:</b>
	<?php echo CHtml::encode($data->idUser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idGame')); ?>:</b>
	<?php echo CHtml::encode($data->idGame); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idType')); ?>:</b>
	<?php echo CHtml::encode($data->idType); ?>
	<br />


</div>