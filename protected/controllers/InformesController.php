<?php
//use common\models\AccessHelpers;

class InformesController extends Controller
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
			//R
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','admin'),
				'expression'=>'$user->C1()&&!$user->isFTime()',
			),
			//RU
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','admin','delete'),
				'expression'=>'$user->A2()&&!$user->isFTime()',
			),
			//CRU
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','validarVisita','admin','index','view','obtenerSucursales'),
				'expression'=>'$user->T1()&&!$user->isFTime()',	
			),
			//CRUD todos los permisos otorgados a las cuentas indicadas
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','validarVisita','admin','delete','index','view','obtenerSucursales'),
				'expression'=>'$user->A1()&&!$user->isFTime()',
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
		$detalle = DetalleInforme::model()->findAllBySql("SELECT `i`.`ID_INFORME_DET`, `i`.`ID_VISITA`, `v`.`TIPO_VISITA`, `v`.`NOMBRE_VISITA`, `i`.`ID_ESTADO`,`i`.`VALOR` FROM `detalle_informe` `i` INNER JOIN `visitas` `v` ON `i`.`ID_VISITA`=`v`.`ID_VISITA` WHERE `i`.`ID_INFORME`=".$id);
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'detalle'=>$detalle,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new Informes;
		//$model_visitas = new Visitas;
		$model_visitas = Visitas::model()->findAll(array('select'=>'ID_VISITA, TIPO_VISITA, NOMBRE_VISITA', 'order'=>'TIPO_VISITA'));
		//$ubicacion = $model->ID_UBICACION;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Informes']))
		{			
			$model->attributes=$_POST['Informes'];
			
			if(isset($_POST['detalleInforme'])) $model->detalle = "tiene_detalle";

			if($model->save())
			{
			    $lastId = $model->primaryKey;
				$ubicacion= $model->ID_UBICACION;

				foreach ($_POST['detalleInforme'] as $value) {
					$model_valores = Valores::model()->findByAttributes(array('ID_UBICACION'=>$ubicacion,'ID_VISITA'=>$value));					
					$detalle = new DetalleInforme;
		        $detalle->ID_INFORME = $lastId;
		        $detalle->ID_VISITA = $value;
		        $detalle->ID_ESTADO = 1;
						if (isset($model_valores) && ($model_valores->VALOR != NULL))
							$detalle->VALOR  = $model_valores->VALOR;
						else
							$detalle->VALOR  = 0;
					//Valores::model()->findByAttributes(array('ID_UBICACION'=>$ubicacion,'ID_VISITA'=>$value),'status=1');
		      $detalle->save();
				}

				$valida_instancia = CUploadedFile::getInstance($model,'IMAGEN');
				if(!empty($valida_instancia)){
					try{
						//subir la imagen
						$extensionFile = $valida_instancia->getExtensionName();
						$filename = $lastId.".".$extensionFile;
						$valida_instancia->saveAs(Yii::app()->basePath.'/../archivos/informes/'.$filename);

						$model=$this->loadModel($lastId);
						$model->detalle = "tiene_detalle";
						$model->IMAGEN = $filename;
						$model->save();
						}
					catch(Exception $e){}
				}

				$this->redirect(array('view','id'=>$lastId));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'model_visitas'=>$model_visitas,
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
	
		if (Yii::app()->user->T1()){
			$table = Usuarios::model()->find('NOMBRE_USUARIO="'.Yii::app()->user->name.'"');
				if ($table->ID_TECNICO == null || $table->ID_TECNICO == ''){					
					$tecnico = 0;
				} else{
					$tecnico = $table->ID_TECNICO;
				}
			if ($tecnico != $model->ID_TECNICO) $this->actionAdmin();
		}

		$model_visitas = Visitas::model()->findAll(array('select'=>'ID_VISITA, TIPO_VISITA, NOMBRE_VISITA', 'order'=>'TIPO_VISITA'));
		
		//consultar el detalle existente y pasarlo a un array
		$consulta = DetalleInforme::model()->findAllBySql('SELECT ID_VISITA FROM detalle_informe WHERE `ID_INFORME`='.$id);		
		$model_detalle = array();
		foreach($consulta as $v)
		{
		    $model_detalle[$v->ID_VISITA] = $v->ID_VISITA;
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Informes']))
		{
			$model->attributes=$_POST['Informes'];

			if(isset($_POST['detalleInforme'])) $model->detalle = "tiene_detalle";

			if($model->save())
			{
			    //DetalleInforme::deleteAll('ID_INFORME='.$id );	
			    Yii::app()->db->createCommand('DELETE FROM detalle_informe WHERE ID_INFORME='.$id)->execute();
				$ubicacion = $model->ID_UBICACION;

				foreach ($_POST['detalleInforme'] as $value) {
					$model_valores = Valores::model()->findByAttributes(array('ID_UBICACION'=>$ubicacion,'ID_VISITA'=>$value));	
					$detalle = new DetalleInforme;
		            $detalle->ID_INFORME = $id;
		            $detalle->ID_VISITA = $value;
		            $detalle->ID_ESTADO = 1;
						if (isset($model_valores) && ($model_valores->VALOR != NULL))
							$detalle->VALOR  = $model_valores->VALOR;
						else
							$detalle->VALOR  = 0;
		      $detalle->save();
				}

				$valida_instancia = CUploadedFile::getInstance($model,'IMAGEN');					
				if(!empty($valida_instancia)){
					try{
						//subir la imagen
						$extensionFile = $valida_instancia->getExtensionName();
						$filename = $id.".".$extensionFile;
						$valida_instancia->saveAs(Yii::app()->basePath.'/../archivos/informes/'.$filename);					

						$model = $this->loadModel($id);
						$model->detalle = "tiene_detalle";
						$model->IMAGEN = $filename;
						$model->save();
						}
						catch(Exception $e){}
				}

			$this->redirect(array('view','id'=>$model->ID_INFORME));
			}				
		}

		$this->render('update',array(
			'model'=>$model,
			'model_visitas'=>$model_visitas,
			'model_detalle'=>$model_detalle,
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
		$dataProvider=new CActiveDataProvider('Informes');
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
	    $dataProviderDetalle=new CActiveDataProvider('DetalleInforme');
	     $dataProviderDetalle->criteria = array('condition'=>'ID_INFORME=-1');

		if(Yii::app()->request->isAjaxRequest AND isset($_GET[0])){
	      // el update del CGridView hecho en Ajax produce un ajaxRequest sobre el mismo
	      $idInforme = $_GET[0]; 
	      Yii::log("\nAJAX_REQUEST\nPROVOCADO_POR_EL_UPDATE_AL_CGRIDVIEW"
	        ."\nidInforme seleccionada es=".$idInforme
	      ,"info");
	      // actualizas el criteria del data provider para ajustarlo a lo que se pide:
	      $dataProviderDetalle->criteria = array('condition'=>'ID_INFORME='.$idInforme);
	      // para responderle al request ajax debes hacer un ECHO con el JSON del dataprovider
	      echo CJSON::encode($dataProviderDetalle);
	    }

		$model=new Informes('search');
		$model->unsetAttributes();  // clear any default values
		

		if(isset($_GET['Informes']))
			$model->attributes=$_GET['Informes'];

		$this->render('admin',array(
			'model'=>$model,
			'dP_detalle'=>$dataProviderDetalle,
		));
	}

	/**** Cargar combo dependiente con las sucursales del cliente */
	public function actionObtenerSucursales($idCliente){
		$idCliente=(int)$idCliente;
	    $resp = Sucursales::model()->findAllByAttributes(array('ID_CLIENTE'=>$idCliente));
	    header("Content-type: application/json");
	    echo CJSON::encode($resp);
	}

	/**** Actualizar la validacion de una visita */
	public function actionValidarVisita(){

		if(Yii::app()->request->isAjaxRequest){
			//capturo el id enviado por Ajax
			$idDetalle=(int)$_POST['visita'];
			//buscar el id en la BD
			$table = DetalleInforme::model()->findByPk($idDetalle);
		  	//Si el estado es 0=Por Validar se cambia a 1=Validado
			if($table->ID_ESTADO < 1){
				$table->ID_ESTADO = 1;
				if($table->save())
					$resp = "actualizado";				
				else
					$resp = "error";
			} else{
				$resp = "sin_cambios";
			}
		    header("Content-type: application/json");
		    echo CJSON::encode($resp);
		}
	}		

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Informes the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Informes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Informes $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='informes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
