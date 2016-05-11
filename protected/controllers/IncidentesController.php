<?php

class IncidentesController extends Controller
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
			//CRUD todos los permisos otorgados a las cuentas indicadas
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete','index','view','ObtenerCamaras','ExportPdf'),
				'expression'=>'$user->A1()',
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
		$model=new Incidentes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Incidentes']))
		{
			$model->attributes=$_POST['Incidentes'];
                        $criteria=new cdbcriteria();
                       
                        
			$model->ID_USUARIO=Yii::app()->user->getUser_Id();
                       
			$model->image=CUploadedFile::getInstance($model,'image');
			$model->IMAGEN = NULL;
			
			if($model->save()){
				if(!empty($model->image)){
					try{
						$filename=$model->ID_INCIDENTE. ".jpg";
						$model->image->saveAs(Yii::app()->basePath.'/../images/'.$filename);
						$image = Yii::app()->image->load(Yii::app()->basePath.'/../images/'.$filename);
	   					$image->resize(800, 600)->quality(80);
	   					if ($image->save()){
	   						$model->IMAGEN = $filename;
	   						$model->save();
	   					}   					

   				}
   				catch(Exception $e){}
   					}

				$this->redirect(array('view','id'=>$model->ID_INCIDENTE));
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

		if(isset($_POST['Incidentes']))
		{
			$model->attributes=$_POST['Incidentes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID_INCIDENTE));
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
		$dataProvider=new CActiveDataProvider('Incidentes');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		// crear una nueva instancia de un data provider para cargar el detalle de un informe
	    $dataProviderImagen=new CActiveDataProvider('ViewRegistro');
	    $dataProviderImagen->criteria = array('condition'=>'ID_INCIDENTE=-1');

		if(Yii::app()->request->isAjaxRequest AND isset($_GET[0])){
	      // el update del CGridView hecho en Ajax produce un ajaxRequest sobre el mismo
	      $idIncidente = $_GET[0]; 
	      Yii::log("\nAJAX_REQUEST\nPROVOCADO_POR_EL_UPDATE_AL_CGRIDVIEW"
	        ."\nidInforme seleccionada es=".$idIncidente
	      ,"info");
	      // actualizas el criteria del data provider para ajustarlo a lo que se pide:
	      $dataProviderImagen->criteria = array('condition'=>'ID_INCIDENTE='.$idIncidente);
	      // para responderle al request ajax debes hacer un ECHO con el JSON del dataprovider
	      echo CJSON::encode($dataProviderImagen);
	    }


		$model=new ViewRegistro('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ViewRegistro']))
			$model->attributes=$_GET['ViewRegistro'];

		$this->render('admin',array(
			'model'=>$model,
			'dp_Imagen'=>$dataProviderImagen,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Incidentes the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Incidentes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Incidentes $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='incidentes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/**** Cargar combo dependiente con las sucursales del cliente */
	public function actionObtenerCamaras($idSucursal){
	$idSucursal=(int)$idSucursal;
	    $resp = CanalCamaras::model()->findAllByAttributes(array('ID_SUCURSAL'=>$idSucursal));
	    header("Content-type: application/json");
	    echo CJSON::encode($resp);
	}

	public function actionExportPdf()
	{
		$this->render('exportpdf');
	}
}
