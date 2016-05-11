<?php
/* @var $this TipoVisitasController */
/* @var $model TipoVisitas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_TIPO_VISITA'); ?>
		<?php echo $form->textField($model,'ID_TIPO_VISITA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TIPO'); ?>
		<?php echo $form->textField($model,'TIPO',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DESCRIPCION'); ?>
		<?php echo $form->textArea($model,'DESCRIPCION',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->