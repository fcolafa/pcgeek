<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuarios-form',
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
			<?php echo $form->labelEx($model,'COD_TIPO_USUARIO'); ?>
			<?php echo $form->dropDownList($model,'COD_TIPO_USUARIO', CHtml::listData(TipoUsuario::model()->findAll(), 'COD_TIPO_USUARIO', 'TIPO_USUARIO'), array('prompt'=>'Seleccione tipo de Usuario', 'id'=>'cb_tipo_usuario', 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'COD_TIPO_USUARIO'); ?>
		</div>		
		<div class="col-md-4">
			<?php echo $form->labelEx($model,'NOMBRE_USUARIO'); ?>
			<?php echo $form->textField($model,'NOMBRE_USUARIO',array("class"=>"form-control", 'maxlength'=>50)); ?>
			<?php echo $form->error($model,'NOMBRE_USUARIO'); ?>
		</div>
            
                <div  class="col-md-4">
			<?php echo $form->labelEx($model,'EMAIL_USUARIO'); ?>
			<?php echo $form->textField($model,'EMAIL_USUARIO', array( 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'EMAIL_USUARIO'); ?>
		</div>
                
	</div>
        <div class="form-group">
             <?php
             
             if(!$model->isNewRecord){
             if(Yii::app()->user->getUser_Id()==$model->ID_USUARIO ){ ?>
                <div class="col-md-4">
                    <?php echo $form->labelEx($model,'_PASSANTIGUA'); ?>
                    <?php echo $form->passwordField($model,'_PASSANTIGUA',array("class"=>"form-control", 'maxlength'=>50)); ?>
                    <?php echo $form->error($model,'_PASSANTIGUA'); ?>
                </div>
                 <?php } ?>
		<div class="col-md-4">
			<?php echo $form->labelEx($model,'CONTRASENA'); ?>
			<?php echo $form->passwordField($model,'CONTRASENA',array("class"=>"form-control", 'maxlength'=>50)); ?>
			<?php echo $form->error($model,'CONTRASENA'); ?>
		</div>
               <div class="col-md-4">  
             <?php echo $form->label($model,'_RPT_CONTRASENA'); ?>    
             <?php echo $form->passwordField($model,'_RPT_CONTRASENA',array("class"=>"form-control", 'maxlength'=>50)); ?>    
             <?php echo $form->error($model,'_RPT_CONTRASENA'); } ?> 
        </div>
        </div>

	<div id="tecnico_cliente" class="form-group">
		<div id="tecnicos" class="col-md-4">
			<?php echo $form->labelEx($model,'ID_TECNICO'); ?>
			<?php echo CHtml::ajaxLink(Yii::t('tech','Crear nuevo técnico'),$this->createUrl('usuarios/nuevoTecnico'),array(
									        'onclick'=>'$("#techDialog").dialog("open"); return false;',
									        'update'=>'#techDialog'
									        ),array('id'=>'showTechDialog'));?>
				<div id="techDialog"></div>

			<?php echo $form->dropDownList($model,'ID_TECNICO', CHtml::listData(Tecnicos::model()->findAll(), 'ID_TECNICO', 'nombreCompleto'), array('prompt'=>'Seleccione un Tecnico', 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'ID_TECNICO'); ?>
		</div>
		<div id= "clientes" class="col-md-4">
			<?php echo $form->labelEx($model,'ID_CLIENTE'); ?>
			<?php //echo CHtml::ajaxLink(Yii::t('suc','Crear nuevo cliente'),$this->createUrl('usuarios/nuevaSucursal'),array(
				  //					        'onclick'=>'$("#sucDialog").dialog("open"); return false;',
				  //					        'update'=>'#sucDialog'
				  //					        ),array('id'=>'showSucDialog'));?>
				<div id="sucDialog"></div>

			<?php echo $form->dropDownList($model,'ID_CLIENTE', CHtml::listData(Clientes::model()->findAll(), 'ID_CLIENTE', 'NOMBRE_CLIENTE'), array('prompt'=>'o seleccione un Cliente', 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'ID_CLIENTE'); ?>
		</div>
		
            
	</div>
        <br>
	<div class="form-group">
		<div class="col-md-offset-4 col-sm-8">
			<?php echo CHtml::submitButton($model->isNewRecord ? ' Crear ' : ' Guardar ',array('class'=>'btn btn-success')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


<script>
    //script para mostrar u ocultar tecnicos y clientes

  	$('#cb_tipo_usuario').change(function(){
    
	    var tipoUsuario = $(this).val(); // el "value" del <option> seleccionado

	    if(tipoUsuario == 'C1') {
	    	$('#tecnico_cliente').show('slow');
	      	$('#clientes').show('slow');
	      	$('#tecnicos').hide('slow');
	    } else if(tipoUsuario == 'T1') {
	    	$('#tecnico_cliente').show('slow');
	    	$('#clientes').hide('slow');
	    	$('#tecnicos').show('slow');
	    } else{
	    	$('#tecnico_cliente').hide('slow');
		}

  	});
 
</script>