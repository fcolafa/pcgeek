<?php
/* @var $this UbicacionesController */
/* @var $model Ubicaciones */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ubicaciones-form',
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
                <?php echo $form->labelEx($model,'REGION'); ?>
            <?php echo $form->dropDownList($model,'REGION',array('empty'=>'Region','1'=>'I TARAPACA','2'=>'II ANTOFAGASTA','3'=>'III        ATACAMA','4'=>'IV COQUIMBO','5'=>'V VALPARAISO',"6"=>"VI O'HIGGINS",'7'=>'VII MAULE','8'=>'VIII BIO BIO','9'=>'IX ARAUCANIA','10'=>'X LOS LAGOS','11'=>'XI AYSEN','12'=>' XII MAGALLANES','13'=>'XIII ARICA Y PARINACOTA','14'=>'XIV LOS RIOS','RM'=>'RM SANTIAGO'),array("class"=>"form-control")) ?>
                <?php echo $form->error($model,'REGION'); ?>
        </div>

	<div class="col-md-6">
		<?php echo $form->labelEx($model,'UBICACION'); ?>
		<?php echo $form->textField($model,'UBICACION',array("class"=>"form-control", 'maxlength'=>50)); ?>
		<?php echo $form->error($model,'UBICACION'); ?>
	</div>
</div>
	<div class="form-group">
		<div class="col-md-offset-4 col-sm-8">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-success')); ?>
		</div>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->