<?php
/* @var $this SistemaController */
/* @var $model Sistema */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'COD_SISTEMA'); ?>
		<?php echo $form->textField($model,'COD_SISTEMA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MATRICULA_BARCO'); ?>
		<?php echo $form->textField($model,'MATRICULA_BARCO',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRE_SISTEMA'); ?>
		<?php echo $form->textField($model,'NOMBRE_SISTEMA',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DESCRIPCION_SISTEMA'); ?>
		<?php echo $form->textArea($model,'DESCRIPCION_SISTEMA',array('rows'=>6, 'cols'=>50)); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->