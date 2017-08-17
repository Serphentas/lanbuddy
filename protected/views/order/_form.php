<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblUser'); ?>
		<?php echo $form->textField($model,'tblUser'); ?>
		<?php echo $form->error($model,'tblUser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblItem'); ?>
		<?php echo $form->textField($model,'tblItem'); ?>
		<?php echo $form->error($model,'tblItem'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'delivered'); ?>
		<?php echo $form->textField($model,'delivered'); ?>
		<?php echo $form->error($model,'delivered'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->