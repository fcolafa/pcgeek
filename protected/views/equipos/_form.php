<?php
/* @var $this EquiposController */
/* @var $model Equipos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'equipos-form',
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
			<?php echo $form->labelEx($model,'ID_TIPOEQUIPO'); ?>
			<!--<?php echo $form->textField($model,'ID_TIPOEQUIPO'); ?>-->
			<?php echo $form->dropDownList($model,'ID_TIPOEQUIPO',CHtml::listData(tipoequipo::model()->findAll(),'ID_TIPOEQUIPO','NOMBRE_TIPOEQUIPO'),array("class"=>"form-control")); ?>
			<?php echo $form->error($model,'ID_TIPOEQUIPO'); ?>
		</div>
		<div class="col-md-3">
			<?php echo $form->labelEx($model,'CODIGO_INVENTARIO'); ?>
			<?php echo $form->textField($model,'CODIGO_INVENTARIO',array("class"=>"form-control", 'cols'=>20)); ?>
			<?php echo $form->error($model,'CODIGO_INVENTARIO'); ?>
		</div>
		<div class="col-md-6">
			<?php echo $form->labelEx($model,'MODELO_EQUIPO'); ?>
			<?php echo $form->textField($model,'MODELO_EQUIPO',array("class"=>"form-control",'maxlength'=>65)); ?>
			<?php echo $form->error($model,'MODELO_EQUIPO'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-4">
			<?php echo $form->labelEx($model,'USUARIO_EQUIPO'); ?>
			<?php echo $form->textField($model,'USUARIO_EQUIPO',array("class"=>"form-control",'maxlength'=>45)); ?>
			<?php echo $form->error($model,'USUARIO_EQUIPO'); ?>
		</div>
		<div class="col-md-3">
			<?php echo $form->labelEx($model,'RUT_PROVEEDOR'); ?>
			<!--<?php //echo $form->textField($model,'RUT_PROVEEDOR',array('size'=>15,'maxlength'=>15)); ?>-->
			<?php echo $form->dropDownList($model,'RUT_PROVEEDOR',CHtml::listData(proveedores::model()->findAll(), 'RUT_PROVEEDOR', 'NOMBRE_PROVEEDOR'),array("class"=>"form-control")); ?>
			<?php echo $form->error($model,'RUT_PROVEEDOR'); ?>
		</div>
		<div class="col-md-3">
			<?php echo $form->labelEx($model,'NUMERO_FACTURA'); ?>
			<?php echo $form->textField($model,'NUMERO_FACTURA',array("class"=>"form-control",'maxlength'=>15)); ?>
			<?php echo $form->error($model,'NUMERO_FACTURA'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-3">
			<?php echo $form->labelEx($model,'FECHA_COMPRA'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
									'name'=>'FECHA_COMPRA',
									'language'=>'es',
									'model'=>$model,
									'attribute'=>'FECHA_COMPRA',
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
			<!--<?php //echo $form->textField($model,'FECHA_COMPRA',array("class"=>"form-control")); ?>-->
			<?php echo $form->error($model,'FECHA_COMPRA'); ?>
		</div>
		<div class="col-md-3">
			<?php echo $form->labelEx($model,'FECHA_BAJA'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
									'name'=>'FECHA_BAJA',
									'language'=>'es',
									'model'=>$model,
									'attribute'=>'FECHA_BAJA',
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
			<!--<?php //echo $form->textField($model,'FECHA_BAJA',array("class"=>"form-control")); ?>-->
			<?php echo $form->error($model,'FECHA_BAJA'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-4">
			<?php echo $form->labelEx($model,'ID_SUCURSAL'); ?>
			<?php echo $form->dropDownList($model,'ID_SUCURSAL',CHtml::listData(sucursales::model()->findAll(),'ID_SUCURSAL','NOMBRE_SUCURSAL'),array("class"=>"form-control")); ?>
			<?php echo $form->error($model,'ID_SUCURSAL'); ?>
		</div>
		<div class="col-md-8">
			<?php echo $form->labelEx($model,'UBICACION_EQUIPO'); ?>
			<?php echo $form->textField($model,'UBICACION_EQUIPO',array("class"=>"form-control",'maxlength'=>65)); ?>
			<?php echo $form->error($model,'UBICACION_EQUIPO'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6">
			<?php echo $form->labelEx($model,'ESTADO_EQUIPO'); ?>
			<?php echo $form->dropDownList($model,'ESTADO_EQUIPO', array('1'=>'Activo','0'=>'Inactivo'),array("class"=>"form-control")); ?>
			<?php echo $form->error($model,'ESTADO_EQUIPO'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-12">
			<?php echo $form->labelEx($model,'OBSV_EQUIPO'); ?>
			<?php echo $form->textArea($model,'OBSV_EQUIPO',array("class"=>"form-control", 'cols'=>40)); ?>
			<?php echo $form->error($model,'OBSV_EQUIPO'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-3 ">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-success')); ?>
		</div>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->