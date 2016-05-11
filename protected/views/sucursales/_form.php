<?php
/* @var $this SucursalesController */
/* @var $model Sucursales */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sucursales-form',
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
		<div class="col-md-4">
			<?php echo $form->labelEx($model,'ID_CLIENTE'); ?>
			<?php echo $form->dropDownList($model,'ID_CLIENTE', CHtml::listData(Clientes::model()->findAll(), 'ID_CLIENTE', 'NOMBRE_CLIENTE'), array("class"=>"form-control")); ?>
			<?php echo $form->error($model,'ID_CLIENTE'); ?>
		</div>
		<div class="col-md-8">
			<?php echo $form->labelEx($model,'NOMBRE_SUCURSAL'); ?>
			<?php echo $form->textField($model,'NOMBRE_SUCURSAL',array("class"=>"form-control", 'maxlength'=>50)); ?>
			<?php echo $form->error($model,'NOMBRE_SUCURSAL'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-4">
			<?php echo $form->labelEx($model,'CONTACTO_SUCURSAL'); ?>
			<?php echo $form->textField($model,'CONTACTO_SUCURSAL',array("class"=>"form-control", 'maxlength'=>64)); ?>
			<?php echo $form->error($model,'CONTACTO_SUCURSAL'); ?>
		</div>
		<div class="col-md-8">
			<?php echo $form->labelEx($model,'DIRECCION_SUCURSAL'); ?>
			<?php echo $form->textField($model,'DIRECCION_SUCURSAL',array("class"=>"form-control", 'maxlength'=>64)); ?>
			<?php echo $form->error($model,'DIRECCION_SUCURSAL'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-4">
			<?php echo $form->labelEx($model,'FONO_SUCURSAL'); ?>
			<?php echo $form->textField($model,'FONO_SUCURSAL',array("class"=>"form-control", 'maxlength'=>24)); ?>
			<?php echo $form->error($model,'FONO_SUCURSAL'); ?>
		</div>
		<div class="col-md-8">
			<?php echo $form->labelEx($model,'DESCRIPCION'); ?>
			<?php echo $form->textArea($model,'DESCRIPCION',array("class"=>"form-control", 'rows'=>3, 'cols'=>50)); ?>
			<?php echo $form->error($model,'DESCRIPCION'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-offset-4 col-sm-8">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-success')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->