<?php
/* @var $this EquiposController */
/* @var $model Equipos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_EQUIPOS'); ?>
		<?php echo $form->textField($model,'ID_EQUIPOS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RUT_PROVEEDOR'); ?>
		<?php echo $form->textField($model,'RUT_PROVEEDOR',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CODIGO_INVENTARIO'); ?>
		<?php echo $form->textArea($model,'CODIGO_INVENTARIO',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MODELO_EQUIPO'); ?>
		<?php echo $form->textField($model,'MODELO_EQUIPO',array('size'=>60,'maxlength'=>65)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FECHA_COMPRA'); ?>
		<?php echo $form->textField($model,'FECHA_COMPRA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FECHA_BAJA'); ?>
		<?php echo $form->textField($model,'FECHA_BAJA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ESTADO_EQUIPO'); ?>
		<?php echo $form->textField($model,'ESTADO_EQUIPO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'USUARIO_EQUIPO'); ?>
		<?php echo $form->textField($model,'USUARIO_EQUIPO',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NUMERO_FACTURA'); ?>
		<?php echo $form->textField($model,'NUMERO_FACTURA',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'OBSV_EQUIPO'); ?>
		<?php echo $form->textArea($model,'OBSV_EQUIPO',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_TIPOEQUIPO'); ?>
		<?php echo $form->textField($model,'ID_TIPOEQUIPO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->