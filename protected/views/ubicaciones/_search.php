<?php
/* @var $this UbicacionesController */
/* @var $model Ubicaciones */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_UBICACION'); ?>
		<?php echo $form->textField($model,'ID_UBICACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'REGION'); ?>
		<?php echo $form->textField($model,'REGION',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UBICACION'); ?>
		<?php echo $form->textField($model,'UBICACION',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->