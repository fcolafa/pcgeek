<?php
/* @var $this TecnicosController */
/* @var $model Tecnicos */
/* @var $form CActiveForm */
?>
<?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/Masks.js');?>
<?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/Validates.js');?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tecnicos-form',
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
		<div class="col-md-3 ">
			<?php echo $form->labelEx($model,'RUT_TECNICO', array('class'=>'valida_rut')); ?>
					<?php echo $form->textField($model,'RUT_TECNICO',array('class'=>"form-control",'maxlength'=>13,'text-right','placeholder'=>'Ejemplo: 12345678-9', 'onkeyup' =>"this.value = MaskRut(this.value,true); ValidateRut(this.value);", 'is_numeric'=>"true")) ; ?>
					<?php echo $form->error($model,'RUT_TECNICO'); ?>
		</div>

		<div class="col-md-4">
			<?php echo $form->labelEx($model,'NOMBRES_TECNICO'); ?>
			<?php echo $form->textField($model,'NOMBRES_TECNICO',array("class"=>"form-control",'maxlength'=>64)); ?>
			<?php echo $form->error($model,'NOMBRES_TECNICO'); ?>
		</div>
		<div class="col-md-5">
			<?php echo $form->labelEx($model,'APELLIDOS_TECNICO'); ?>
			<?php echo $form->textField($model,'APELLIDOS_TECNICO',array("class"=>"form-control",'maxlength'=>64)); ?>
			<?php echo $form->error($model,'APELLIDOS_TECNICO'); ?>
		</div>

	</div>

	<div class="form-group">
		<div class="col-md-3">
			<?php echo $form->labelEx($model,'FONO_TECNICO'); ?>
			<?php echo $form->textField($model,'FONO_TECNICO',array("class"=>"form-control",'maxlength'=>24)); ?>
			<?php echo $form->error($model,'FONO_TECNICO'); ?>
		</div>
		<div class="col-md-4">
			<?php echo $form->labelEx($model,'DIRECCION_TECNICO'); ?>
			<?php echo $form->textField($model,'DIRECCION_TECNICO',array("class"=>"form-control",'maxlength'=>64)); ?>
			<?php echo $form->error($model,'DIRECCION_TECNICO'); ?>
		</div>		
		<div class="col-md-5">
			<?php echo $form->labelEx($model,'DESCRIPCION'); ?>
			<?php echo $form->textArea($model,'DESCRIPCION',array("class"=>"form-control", 'rows'=>2, 'cols'=>50)); ?>
			<?php echo $form->error($model,'DESCRIPCION'); ?>
		</div>
	</div>
    
    <div class="form-group">
    <div class="col-md-3">
                <?php echo $form->labelEx($model,'ESTADO'); ?>
            <?php echo $form->dropDownList($model,'ESTADO',array('empty'=>'-Seleccione Estado-','0'=>'Activo','1'=>'Inactivo'),array("class"=>"form-control")) ?>
        </div>
    </div>

	<div class="form-group">
		<div class="col-md-offset-4 col-sm-8">
			<?php echo CHtml::submitButton($model->isNewRecord ? ' Crear ' : ' Guardar ',array('class'=>'btn btn-success')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->