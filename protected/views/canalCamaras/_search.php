<?php
/* @var $this CanalCamarasController */
/* @var $model CanalCamaras */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_CANALCAMARAS'); ?>
		<?php echo $form->textField($model,'ID_CANALCAMARAS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_SUCURSAL'); ?>
		<?php echo $form->textField($model,'ID_SUCURSAL'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NUM_CAMARA'); ?>
		<?php echo $form->textField($model,'NUM_CAMARA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UBICACION_CAMARA'); ?>
		<?php echo $form->textField($model,'UBICACION_CAMARA',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FECHA_CAMBIO_CAMARA'); ?>
		<?php echo $form->textField($model,'FECHA_CAMBIO_CAMARA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'OBSERVACION_CAMARA'); ?>
		<?php echo $form->textField($model,'OBSERVACION_CAMARA',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ESTADO_CAMARA'); ?>
		<?php echo $form->textField($model,'ESTADO_CAMARA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->