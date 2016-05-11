<?php
/* @var $this TipoUsuarioController */
/* @var $model TipoUsuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tipo-usuario-form',
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
			<?php echo $form->labelEx($model,'COD_TIPO_USUARIO'); ?>
			<?php echo $form->textField($model,'COD_TIPO_USUARIO',array("class"=>"form-control",'maxlength'=>3)); ?>
			<?php echo $form->error($model,'COD_TIPO_USUARIO'); ?>
		</div>
		<div class="col-md-5">
			<?php echo $form->labelEx($model,'TIPO_USUARIO'); ?>
			<?php echo $form->textField($model,'TIPO_USUARIO',array("class"=>"form-control",'maxlength'=>50)); ?>
			<?php echo $form->error($model,'TIPO_USUARIO'); ?>
		</div>
		<div class="col-md-1">
			<?php echo $form->labelEx($model,'C'); ?>
			<?php echo $form->textField($model,'C',array("class"=>"form-control")); ?>
			<?php echo $form->error($model,'C'); ?>
		</div>
		<div class="col-md-1">
			<?php echo $form->labelEx($model,'R'); ?>
			<?php echo $form->textField($model,'R',array("class"=>"form-control")); ?>
			<?php echo $form->error($model,'R'); ?>
		</div>
		<div class="col-md-1">
			<?php echo $form->labelEx($model,'U'); ?>
			<?php echo $form->textField($model,'U',array("class"=>"form-control")); ?>
			<?php echo $form->error($model,'U'); ?>
		</div>
		<div class="col-md-1">
			<?php echo $form->labelEx($model,'D'); ?>
			<?php echo $form->textField($model,'D',array("class"=>"form-control")); ?>
			<?php echo $form->error($model,'D'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-md-offset-4 col-sm-8">
			<?php echo CHtml::submitButton($model->isNewRecord ? ' Crear ' : ' Guardar ',array('class'=>'btn btn-success')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->