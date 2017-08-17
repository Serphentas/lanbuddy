<?php
/* @var $this EventController */
/* @var $model Event */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'event-form',
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
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'challonge'); ?>
		<?php echo $form->textField($model,'challonge',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'challonge'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idUser'); ?>
		<?php echo $form->textField($model,'idUser'); ?>
		<?php echo $form->error($model,'idUser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idGame'); ?>
		<?php echo $form->textField($model,'idGame'); ?>
		<?php echo $form->error($model,'idGame'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idType'); ?>
		<?php echo $form->textField($model,'idType'); ?>
		<?php echo $form->error($model,'idType'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->