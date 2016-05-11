<div class="form" id="techDialogForm">
 
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
        <?php echo CHtml::ajaxSubmitButton(Yii::t('tech','Crear Técnico'),CHtml::normalizeUrl(array('usuarios/nuevoTecnico','render'=>false)),array('success'=>'js: function(data) {
                        $("#Usuarios_ID_TECNICO").append(data);
                        $("#techDialog").dialog("close");
                    }'),array('id'=>'closeTechDialog')); ?>
    </div>
 
<?php $this->endWidget(); ?>
 
</div>