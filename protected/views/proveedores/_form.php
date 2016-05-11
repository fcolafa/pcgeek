<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'proveedores-form',
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
		<div class="col-md-3">
			<?php echo $form->labelEx($model,'RUT_PROVEEDOR'); ?>
			<?php echo $form->textField($model,'RUT_PROVEEDOR',array("class"=>"form-control",'maxlength'=>15)); ?>
			<?php echo $form->error($model,'RUT_PROVEEDOR'); ?>
		</div>

		<div class="col-md-9">
			<?php echo $form->labelEx($model,'NOMBRE_PROVEEDOR'); ?>
			<?php echo $form->textField($model,'NOMBRE_PROVEEDOR',array("class"=>"form-control",'maxlength'=>50)); ?>
			<?php echo $form->error($model,'NOMBRE_PROVEEDOR'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-6">
			<?php echo $form->labelEx($model,'DIRECCION_PROVEEDOR'); ?>
			<?php echo $form->textField($model,'DIRECCION_PROVEEDOR',array("class"=>"form-control",'maxlength'=>50)); ?>
			<?php echo $form->error($model,'DIRECCION_PROVEEDOR'); ?>
		</div>

		<div class="col-md-6">
			<?php echo $form->labelEx($model,'CIUDAD_PROVEEDOR'); ?>
			<?php echo $form->textField($model,'CIUDAD_PROVEEDOR',array("class"=>"form-control",'maxlength'=>50)); ?>
			<?php echo $form->error($model,'CIUDAD_PROVEEDOR'); ?>
		</div>
	</div>
	<div class="row buttons">
		<div class="col-md-2">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-success offset2')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->