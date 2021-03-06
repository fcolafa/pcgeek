<?php
/* @var $this TicketMessageController */
/* @var $model TicketMessage */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ticket-remedy-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
)); ?>

	<p class="note"> <?php echo Yii::t('validation','Fields with')?> <span class="required">*</span> <?php echo Yii::t('validation','are required')?> </p>

	<?php echo $form->errorSummary($ticketm); ?>
        
	<div class="form-group">
            <div class="col-md-12">
		<?php echo $form->labelEx($ticketm,'ticket_message'); ?>
		<?php echo $form->textArea($ticketm,'ticket_message',array('rows'=>6, 'cols'=>50,'class'=>"form-control")); ?>
		<?php echo $form->error($ticketm,'ticket_message'); ?>
            </div>
	</div>
       <div class="form-group">
            <div class="col-md-6 " >
		<?php echo $form->labelEx($ticketm,'_message_files'); ?>
		<?php echo $form->dropDownList($ticketm,'_message_files',$ticketm->_message_files ,array('multiple' => 'multiple','class'=>"form-control")); ?>
		<?php echo $form->error($ticketm,'_message_files'); ?>
	</div>
        
        <?php $ticketm->ticket_message_type='remedy' ?>
         
     <div class="col-md-6 _up" >
          
        <?php 

        $this->widget('ext.EFineUploader.EFineUploader',
         array(
               'id'=>'ticket_remedy',
               'config'=>array(
                               'autoUpload'=>true,
                               'request'=>array(
                                  'endpoint'=>$this->createUrl('ticket/upload'),// OR $this->createUrl('files/upload'),
                                  'params'=>array('YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken),
                                               ),
                               'retry'=>array('enableAuto'=>true,'preventRetryResponseProperty'=>true),
                               'chunking'=>array('enable'=>true,'partSize'=>100),//bytes
                               'callbacks'=>array(
                                               // 'onComplete'=>"js:function(id, name, response){ alert('ñe'); }",
                                                //'onError'=>"js:function(id, name, errorReason){ }",
                                                 ),
                               'validation'=>array(
                                        'allowedExtensions'=>array('pdf','jpg','jpeg','png','txt','rtf','doc','docx','xls','xlsx','gif','ppt','pptx'),
                                         'sizeLimit'=>5 * 1024 * 1024,//maximum file size in bytes
                                       //  'minSizeLimit'=>0*1024*1024,// minimum file size in bytes
                                                  ),
                   'callbacks'=>array(
          'onComplete'=>"js:function(id, name, response){
              if(response.filename!=null)
             $('#TicketMessage__message_files').append(new Option(response.filename, response.filename, true, true));
           }",
           //'onError'=>"js:function(id, name, errorReason){ }",
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
               <?php echo $form->labelEx($ticketm,'_verifyCode'); ?>
               <?php echo $form->textField($ticketm,'_verifyCode'); ?>
               <?php echo $form->error($ticketm,'_verifyCode'); ?>
             </div>
        </div>
       
	<div class="row buttons">
		<?php echo CHtml::submitButton($ticketm->isNewRecord ? Yii::t('actions','Send') : Yii::t('actions','Save'),array('class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->