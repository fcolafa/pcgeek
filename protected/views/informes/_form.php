<?php
/* @var $this InformesController */
/* @var $model Informes */
/* @var $form CActiveForm */
// use yii\helpers\ArrayHelper; 
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'informes-form',
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
		<div class="col-md-4">
			<?php 

				$table = Usuarios::model()->find('NOMBRE_USUARIO="'.Yii::app()->user->name.'"');

				if ($table->ID_TECNICO == null || $table->ID_TECNICO == ''){
					echo " No se ha asociado su usuario a un técnico, solicite esto a un administrador del sistema";
					$table->ID_TECNICO=0;
				}

				  echo $form->labelEx($model,'ID_TECNICO');
				  
				  if (Yii::app()->user->A1() || Yii::app()->user->A2())
				  	echo $form->dropDownList($model,'ID_TECNICO', array(''=>'-Seleccione Tecnico-')+CHtml::listData(Tecnicos::model()->findAll(), 'ID_TECNICO', 'nombreCompleto'),array("class"=>"form-control"));
				  else
				  	echo $form->dropDownList($model,'ID_TECNICO', CHtml::listData(Tecnicos::model()->findAllByAttributes(array('ID_TECNICO'=>$table->ID_TECNICO)), 'ID_TECNICO', 'nombreCompleto'),array("class"=>"form-control disabled"));

				  echo $form->error($model,'ID_TECNICO'); ?>
		</div>
 		<div class="col-md-4">
			<?php echo $form->labelEx($model,'ID_CLIENTE'); ?>
			<?php echo $form->dropDownList($model,'ID_CLIENTE', array(''=>'-Seleccione Cliente-')+CHtml::listData(Clientes::model()->findAll(), 'ID_CLIENTE', 'NOMBRE_CLIENTE'),array('id'=>'cb_clientes', 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'ID_CLIENTE'); ?>
		</div>
		<!-- select sucursal dependiente de clientes    -->
		<?php if ($model->ID_SUCURSAL>0) echo "<div id='div_sucursal' class='col-md-4'>"; else echo "<div id='div_sucursal' style='display: none;' class='col-md-4'>";
				echo $form->labelEx($model,'ID_SUCURSAL');
				if ($model->ID_SUCURSAL>0)
					echo $form->dropDownList($model,'ID_SUCURSAL', array('0'=>'-Seleccione Sucursal-')+CHtml::listData(Sucursales::model()->findAllByAttributes(array('ID_CLIENTE'=>$model->ID_CLIENTE)), 'ID_SUCURSAL', 'NOMBRE_SUCURSAL') ,array('id'=>'cb_sucursales', 'class'=>'form-control'));
				else
					echo $form->dropDownList($model,'ID_SUCURSAL', array() ,array('id'=>'cb_sucursales', 'class'=>'form-control'));
				echo $form->error($model,'ID_SUCURSAL');
		?>
		</div>
		<p id='reportarerror' style='color: red;'></p>
	</div>

	<div class="form-group">
        
        <div class="col-md-4">
			<?php echo $form->labelEx($model,'ID_UBICACION'); ?>
			<?php echo $form->dropDownList($model,'ID_UBICACION', array(''=>'-Seleccione Ubicacion-')+CHtml::listData(Ubicaciones::model()->findAll(), 'ID_UBICACION', 'UBICACION'),array('id'=>'cb_ubicacions', 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'ID_UBICACION'); ?>
		</div>
        
		<div class="col-md-2">
			<?php echo $form->labelEx($model,'FECHA_INGRESO'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'name'=>'FECHA_INGRESO',
								'language'=>'es',
								'model'=>$model,
								'attribute'=>'FECHA_INGRESO',
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
			<?php echo $form->error($model,'FECHA_INGRESO'); ?>
		</div>
		<div class="col-md-2">
			<?php echo $form->labelEx($model,'HORA_INGRESO'); ?>
			<?php echo $form->textField($model,'HORA_INGRESO',array("class"=>"form-control",'maxlength'=>5)); ?>
			<?php echo $form->error($model,'HORA_INGRESO'); ?>
		</div>
		<div class="col-md-2">
			<?php echo $form->labelEx($model,'HORA_SALIDA'); ?>
			<?php echo $form->textField($model,'HORA_SALIDA',array("class"=>"form-control",'maxlength'=>5)); ?>
			<?php echo $form->error($model,'HORA_SALIDA'); ?>
		</div>
	</div>

		<?php
			//var_dump($model_visitas);
			$model->detalleInforme = $model_visitas;
			//$list = $model_visitas;
			$la_previa="M"; // M=Mantenciones, I=Instalaciones, U=Urgencias
			$la_actual="M";

			echo "<div class=\"row\">";
			foreach ($model_visitas as $v) {
				$la_actual = $v->TIPO_VISITA;
				if($la_actual != $la_previa){
					$la_previa = $la_actual;
					echo "</div><div class=\"form-group\">";
					if ($la_actual=="M") {
						echo "<h4  class=\"text-center bg-success\">Mantenciones</h4>";
					} elseif ($la_actual=="I") {
						echo "<h4  class=\"text-center bg-info\">Instalaciones</h4>";
					} elseif ($la_actual=="U") {
						echo "<h4 class=\"text-center bg-danger\">Urgencias</h4>";
					} elseif ($la_actual=="R") {
						echo "<h4 class=\"text-center bg-info\">Retiro Equipos</h4>";
					} elseif ($la_actual=="E") {
						echo "<h4 class=\"text-center bg-success\">Entrega Equipos</h4>";
					}else {
						echo "<h4 class=\"text-center bg-warning\">Otras</h4>";
					}

					if (in_array($v->ID_VISITA, $model_detalle)) {
						echo "<div class=\"col-md-3\"><input type=\"checkbox\" name=\"detalleInforme[]\" value=\"".$v->ID_VISITA."\" checked/> ".$v->NOMBRE_VISITA."</div>";
					}else{
						echo "<div class=\"col-md-3\"><input type=\"checkbox\" name=\"detalleInforme[]\" value=\"".$v->ID_VISITA."\" /> ".$v->NOMBRE_VISITA."</div>";
					}
				}else{
					if (in_array($v->ID_VISITA, $model_detalle)) {
						echo "<div class=\"col-md-3\"><input type=\"checkbox\" name=\"detalleInforme[]\" value=\"".$v->ID_VISITA."\" checked/> ".$v->NOMBRE_VISITA."</div>";
					}else{
						echo "<div class=\"col-md-3\"><input type=\"checkbox\" name=\"detalleInforme[]\" value=\"".$v->ID_VISITA."\" /> ".$v->NOMBRE_VISITA."</div>";
					}
			    }
			}
			echo "</div><br>";

		?>
	<div class="form-group">
		<div class="col-md-7">
			<?php echo $form->labelEx($model,'OBSERVACIONES'); ?>
			<?php echo $form->textArea($model,'OBSERVACIONES',array("class"=>"form-control", 'rows'=>3, 'cols'=>50)); ?>
			<?php echo $form->error($model,'OBSERVACIONES'); ?>
		</div>
		<div class="col-md-5">
			<?php echo $form->labelEx($model,'IMAGEN');
				  echo CHtml::activeFileField($model, 'IMAGEN',array("class"=>"form-control"));
				  echo $form->error($model,'IMAGEN'); ?>
		</div>
	</div>	

	<div class="form-group">
		<div class="col-md-offset-4 col-sm-8">
			<?php echo CHtml::submitButton($model->isNewRecord ? ' Crear ' : ' Guardar ',array('class'=>'btn btn-success')); ?>
		</div>
	</div>

	<div class="row">
		<?php if(!empty($model->IMAGEN)){
						$this->widget('zii.widgets.CMenu', array(
				                'htmlOptions'=>array('class'=>'pull-right nav'),
				                'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
				                'itemCssClass'=>'item-test',
				                'encodeLabel'=>false,
				                'items' => array(
				                        array('label' => '<img src='.'"'. Yii::app()->theme->baseUrl.'/img/small_icons/attach.png" title="Ver Archivo" width="25" /> Ver Archivo', 'url' => "http://".$_SERVER["SERVER_NAME"].Yii::app()->request->baseUrl."/archivos/informes/".$model->IMAGEN),
				                ),
				            ));
					}
		?>
	</div>


	<?php /*if($model->isNewRecord!='1'){
		echo "<div id=\"la_imagen\" >";
		echo "<h3>Imagen existente </h3><div>";
		echo CHtml::image(Yii::app()->request->baseUrl.'/archivos/informes/'.$model->IMAGEN,"sin imagen",array("class"=>"img-thumbnail"));
		echo "</div></div>";
	}*/?>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>  
  
    $(function() { //script para la imagen
	    $( "#la_imagen" ).accordion({
	    	collapsible: true,
	    	active: 2
	    });
	});

    //script para cargar las sucursales del cliente 

  	$('#cb_clientes').change(function(){
    
	    var idcliente = $(this).val(); // el "value" del <option> seleccionado

	    if(idcliente == 0) {
	      $('#div_sucursal').hide('slow');
	      return;
	    }

	    var action = 'index.php?r=informes/ObtenerSucursales&idCliente='+idcliente;

	    $('#reportarerror').html("");

	    $.getJSON(action, function(listaJson) {

	    	$('#cb_sucursales').find('option').each(function(){ $(this).remove(); });

	    	$.each(listaJson, function(key, sucursal) {
	        	$('#cb_sucursales').append("<option value='"+sucursal.ID_SUCURSAL+"'>"+sucursal.NOMBRE_SUCURSAL+"</option>");
	    	});	        
	      	
	    	$('#div_sucursal').show('slow');

	    }).error(function(e){ $('#reportarerror').html(e.responseText); });

  	});
 
</script>