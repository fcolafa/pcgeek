<?php
/* @var $this TipoIncidenteController */
/* @var $model TipoIncidente */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tipo-incidente-form',
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
	<div class="col-md-6">
		<?php echo $form->labelEx($model,'NOMBRE_TIPO_INCIDENTE'); ?>
		<?php echo $form->textField($model,'NOMBRE_TIPO_INCIDENTE',array("class"=>"form-control",'size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'NOMBRE_TIPO_INCIDENTE'); ?>
	</div>

	<div class="col-md-6">
		<?php echo $form->labelEx($model,'DESCRIPCION_TIPO_INICIDENTE'); ?>
		<?php echo $form->textField($model,'DESCRIPCION_TIPO_INICIDENTE',array("class"=>"form-control",'size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'DESCRIPCION_TIPO_INICIDENTE'); ?>
	</div>
</div>
	<div class="col-md-offset-2 col-md-10">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->