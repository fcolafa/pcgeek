<?php
/* @var $this VisitasController */
/* @var $model Visitas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'visitas-form',
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
			<?php echo $form->labelEx($model,'TIPO_VISITA'); ?>
			<?php echo $form->dropDownList($model,'TIPO_VISITA', CHtml::listData(TipoVisitas::model()->findAll(), 'ID_TIPO_VISITA', 'TIPO'),array("class"=>"form-control")); ?>
			<?php echo $form->error($model,'TIPO_VISITA'); ?>
		</div>
		<div class="col-md-8">
			<?php echo $form->labelEx($model,'NOMBRE_VISITA'); ?>
			<?php echo $form->textField($model,'NOMBRE_VISITA',array("class"=>"form-control", 'maxlength'=>64)); ?>
			<?php echo $form->error($model,'NOMBRE_VISITA'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-12">
			<?php echo $form->labelEx($model,'DESCRIPCION'); ?>
			<?php echo $form->textArea($model,'DESCRIPCION',array("class"=>"form-control", 'rows'=>2, 'cols'=>50)); ?>
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