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
		<?php echo $form->label($model,'ID_TECNICO'); ?>
		<?php echo $form->textField($model,'tecnico'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_CLIENTE'); ?>
		<?php echo $form->textField($model,'cliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FECHA_INGRESO'); ?>
		<?php echo $form->textField($model,'FECHA_INGRESO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HORA_INGRESO'); ?>
		<?php echo $form->textField($model,'HORA_INGRESO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HORA_SALIDA'); ?>
		<?php echo $form->textField($model,'HORA_SALIDA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'OBSERVACIONES'); ?>
		<?php echo $form->textArea($model,'OBSERVACIONES',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IMAGEN'); ?>
		<?php echo $form->textArea($model,'IMAGEN',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TIMESTAMP'); ?>
		<?php echo $form->textField($model,'TIMESTAMP'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->