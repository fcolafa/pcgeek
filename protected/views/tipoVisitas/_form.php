<?php
/* @var $this TipoVisitasController */
/* @var $model TipoVisitas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tipo-visitas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('class'=>'form-horizontal'),
	)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<div class="col-md-1">
			<?php echo $form->labelEx($model,'ID_TIPO_VISITA'); ?>
			<?php echo $form->textField($model,'ID_TIPO_VISITA',array("class"=>"form-control", 'maxlength'=>1)); ?>
			<?php echo $form->error($model,'ID_TIPO_VISITA'); ?>
		</div>
		<div class="col-md-3">
			<?php echo $form->labelEx($model,'TIPO'); ?>
			<?php echo $form->textField($model,'TIPO',array("class"=>"form-control", 'maxlength'=>64)); ?>
			<?php echo $form->error($model,'TIPO'); ?>
		</div>
		<div class="col-md-8">
			<?php echo $form->labelEx($model,'DESCRIPCION'); ?>
			<?php echo $form->textArea($model,'DESCRIPCION',array("class"=>"form-control", 'cols'=>50)); ?>
			<?php echo $form->error($model,'DESCRIPCION'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-offset-4 col-sm-8">
			<?php echo CHtml::submitButton($model->isNewRecord ? ' Crear ' : ' Guardar ',array('class'=>'btn btn-success')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->