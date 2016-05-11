<?php
/* @var $this CanalCamarasController */
/* @var $model CanalCamaras */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'canal-camaras-form',
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
			<?php echo $form->labelEx($model,'ID_SUCURSAL'); ?>
			<?php echo $form->dropDownList($model,'ID_SUCURSAL',CHtml::listData(Sucursales::model()->findAll(),'ID_SUCURSAL','nombreCompleto'),array("class"=>"form-control")); ?>
			<!--<?php //echo $form->textField($model,'ID_SUCURSAL',array("class"=>"form-control")); ?>-->
			<?php echo $form->error($model,'ID_SUCURSAL'); ?>
		</div>
		<div class="col-md-2">
			<?php echo $form->labelEx($model,'NUM_CAMARA'); ?>
			<?php echo $form->textField($model,'NUM_CAMARA',array("class"=>"form-control")); ?>
			<?php echo $form->error($model,'NUM_CAMARA'); ?>
		</div>
		<div class="col-md-4">
				<?php echo $form->labelEx($model,'FECHA_CAMBIO_CAMARA'); ?>
				<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
										'name'=>'FECHA_CAMBIO_CAMARA',
										'language'=>'es',
										'model'=>$model,
										'attribute'=>'FECHA_CAMBIO_CAMARA',
										'flat'=>false,
										//'value' => '2015/07/14',
			   				 // additional javascript options for the date picker plugin
										'options'=>array(
											'showAnim'=>'fold',
											'constrainInput'=>true,
											//'buttonImage'=>Yii::app()->baseUrl.'/images/Iconos/calendario.png', 'buttonImageOnly'=>true, 'showButtonPanel'=>true, 'showOn'=>'both',
			       				// 'showOn'=>'both',
											'currentText'=>'2015/07/14',
											'dateFormat'=>'yy-mm-dd',
											),
										'htmlOptions'=>array("class"=>"form-control"),
										));
					?>
				<!--<?php //echo $form->textField($model,'FECHA_CAMBIO_CAMARA'); ?>-->
				<?php echo $form->error($model,'FECHA_CAMBIO_CAMARA'); ?>
			</div>
	</div>

	<div class="form-group">
		<div class="col-md-8">
			<?php echo $form->labelEx($model,'UBICACION_CAMARA'); ?>
			<?php echo $form->textField($model,'UBICACION_CAMARA',array("class"=>"form-control",'maxlength'=>50)); ?>
			<?php echo $form->error($model,'UBICACION_CAMARA'); ?>
		</div>
		<div class="col-md-4">
			<?php echo $form->labelEx($model,'ESTADO_CAMARA'); ?>
			<?php echo $form->DropdownList($model,'ESTADO_CAMARA',array('1'=>'Activo','2'=>'Inactivo'),array("class"=>"form-control"));?>
			<?php echo $form->error($model,'ESTADO_CAMARA'); ?>
		</div>		
	</div>

	<div class="form-group">
		<div class="col-md-12">
			<?php echo $form->labelEx($model,'OBSERVACION_CAMARA'); ?>
			<?php echo $form->textField($model,'OBSERVACION_CAMARA',array("class"=>"form-control",'maxlength'=>255)); ?>
			<?php echo $form->error($model,'OBSERVACION_CAMARA'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-offset-2 col-md-10 ">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-success')); ?>
		</div>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->