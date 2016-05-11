<?php
/* @var $this InformesController */
/* @var $model Informes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_INFORME'); ?>
		<?php echo $form->textField($model,'ID_INFORME'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FECHA_INGRESO'); ?>
		<?php echo $form->textField($model,'FECHA_INGRESO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRES_TECNICO'); ?>
		<?php echo $form->textField($model,'NOMBRES_TECNICO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_CLIENTE'); ?>
		<?php echo $form->textField($model,'ID_CLIENTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRE_CLIENTE'); ?>
		<?php echo $form->textField($model,'NOMBRE_CLIENTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRE_SUCURSAL'); ?>
		<?php echo $form->textField($model,'NOMBRE_SUCURSAL'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UBICACION'); ?>
		<?php echo $form->textField($model,'UBICACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRE_VISITA'); ?>
		<?php echo $form->textField($model,'NOMBRE_VISITA'); ?>
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