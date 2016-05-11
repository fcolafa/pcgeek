<?php
/* @var $this SucursalesController */
/* @var $model Sucursales */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_SUCURSAL'); ?>
		<?php echo $form->textField($model,'ID_SUCURSAL'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_CLIENTE'); ?>
		<?php echo $form->textField($model,'ID_CLIENTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRE_SUCURSAL'); ?>
		<?php echo $form->textField($model,'NOMBRE_SUCURSAL',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DIRECCION_SUCURSAL'); ?>
		<?php echo $form->textField($model,'DIRECCION_SUCURSAL',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CONTACTO_SUCURSAL'); ?>
		<?php echo $form->textField($model,'CONTACTO_SUCURSAL',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FONO_SUCURSAL'); ?>
		<?php echo $form->textField($model,'FONO_SUCURSAL',array('size'=>24,'maxlength'=>24)); ?>
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