<?php
/* @var $this TecnicosController */
/* @var $model Tecnicos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_TECNICO'); ?>
		<?php echo $form->textField($model,'ID_TECNICO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RUT_TECNICO'); ?>
		<?php echo $form->textField($model,'RUT_TECNICO',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRES_TECNICO'); ?>
		<?php echo $form->textField($model,'NOMBRES_TECNICO',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'APELLIDOS_TECNICO'); ?>
		<?php echo $form->textField($model,'APELLIDOS_TECNICO',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DIRECCION_TECNICO'); ?>
		<?php echo $form->textField($model,'DIRECCION_TECNICO',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FONO_TECNICO'); ?>
		<?php echo $form->textField($model,'FONO_TECNICO',array('size'=>24,'maxlength'=>24)); ?>
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