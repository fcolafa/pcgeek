<?php
/* @var $this TipoEquipoController */
/* @var $model TipoEquipo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tipo-equipo-form',
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
		<div class="col-md-12">
			<?php echo $form->labelEx($model,'NOMBRE_TIPOEQUIPO'); ?>
			<?php echo $form->textField($model,'NOMBRE_TIPOEQUIPO',array("class"=>"form-control",'maxlength'=>45)); ?>
			<?php echo $form->error($model,'NOMBRE_TIPOEQUIPO'); ?>
		</div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-success offset2')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->