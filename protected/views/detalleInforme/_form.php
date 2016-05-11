<?php
/* @var $this DetalleInformeController */
/* @var $model DetalleInforme */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detalle-informes-form',
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
			<?php echo $form->labelEx($model,'ID_VISITA'); ?>
			<?php echo $form->textField($model,'ID_VISITA',array("class"=>"form-control",'maxlength'=>24)); ?>
			<?php echo $form->error($model,'ID_VISITA'); ?>
		</div>
	</div>
<div class="form-group">
	<div class="col-md-2">
		<?php echo $form->labelEx($model,'ID_INFORME'); ?>
		<?php echo $form->textField($model,'ID_INFORME',array("class"=>"form-control",'maxlength'=>24)); ?>
		<?php echo $form->error($model,'ID_INFORME'); ?>
	</div>

	<div class="col-md-2">
		<?php echo $form->labelEx($model,'ID_ESTADO'); ?>
		<?php echo $form->textField($model,'ID_ESTADO',array("class"=>"form-control",'maxlength'=>24)); ?>
		<?php echo $form->error($model,'ID_ESTADO'); ?>
	</div>
	
	<div class="col-md-2">
		<?php echo $form->labelEx($model,'VALOR'); ?>
		<?php echo $form->textField($model,'VALOR',array("class"=>"form-control",'maxlength'=>24)); ?>
		<?php echo $form->error($model,'VALOR'); ?>
	</div>
</div>
	<div class="form-group">
		<div class="col-md-offset-4 col-sm-8">
			<?php echo CHtml::submitButton($model->isNewRecord ? ' Crear ' : ' Guardar ',array('class'=>'btn btn-success')); ?>
		</div>
	</div>
		

<?php $this->endWidget(); ?>

</div><!-- form -->