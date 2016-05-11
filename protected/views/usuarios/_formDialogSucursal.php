<div class="form" id="sucDialogForm">
 
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'tech-form',
    'enableAjaxValidation'=>false,
)); 
//I have enableAjaxValidation set to true so i can validate on the fly the
?>
 
    <p class="note">Campos con <span class="required">*</span> son requeridos</p>
 
    <?php echo $form->errorSummary($model); ?>
 
    <div class="form-group">
        <?php echo $form->labelEx($model,'NOMBRES_TECNICO'); ?>
        <?php echo $form->textField($model,'NOMBRES_TECNICO',array("class"=>"form-control",'maxlength'=>64)); ?>
        <?php echo $form->error($model,'NOMBRES_TECNICO'); ?>
    </div>
 
    <div class="form-group">
        <?php echo $form->labelEx($model,'APELLIDOS_TECNICO'); ?>
        <?php echo $form->textField($model,'APELLIDOS_TECNICO',array("class"=>"form-control",'maxlength'=>64)); ?>
        <?php echo $form->error($model,'APELLIDOS_TECNICO'); ?>
    </div>
 
    <div class="form-group buttons">
        <?php echo CHtml::ajaxSubmitButton(Yii::t('tech','Crear Sucursal'),CHtml::normalizeUrl(array('usuarios/nuevaSucursal','render'=>false)),array('success'=>'js: function(data) {
                        $("#Sucursales_ID_SUCURSAL").append(data);
                        $("#sucDialog").dialog("close");
                    }'),array('id'=>'closeSucDialog')); ?>
    </div>
 
<?php $this->endWidget(); ?>
 
</div>