<?php
/* @var $this TicketController */
/* @var $model Ticket */
/* @var $form CActiveForm */
?>
<?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/Masks.js');?>
<?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/Validates.js');?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ticket-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
)); ?>

	<p class="note"> <?php echo Yii::t('validation','Fields with')?> <span class="required">*</span> <?php echo Yii::t('validation','are required')?> </p>

	<?php echo $form->errorSummary($model); ?>
    <div class="form-group">
        
        <div class="col-md-4"> 
                <?php echo $form->labelEx($model,'ticket_subject'); ?>
		<?php echo $form->textField($model,'ticket_subject',array('size'=>45,'maxlength'=>45,"class"=>"form-control")); ?>
		<?php echo $form->error($model,'ticket_subject'); ?>
	</div>
        <div class="col-md-4">
		<?php echo $form->labelEx($model,'id_classification'); ?>
		<?php echo $form->dropDownList($model,'id_classification',  CHtml::listData(Classification::model()->findAll(), 'id_classification', 'classification_name'),array('prompt'=>'Seleccione Categoria',"class"=>"form-control")); ?>
		<?php echo $form->error($model,'id_classification'); ?>
	</div>
          <div class="col-md-4">
        <?php echo $form->labelEx($model,'ticket_date_incident'); ?>
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
        $this->widget('CJuiDateTimePicker',array(
        'model'=>$model, //Model object
        'attribute'=>'ticket_date_incident', //attribute name
               'mode'=>'datetime', //use "time","date" or "datetime" (default)
        'options'=>array(
            'dateFormat'=>'dd-mm-yy',
            'maxDate' => 'today',
         
           
          
        ),
            'htmlOptions'=>array(
                'class'=>'col-md-12'
)// jquery plugin options
    ));
        
?>
     <?php echo $form->error($model,'ticket_date_incident'); ?>
	</div>
    </div>
       
        <div class="form-group">
        <div class="col-md-12">
		<?php echo $form->labelEx($model,'ticket_description'); ?>
		<?php echo $form->textArea($model,'ticket_description',array('rows'=>6, 'cols'=>50,"class"=>"form-control")); ?>
		<?php echo $form->error($model,'ticket_description'); ?>
	</div>
        
    </div>

        


        <div class="form-group">
                <div class="col-md-8" >
		<?php echo $form->labelEx($model,'_files'); ?>
		<?php echo $form->dropDownList($model,'_files',$model->_files ,array("class"=>"form-control",'multiple' => 'multiple')); ?>
		<?php echo $form->error($model,'_files'); ?>
	</div>
        <div class="col-md-4 _up" >
           
        <?php 
        
        $this->widget('ext.EFineUploader.EFineUploader',
         array(
               'id'=>'FineUploader',
             
               'config'=>array(
                   'autoUpload'=>true,
                   'multiple'=> true,
                
                  
        
                               'request'=>array(
                                  'endpoint'=>'upload',// OR $this->createUrl('files/upload'),
                                  'params'=>array('YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken),
                                               ),
                               'retry'=>array('enableAuto'=>true,'preventRetryResponseProperty'=>true),
                               'chunking'=>array('enable'=>true,'partSize'=>100),//bytes
                               'callbacks'=>array(
                                                //'onComplete'=>"js:function(id, name, response){ $('li.qq-upload-success').remove(); }",
                                                //'onError'=>"js:function(id, name, errorReason){ }",
                                                 ),
                               'validation'=>array(
                                         'allowedExtensions'=>array('pdf','jpg','jpeg','png','txt','rtf','doc','docx','xls','xlsx','gif','ppt','pptx'),
                                         'sizeLimit'=>5 * 1024 * 1024,//maximum file size in bytes
                                       //  'minSizeLimit'=>0*1024*1024,// minimum file size in bytes
                                                  ),
                   'callbacks'=>array(
          'onComplete'=>"js:function(id, name, response){
             $('#Ticket__files').append(new Option(response.filename, response.filename, true, true));
             
           }",
           'onError'=>"js:function(id, name, errorReason){ }",
          'onValidateBatch' => "js:function(fileOrBlobData) {}", // because of crash
        ),
                              )
              ));

        ?>
        </div>
        </div>
        
 <div class="form-group">        
         <div class="col-md-6">
            <?php $this->widget('CCaptcha'); ?>
        </div>

        <div class="col-md-6">
                <?php echo $form->labelEx($model,'_verifyCode'); ?>
               <?php echo $form->textField($model,'_verifyCode',array("class"=>"form-control")); ?>
               <?php echo $form->error($model,'_verifyCode'); ?>
        </div>
</div>
        
<div class="form-group">
		<div class="col-md-offset-4 col-sm-8">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('actions','Create') : Yii::t('actions','Save'),array('class'=>'btn btn-success')); ?>
	</div>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->