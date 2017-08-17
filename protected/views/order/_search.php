<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idOrder'); ?>
		<?php echo $form->textField($model,'idOrder'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblUser'); ?>
		<?php echo $form->textField($model,'tblUser'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblItem'); ?>
		<?php echo $form->textField($model,'tblItem'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delivered'); ?>
		<?php echo $form->textField($model,'delivered'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->