<?php
/* @var $this ClientesController */
/* @var $model Clientes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_CLIENTE'); ?>
		<?php echo $form->textField($model,'ID_CLIENTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RUT_CLIENTE'); ?>
		<?php echo $form->textField($model,'RUT_CLIENTE',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRE_CLIENTE'); ?>
		<?php echo $form->textField($model,'NOMBRE_CLIENTE',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DIRECCION_CLIENTE'); ?>
		<?php echo $form->textArea($model,'DIRECCION_CLIENTE',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FONO_CLIENTE'); ?>
		<?php echo $form->textField($model,'FONO_CLIENTE',array('size'=>24,'maxlength'=>24)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CONTACTO'); ?>
		<?php echo $form->textField($model,'CONTACTO',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FONO_CONTACTO'); ?>
		<?php echo $form->textField($model,'FONO_CONTACTO',array('size'=>24,'maxlength'=>24)); ?>
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