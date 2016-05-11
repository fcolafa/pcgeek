<?php

class TicketController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
           public function actions(){

        return array(
            'captcha'=>array(
               'class'=>'CaptchaExtendedAction',
                'mode'=>CaptchaExtendedAction::MODE_MATH,
            ),
        );
    }

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			//R
		
			
			
			
			array('allow',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
            $model=$this->loadModel($id);
            $ticketm=new TicketMessage;
          
            $userasigned=new CDbCriteria();
            $userasigned->condition='id_ticket='.$id.' and id_user_asigned='.Yii::app()->user->getUser_Id();
            $messages=  TicketMessage::model()->findAll($userasigned);
            
             if(!Yii::app()->user->A1()&&Yii::app()->user->getUser_Id()!=$model->id_user&&!$messages){
                       throw new CHttpException(404, 'Usted no esta autorizado para realizar esta acción.');
             }
            if(isset($_POST['Ticket'])){
                $model->attributes=$_POST['Ticket'];
             
                if($model->save()){
                  $this->redirect(array('view','id'=>$model->id_ticket));
                }
            }
            $status=$model->ticket_status;
            if( Yii::app()->user->A1()&& $status=="Nuevo"){
                $model->ticket_status="En Curso";
                $model->save(false);
            }
      
            $this->render('view',array(
                    'model'=>$model,
                    'ticketm'=>$ticketm,
            ));
	
        }
         public function actionDeleteOldFile($tempFolder=null,$token){
            $cont=0;
            if($token=="PDS4WaMD"){
                if($tempFolder==null)
                    $tempFolder=Yii::getPathOfAlias('webroot').'/images/temp/'; 
            
           $dir = opendir($tempFolder);
                while($f = readdir($dir)){
                if((time()-filemtime($tempFolder.$f) >= 3600*4*2) and !(is_dir($tempFolder.$f)))
                    unlink($tempFolder.$f);
                }
            closedir($dir);
            
            }
           
        }
           public function actionCloseTicket($id){
            $ticket=$this->loadModel($id);
            $ticket->ticket_status="Cerrado";
            $ticket->ticket_close_date=date("y-m-d H:i:s");
            $ticket->save(false);
            $this->redirect(array('view', 'id'=>$id));  
        }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Ticket;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		if(isset($_POST['Ticket']))
		{
			$model->attributes=$_POST['Ticket'];
                        $model->id_user=Yii::app()->user->getUser_Id();
                        $model->ticket_date= date("y-m-d H:i:s");
                        $model->ticket_status='Nuevo';
                        if(!empty($model->ticket_date_incident))
                            $model->ticket_date_incident=Yii::app()->dateFormatter->format('yyyy-MM-dd HH:mm', $model->ticket_date_incident);
                            //$model->ticketFiles=$_POST['Ticket']['_files'];
                            
                        if(isset($_POST['Ticket']['_files']))
                            $model->_files=$_POST['Ticket']['_files'];
                       
                        if($model->save()){
                            $tempFolder=Yii::getPathOfAlias('webroot').'/images/temp/'; 
                            $newFolder=Yii::getPathOfAlias('webroot').'/images/tickets/'; 
                            if(!empty($model->_files)){
                                $folder=$newFolder."/".$model->id_ticket;
                                if(!file_exists($folder))
                                    mkdir($folder,0777,true); 
                                foreach($model->_files as $file){
                                    if(file_exists($tempFolder.$file)){
                                        $ticketfile=new TicketFile;
                                        $ticketfile->id_ticket=$model->id_ticket;
                                        $ticketfile->ticket_file_name=$file;
                                        $ticketfile->save();
                                        copy($tempFolder.$ticketfile->ticket_file_name,$folder."/".$ticketfile->ticket_file_name);        
                                    } 
                                }
                            }
                            $body='Se ha generado un nuevo Ticket que requiere su Atención';
                            $this->sendMail($model, 'Ticket Nº'.$model->id_ticket,'Ticket Emitido',$body, 'body_ticket','message');
                                    
       
				$this->redirect(array('view','id'=>$model->id_ticket));
                        }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
        private function sendMail($model, $subject,$title,$body,$view,$type=null,$content=null)
	{
	
                $mail=Yii::app()->Smtpmail;
                $mail->SMTPDebug = false;
                $mail->CharSet = 'UTF-8';
                $mail->SetFrom('cnavarro@pcgeek.cl', 'Sistema Web PCGeek');
                $mail->Subject = $subject;
                $mail->MsgHTML(Yii::app()->controller->renderPartial($view, array('model'=>$model,'title'=>$title,'body'=>$body,'content'=>$content),true));
                if($type=='message'&& !empty($model->id_user_asigned))              
                    $mail->AddAddress($model->idUsera->EMAIL_USUARIO, $subject);
                elseif($type=='message'||$type=='remedya'||$type=='remedyr'||$type=='messageClient'||$type='daypassed')
                {
                    $criteria=new CDbCriteria();
                    $criteria->condition="COD_TIPO_USUARIO='A1'";
                    $users= Usuarios::model()->findAll($criteria);
                    foreach($users as $u){
                        $mail->AddAddress($u->EMAIL_USUARIO, $subject);
                    }
                }elseif($type=='remedy')  
                    $mail->AddAddress($model->idUser->EMAIL_USUARIO, $subject); 
                if(!$mail->Send()) 
                    Yii::app()->user->setFlash('error',Yii::t('validation','Error al enviar correo Electronico'));
                else 
                    Yii::app()->user->setFlash('success',Yii::t('validation','Notificación enviada por Correo Electronico'));

	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ticket']))
		{
			$model->attributes=$_POST['Ticket'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_ticket));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Ticket');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Ticket('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ticket']))
			$model->attributes=$_GET['Ticket'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Ticket the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Ticket::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Ticket $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ticket-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
          public function actionUpload()
        {
            $tempFolder=Yii::getPathOfAlias('webroot').'/images/temp/';         
            Yii::import("ext.EFineUploader.qqFileUploader");
          
            $uploader = new qqFileUploader();
            $uploader->allowedExtensions = array('pdf','jpg','jpeg','png','txt','rtf','doc','docx','xls','xlsx','gif','ppt','pptx');
            $uploader->sizeLimit = 5 * 1024 * 1024;//maximum file size in bytes
            $uploader->chunksFolder = $tempFolder;
            $result = $uploader->handleUpload($tempFolder);
            $result['filename'] = $uploader->getUploadName();
            $result['folder'] = $tempFolder;
            $uploadedFile=$tempFolder.$result['filename'];
            header("Content-Type: text/plain");
            $result=htmlspecialchars(json_encode($result), ENT_NOQUOTES);
            echo $result;
            Yii::app()->end();
        }
         public function getTicketMessages($id){
            $criteria=new CDbCriteria();
            $client=Yii::app()->user->checkAccess('Cliente');
            if($client)
            $criteria->condition='id_ticket='.$id." and ticket_message_type <> 'message'";
            else
            $criteria->condition='id_ticket='.$id;
            $message= TicketMessage::model()->findAll($criteria);
            foreach($message as  $m){
                $user=  Usuarios::model()->findByPK($m->id_user);
                $link="";
                $asigned=$user->NOMBRE_USUARIO;
              $approve="";
              $repprove="";
                
                switch ($m->ticket_message_type){
                    case "message":
                        $class="ticketMessage";
                        break;
                    case "remedy":
                        if(is_null($m->ticket_message_approve))
                            $class="ticketNone";
                        elseif($m->ticket_message_approve==0)
                            $class="ticketRemedy";
                        if($m->ticket_message_approve==1)
                            $class="ticketApprove";
                     
                        if($client&& is_null($m->ticket_message_approve)&& $m->idTicket->ticket_status!="Cerrado"){
                            $approve=CHtml::link("Aprobar medida Correctiva",Yii::app()->createUrl("ticket/approve",array("id"=>$m->id_ticket_message)));
                            $repprove=CHtml::link("Reprobar medida Correctiva",Yii::app()->createUrl("ticket/repprove",array("id"=>$m->id_ticket_message)), array('confirm' => 'Esta Seguro que desea reprobar la medida correctiva propuesta?'));
                        }
                        break;
                    case "client";
                         $class="ticketMessageClient";
                         break;
                }
               
                $cri=new CDbCriteria();
              
                $cri->condition='id_ticket_message='.$m->id_ticket_message;
                $messagefiles= TicketMessageFile::model()->findAll($cri);

                    $folder=Yii::getPathOfAlias('webroot').'/images/tickets_message/'; 
                if($messagefiles){
                    foreach($messagefiles as $mf){

                    $link.=CHtml::link(CHtml::encode($mf->ticket_message_file_name), Yii::app()->baseUrl.'/images/tickets_message/'.$mf->id_ticket_message."/". $mf->ticket_message_file_name,array('target'=>'_blank'));
                    $link.="<br>";
                    }

                }
                
                if(!empty($m->id_user_asigned)){
                    $asigneduser=Users::model()->findByPK($m->id_user_asigned);
                    $asigned="De ".$user->user_names." ".$user->user_lastnames ." para ". $asigneduser->user_names." ".$asigneduser->user_lastnames;
                }
                  $space="";
                        if(!empty($approve)&&!empty($repprove))
                            $space="|";
                echo  '<div class="'.$class.'">'.$m->ticket_message.'</p>'.
                      '<p class="datep">'.$asigned ."<br>".
                       Yii::app()->dateFormatter->format("d MMMM y  HH:mm:ss",strtotime($m->ticket_message_date))."<br>".
                        $link."<div class='approveTicket'>".$approve.$space.$repprove."</div></div>";

                echo "<br>";

                } 
             }
                   public function actionMessageTicket($id){
             $ticketm=new TicketMessage;
             $ticketm->id_ticket=$id;
             if(isset($_POST['TicketMessage']))
                {
                $ticketm->attributes=$_POST['TicketMessage'];
                $ticketm->id_ticket=$id;
                $ticketm->ticket_message_date=date("y-m-d H:i:s");
                $ticketm->id_user=Yii::app()->user->getUser_Id();
                $ticketm->ticket_message_type='message';
                 //$ticketm->ticket_message_approve=0;
                if($ticketm->id_user_asigned==0)
                  $ticketm->id_user_asigned=NULL;
        
                if($ticketm->save()){
                    if(!empty($ticketm->_message_files)){
                        $tempFolder=Yii::getPathOfAlias('webroot').'/images/temp/'; 
                        $newFolder=Yii::getPathOfAlias('webroot').'/images/tickets_message/'; 
                        $folder=$newFolder."/".$ticketm->id_ticket_message;
                            if(!file_exists($folder))
                                mkdir($folder,0777,true); 
                        foreach($ticketm->_message_files as $mfile){
                            if(file_exists(($tempFolder.$mfile))){
                                $messagefile=new TicketMessageFile;
                                $messagefile->id_ticket_message=$ticketm->id_ticket_message;
                                $messagefile->ticket_message_file_name=$mfile;
                                $messagefile->save();
                                copy($tempFolder.$messagefile->ticket_message_file_name,$folder."/".$messagefile->ticket_message_file_name);
                            }
                        }
                       
                    }
                    
                     $body='Tiene notificaciones pendientes que requiere su Atención';
                            $this->sendMail($ticketm, 'Ticket Nº'.$ticketm->id_ticket,' Notificacion Ticket '.$id,$body, 'body_ticket','message');
                    
                    $this->redirect(array('ticket/view', 'id'=>$id));  
                }}
                     $this->render('createMessage',array(
                    'ticketm'=>$ticketm,
            ));
         }
             public function actionRemedyTicket($id){
             
             $ticketm=new TicketMessage;
             $ticketm->id_ticket=$id;
             $ticket=  $this->loadModel($id);
             
             if(isset($_POST['TicketMessage']))
                {
                $ticketm->attributes=$_POST['TicketMessage'];
                $ticketm->id_ticket=$id;
                $ticketm->ticket_message_date=date("y-m-d H:i:s");
                $ticketm->id_user=Yii::app()->user->getUser_Id();
                $ticketm->ticket_message_type='remedy';
                // $ticketm->ticket_message_approve=0;
                if($ticketm->id_user_asigned==0)
                  $ticketm->id_user_asigned=NULL;
        
                if($ticketm->save()){
                    $ticket->ticket_remedy_date=$ticketm->ticket_message_date;
                    $ticket->save(false);
                    if(!empty($ticketm->_message_files)){
                        $tempFolder=Yii::getPathOfAlias('webroot').'/images/temp/'; 
                        $newFolder=Yii::getPathOfAlias('webroot').'/images/tickets_message/'; 
                        $folder=$newFolder."/".$ticketm->id_ticket_message;
                            if(!file_exists($folder))
                                mkdir($folder,0777,true); 
                        foreach($ticketm->_message_files as $mfile){
                            if(file_exists(($tempFolder.$mfile))){
                                $messagefile=new TicketMessageFile;
                                $messagefile->id_ticket_message=$ticketm->id_ticket_message;
                                $messagefile->ticket_message_file_name=$mfile;
                                $messagefile->save();
                                copy($tempFolder.$messagefile->ticket_message_file_name,$folder."/".$messagefile->ticket_message_file_name);
                            }
                        }
                        
                    }
                    $body='Tiene Nuevas Medidas Correctivas en el Ticket que ha abierto';
                    $this->sendMail($ticket, 'Ticket Nº'.$id,"Medida Correctiva Ticket Nº".$id,$body, 'body_ticket_message','remedy');
                    $this->redirect(array('ticket/view', 'id'=>$id));  
                }}
                     $this->render('createRemedy',array(
                    'ticketm'=>$ticketm,
            ));
         }
         public function actionMessageClient($id){
             
             $ticketm=new TicketMessage;
             $ticketm->id_ticket=$id;
             if(isset($_POST['TicketMessage']))
                {
                $ticketm->attributes=$_POST['TicketMessage'];
                $ticketm->id_ticket=$id;
                $ticketm->ticket_message_date=date("y-m-d H:i:s");
                $ticketm->id_user=Yii::app()->user->getUser_Id();
                $ticketm->ticket_message_type='client';
                //$ticketm->ticket_message_approve=0;
                if($ticketm->id_user_asigned==0)
                  $ticketm->id_user_asigned=NULL;
        
                if($ticketm->save()){
                      $ticket=$this->loadModel($id);
                    $ticket->ticket_mclient_date=date("y-m-d H:i:s");
                    $ticket->save(false);
                    if(!empty($ticketm->_message_files)){
                        $tempFolder=Yii::getPathOfAlias('webroot').'/images/temp/'; 
                        $newFolder=Yii::getPathOfAlias('webroot').'/images/tickets_message/'; 
                        $folder=$newFolder."/".$ticketm->id_ticket_message;
                            if(!file_exists($folder))
                                mkdir($folder,0777,true); 
                        foreach($ticketm->_message_files as $mfile){
                            if(file_exists(($tempFolder.$mfile))){
                                $messagefile=new TicketMessageFile;
                                $messagefile->id_ticket_message=$ticketm->id_ticket_message;
                                $messagefile->ticket_message_file_name=$mfile;
                                $messagefile->save();
                                copy($tempFolder.$messagefile->ticket_message_file_name,$folder."/".$messagefile->ticket_message_file_name);
                            }
                        }
                       
                    }
                 
                    
                    $body='Tiene Comentario a No Conformidad Nº'.$ticketm->id_ticket.' por parte del Cliente';
                    $this->sendMail($ticket, 'Ticket Nº'.$id,"Comentario Ticket Nº".$id,$body, 'body_ticket_message','messageClient');
                    $this->redirect(array('ticket/view', 'id'=>$id));  
                            }}
                     $this->render('createMessageClient',array(
                    'ticketm'=>$ticketm,
            ));
             
        
                }
         
}
