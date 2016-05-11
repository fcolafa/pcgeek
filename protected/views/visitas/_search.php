<?php
/* @var $this VisitasController */
/* @var $model Visitas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_VISITA'); ?>
		<?php echo $form->textField($model,'ID_VISITA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TIPO_VISITA'); ?>
		<?php echo $form->textField($model,'TIPO_VISITA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRE_VISITA'); ?>
		<?php echo $form->textField($model,'NOMBRE_VISITA',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DESCRIPCION'); ?>
		<?php echo $form->textArea($model,'DESCRIPCION',array('rows'=>3, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->