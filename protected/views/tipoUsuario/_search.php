<?php
/* @var $this TipoUsuarioController */
/* @var $model TipoUsuario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'COD_TIPO_USUARIO'); ?>
		<?php echo $form->textField($model,'COD_TIPO_USUARIO',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TIPO_USUARIO'); ?>
		<?php echo $form->textField($model,'TIPO_USUARIO',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'C'); ?>
		<?php echo $form->textField($model,'C'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'R'); ?>
		<?php echo $form->textField($model,'R'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'U'); ?>
		<?php echo $form->textField($model,'U'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'D'); ?>
		<?php echo $form->textField($model,'D'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->