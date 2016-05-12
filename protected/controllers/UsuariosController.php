<?php

class UsuariosController extends Controller
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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','create','nuevoTecnico','admin','delete','getAdminAction'),
				//'users'=>array('admin'),
				'expression'=>'$user->A1() || $user->A2()&&!$user->isFTime()',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('update','getAdminAction'),
				//'users'=>array('admin'),
				'expression'=>'$user->A1() && !$user->isFTime()',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('updateProfile','getAdminAction'),
				'users'=>array('*'),
			),
			
			array('deny',  // deny all users
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Usuarios;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuarios']))
		{
		//die(var_dump($_POST['Usuarios']));
                    
                    
                      
                      
                        
			$model->attributes=$_POST['Usuarios'];
			$pass=$this->generatePass();
		        $model->_PASSANTIGUA = md5($pass);
                        $model->CONTRASENA = md5($pass);
                        $model->_RPT_CONTRASENA = md5($pass);
                        $model->FECHA_CREACION_USUARIO=  date("y/m/d H:i:s");
                        $model->PRIMER_LOGIN=1;
                            if($model->save()&& $this->sendMail($model,$pass)){
                                    $this->redirect(array('view','id'=>$model->ID_USUARIO));
                            }   
                        }
                

		$this->render('create',array(
			'model'=>$model,
		));
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
                $pass= $model->CONTRASENA;
                $isUpdate=false;
                 if(Yii::app()->user->getUser_Id()!=$id){
                $model->CONTRASENA='';
                //$model->CONTRASENA = '';
                $model->_RPT_CONTRASENA = '';
                $isUpdate=true;
                }
               
		if(isset($_POST['Usuarios']))
		{
                        
			$model->attributes=$_POST['Usuarios'];
                            if($isUpdate && !empty($model->CONTRASENA) && !empty($model->_RPT_CONTRASENA )){
                                $model->CONTRASENA = md5($model->CONTRASENA);
                                $model->_RPT_CONTRASENA = md5($model->_RPT_CONTRASENA);
                       
                        }
			//$model->CONTRASENA=md5($model->CONTRASENA); //Encriptar en MD5
			if($model->save())
                                if($isUpdate){
                                    $model->CONTRASENA = '';
                                    $model->_RPT_CONTRASENA = '';
                                }
				$this->redirect(array('view','id'=>$model->ID_USUARIO));
                        
                   
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
        public function actionUpdateProfile($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $pass= $model->CONTRASENA;
                $model->CONTRASENA='';
                //$model->CONTRASENA = '';
                $model->_RPT_CONTRASENA = '';
                if(Yii::app()->user->getUser_Id()!=$id)
                    throw new CHttpException(404, 'Usted no esta autorizado para realizar esta acción.');    
		if(isset($_POST['Usuarios']))
		{
                        
			$model->attributes=$_POST['Usuarios'];
                            if(!empty($model->CONTRASENA)&& !empty($model->_RPT_CONTRASENA)){
                                $model->CONTRASENA = md5($model->CONTRASENA);
                                $model->_RPT_CONTRASENA = md5($model->_RPT_CONTRASENA);
                       
                        }
                         $model->PRIMER_LOGIN=0;
			//$model->CONTRASENA=md5($model->CONTRASENA); //Encriptar en MD5
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID_USUARIO));
                        
                   $model->CONTRASENA = '';
                   $model->_RPT_CONTRASENA = '';
		}

		$this->render('updateProfile',array(
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
		$dataProvider=new CActiveDataProvider('Usuarios',array('Pagination' => array ('PageSize' =>'30',)));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Usuarios('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuarios']))
			$model->attributes=$_GET['Usuarios'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	//Crear un tecnico con los datos minimos
	public function actionNuevoTecnico() {
        $model=new Tecnicos;
        // si Ajax Validation enabled
        $this->performAjaxValidation($model);
        // Flag to know if we will render the form or try to add new tech.
        $flag=true;
        if(isset($_POST['Tecnicos']))
        {       $flag=false;
            $model->attributes=$_POST['Tecnicos'];
 
            if($model->save()) {
                //Return an <option> and select it
                echo CHtml::tag('option',array (
                    'value'=>$model->ID_TECNICO,
                    'selected'=>true
                ),CHtml::encode($model->nombreCompleto),true);
            } /*else {
                $flag=true;
            }*/
        }
        if($flag) {
            Yii::app()->clientScript->scriptMap['jquery.js'] = false;
            $this->renderPartial('createDialogTec',array('model'=>$model,),false,true);
        }
    }

    //Crear una Sucursal con los datos minimos
	public function actionNuevaSucursal() {
        $model=new Sucursales;
        // si Ajax Validation enabled
        $this->performAjaxValidation($model);
        // Flag to know if we will render the form or try to add new tech.
        $flag=true;
        if(isset($_POST['Sucursales']))
        {       $flag=false;
            $model->attributes=$_POST['Sucursales'];
 
            if($model->save()) {
                //Return an <option> and select it
                echo CHtml::tag('option',array (
                    'value'=>$model->ID_SUCURSAL,
                    'selected'=>true
                ),CHtml::encode($model->NOMBRE_SUCURSAL),true);
            } /*else {
                $flag=true;
            }*/
        }
        if($flag) {
            Yii::app()->clientScript->scriptMap['jquery.js'] = false;
            $this->renderPartial('createDialogSuc',array('model'=>$model,),false,true);
        }
    }
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Usuarios the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Usuarios::model()->findByPk($id);
		if($model===null)
			throw new CHttpException("Web no encontrada",'La p�gina solicitada no existe.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Usuarios $model the model to be validated
	 */
         private function sendMail($model, $pass)
	{
	
                $mail=Yii::app()->Smtpmail;
                $mail->SMTPDebug = 1;
                $mail->CharSet = 'UTF-8';
                $mail->SetFrom('cnavarro@pcgeek.cl', 'Sistema Web PcGeek');
                $mail->Subject = 'Datos de Cuenta';
                $mail->MsgHTML(Yii::app()->controller->renderPartial('body', array('model'=>$model,'pass'=>$pass),true));
                $mail->AddAddress($model->EMAIL_USUARIO, 'Test');
                if(!$mail->Send()) {
                    Yii::app()->user->setFlash('error',Yii::t('validation','Error al enviar correo Electronico'));
                }else {
                    Yii::app()->user->setFlash('success',Yii::t('validation','Datos de usuario enviados por correo Electronico'));
                } 
	}
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuarios-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
            private function generatePass(){
            $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
            $pass = "";
            for($i=0;$i<8;$i++) {
            $pass .= substr($str,rand(0,62),1);
            }
            return $pass;
          }
          
}
