<?php
/* @var $this IncidentesController */
/* @var $model Incidentes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'incidentes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data', 'class'=>'form-horizontal'),
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>
<div class="form-group">

		<!--<div class="col-md-4">
			<?php //echo $form->labelEx($model,'ID_CLIENTE'); ?>
			<?php //echo $form->dropDownList($model,'ID_CLIENTE', array(''=>'-Seleccione Cliente-')+CHtml::listData(Clientes::model()->findAll(), 'ID_CLIENTE', 'NOMBRE_CLIENTE'),array('id'=>'cb_clientes', 'class'=>'form-control')); ?>
			<?php //echo $form->error($model,'ID_CLIENTE'); ?>
		</div>-->
		<div class="col-md-6">
			<?php echo $form->labelEx($model,'ID_SUCURSAL'); ?>
			<?php echo $form->dropDownList($model,'ID_SUCURSAL',CHtml::listData(Sucursales::model()->findAll(),'ID_SUCURSAL','nombreCompleto'),array('id'=>'cb_sucursal',"class"=>"form-control")); ?>
			<!--<?php //echo $form->textField($model,'ID_SUCURSAL',array("class"=>"form-control")); ?>-->
			<?php echo $form->error($model,'ID_SUCURSAL'); ?>
		</div>
	<!-- select sucursal dependiente de clientes    -->
	<?php if ($model->ID_CANALCAMARAS>0) echo "<div id='div_camaras' class='col-md-6'>"; else echo "<div id='div_camaras' style='display: none;' class='col-md-4'>";
				echo $form->labelEx($model,'UBICACION_CAMARA');
				if ($model->ID_CANALCAMARAS>0)
					echo $form->dropDownList($model,'ID_CANALCAMARAS', array(''=>'-Seleccione Ubicacion-')+CHtml::listData(CanalCamaras::model()->findAllByAttributes(array('ID_SUCURSAL'=>$model->ID_SUCURSAL)), 'ID_CANALCAMARAS', 'UBICACION_CAMARA') ,array('id'=>'cb_camaras','class'=>'form-control'));
				else
					echo $form->dropDownList($model,'ID_CANALCAMARAS', array() ,array('id'=>'cb_camaras', 'class'=>'form-control'));
				echo $form->error($model,'ID_CANALCAMARAS');
		?>
		</div>
</div>
<div class="form-group">
	<div class="col-md-2">
		<?php echo $form->labelEx($model,'FECHA_INCIDENTE'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'name'=>'FECHA_INCIDENTE',
								'language'=>'es',
								'model'=>$model,
								'attribute'=>'FECHA_INCIDENTE',
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
		<!--<?php //echo $form->textField($model,'FECHA_INCIDENTE',array("class"=>"form-control")); ?>-->
		<?php echo $form->error($model,'FECHA_INCIDENTE'); ?>
	</div>
	<div class="col-md-2">
		<?php echo $form->labelEx($model,'HORA_INCIDENTE'); ?>
		<?php echo $form->timeField($model,'HORA_INCIDENTE',array("class"=>"form-control")); ?>
		<?php echo $form->error($model,'HORA_INCIDENTE'); ?>
	</div>
	<div class="col-md-3">
		<?php echo $form->labelEx($model,'ID_TIPO_INCIDENTE'); ?>
		<?php echo $form->dropDownList($model,'ID_TIPO_INCIDENTE',CHtml::listData(TipoIncidente::model()->findAll(),'ID_TIPO_INCIDENTE','NOMBRE_TIPO_INCIDENTE'),array("class"=>"form-control")); ?>
		<?php echo $form->error($model,'ID_TIPO_INCIDENTE'); ?>
	</div>
	<div class="col-md-4">
		<?php echo $form->labelEx($model,'IMAGEN'); ?>
		<?php echo CHtml::activeFileField($model,'image',array("class"=>"form-control")); ?>
		<?php echo $form->error($model,'IMAGEN'); ?>
	</div>
</div>
<div class="form-group">
	<div class="col-md-12">
		<?php echo $form->labelEx($model,'DESCRIPCION_INCIDENTE'); ?>
		<?php echo $form->textArea($model,'DESCRIPCION_INCIDENTE',array("class"=>"form-control")); ?>
		<?php echo $form->error($model,'DESCRIPCION_INCIDENTE'); ?>
	</div>
</div>
<?php if($model->isNewRecord!='1'){?>
	<div class="row">
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/'.$model->IMAGEN,'IMAGEN',array("width"=>200)); } ?> 
	</div>

<div class="form-group">
	<div class="col-md-offset-1 col-md-11">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-success')); ?>
	</div>
</div>

	

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
//script para cargar las ubicaciones de camaras de la suscursal 

  	$('#cb_sucursal').change(function(){
    
	    var idsucursal = $(this).val(); // el "value" del <option> seleccionado

	    if(idsucursal  == 0) {
	      $('#div_camaras').hide('slow');
	      return;
	    }

	    var action = 'ObtenerCamaras?idSucursal='+idsucursal ;

	    $('#reportarerror').html("");

	    $.getJSON(action, function(listaJson) {

	    	$('#cb_camaras').find('option').each(function(){ $(this).remove(); });

	    	$.each(listaJson, function(key, canal) {
	        	$('#cb_camaras').append("<option value='"+canal.ID_CANALCAMARAS+"'>"+canal.UBICACION_CAMARA+"</option>");
	    	});	        
	      	
	    	$('#div_camaras').show('slow');

	    }).error(function(e){ $('#reportarerror').html(e.responseText); });

  	});

 
</script>