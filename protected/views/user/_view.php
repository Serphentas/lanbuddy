<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUser')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idUser), array('view', 'id'=>$data->idUser)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userName')); ?>:</b>
	<?php echo CHtml::encode($data->userName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('victoryPoints')); ?>:</b>
	<?php echo CHtml::encode($data->victoryPoints); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('elo')); ?>:</b>
	<?php echo CHtml::encode($data->elo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('box')); ?>:</b>
	<?php echo CHtml::encode($data->box); ?>
	<br />


</div>