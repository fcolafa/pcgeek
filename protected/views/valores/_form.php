<?php
/* @var $this ValoresController */
/* @var $model Valores */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'valores-form',
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
			<?php echo $form->labelEx($model,'UBICACION'); ?>
			<?php echo $form->dropDownList($model,'ID_UBICACION', array(''=>'-Seleccione Ubicacion-')+CHtml::listData(Ubicaciones::model()->findAll(), 'ID_UBICACION', 'UBICACION'),array('id'=>'cb_ubicacions', 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'ID_UBICACION'); ?>
		</div>
        
		<div class="col-md-4">
			<?php echo $form->labelEx($model,'VISITA'); ?>
			<?php echo $form->dropDownList($model,'ID_VISITA', array(''=>'-Seleccione Visita-')+CHtml::listData(Visitas::model()->findAll(array('order'=>'TIPO_VISITA')), 'ID_VISITA', 'tipoDescripcion'),array('id'=>'cb_visitas', 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'ID_VISITA'); ?>
		</div>
        
      <div class="form-group">  
	<div class="col-md-4">
			<?php echo $form->labelEx($model,'VALOR'); ?>
			<?php echo $form->textField($model,'VALOR',array("class"=>"form-control", 'maxlength'=>64)); ?>
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