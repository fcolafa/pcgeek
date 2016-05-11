<?php
/* @var $this TipoIncidenteController */
/* @var $model TipoIncidente */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_TIPO_INCIDENTE'); ?>
		<?php echo $form->textField($model,'ID_TIPO_INCIDENTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRE_TIPO_INCIDENTE'); ?>
		<?php echo $form->textField($model,'NOMBRE_TIPO_INCIDENTE',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DESCRIPCION_TIPO_INICIDENTE'); ?>
		<?php echo $form->textField($model,'DESCRIPCION_TIPO_INICIDENTE',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->