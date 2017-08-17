<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idUser'); ?>
		<?php echo $form->textField($model,'idUser'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'userName'); ?>
		<?php echo $form->textField($model,'userName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'victoryPoints'); ?>
		<?php echo $form->textField($model,'victoryPoints'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'elo'); ?>
		<?php echo $form->textField($model,'elo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'box'); ?>
		<?php echo $form->textField($model,'box'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->