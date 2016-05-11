<?php
/* @var $this ValoresController */
/* @var $model Valores */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_VALORES'); ?>
		<?php echo $form->textField($model,'ID_VALORES'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_UBICACION'); ?>
		<?php echo $form->textField($model,'ID_UBICACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_VISITA'); ?>
		<?php echo $form->textField($model,'ID_VISITA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VALOR'); ?>
		<?php echo $form->textField($model,'VALOR'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->