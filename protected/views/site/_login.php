<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->breadcrumbs=array(
	'Login',
);
?>


<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="row">
		<?php echo $form->textField($model,'userName', array('placeholder'=>'User')); ?>
		<?php echo $form->error($model,'userName'); ?>
	</div>

	<div class="row">
		<?php echo $form->passwordField($model,'password', array('placeholder'=>'Password')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Connection', array('class'=>'login')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->