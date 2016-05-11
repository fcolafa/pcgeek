<?php
/* @var $this SistemaController */
/* @var $model Sistema */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sistema-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'MATRICULA_BARCO'); ?>
		<?php echo $form->dropDownList($model,'MATRICULA_BARCO', CHtml::listData(barcos::model()->findAll(), 'MATRICULA_BARCO', 'NOMBRE_BARCO')); ?>
		<?php echo $form->error($model,'MATRICULA_BARCO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NOMBRE_SISTEMA'); ?>
		<?php echo $form->textField($model,'NOMBRE_SISTEMA',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'NOMBRE_SISTEMA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DESCRIPCION_SISTEMA'); ?>
		<?php echo $form->textArea($model,'DESCRIPCION_SISTEMA',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'DESCRIPCION_SISTEMA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->