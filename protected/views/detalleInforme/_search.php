<?php
/* @var $this DetalleInformeController */
/* @var $model DetalleInforme */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_INFORME_DET'); ?>
		<?php echo $form->textField($model,'ID_INFORME_DET'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_VISITA'); ?>
		<?php echo $form->textField($model,'ID_VISITA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_INFORME'); ?>
		<?php echo $form->textField($model,'ID_INFORME'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_ESTADO'); ?>
		<?php echo $form->textField($model,'ID_ESTADO'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'VALOR'); ?>
		<?php echo $form->textField($model,'VALOR'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->