<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'RUT_PROVEEDOR'); ?>
		<?php echo $form->textField($model,'RUT_PROVEEDOR',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRE_PROVEEDOR'); ?>
		<?php echo $form->textField($model,'NOMBRE_PROVEEDOR',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DIRECCION_PROVEEDOR'); ?>
		<?php echo $form->textField($model,'DIRECCION_PROVEEDOR',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CIUDAD_PROVEEDOR'); ?>
		<?php echo $form->textField($model,'CIUDAD_PROVEEDOR',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->