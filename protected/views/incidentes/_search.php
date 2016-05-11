<?php
/* @var $this IncidentesController */
/* @var $model Incidentes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	
<div class="form-group">
	<div class="col-md-4">
		<?php echo $form->label($model,'NOMBRE_SUCURSAL'); ?>
		<?php echo $form->textField($model,'NOMBRE_SUCURSAL'); ?>
	</div>

	<div class="col-md-4">
		<?php echo $form->label($model,'MES'); ?>
		<?php echo $form->textField($model,'MES'); ?>
	</div>
	
	<div class="col-md-4">
		<?php echo $form->label($model,'PERIODO'); ?>
		<?php echo $form->textField($model,'PERIODO'); ?>
	</div>
</div>

<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->