<?php
class ReportesController extends Controller
{
	//public $layout = '/layouts/column2';

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}
    
  public function actionInformesValorizados()
	{
		$model=new ViewInforme('search');
		$model->unsetAttributes();  // clear any default values

		if(isset($_GET['ViewInforme']))
			$model->attributes=$_GET['ViewInforme'];

		$this->render('_reportInformes',array(
			'model'=>$model,
		));
	}


     public function actionVisitasNoValorizadas()
	{
		$model=new Viewinformevalores('search');
		$model->unsetAttributes();  // clear any default values
		$this->render('_reportInformeValorizados',array(
			'model'=>$model,
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}





/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
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
				'expression'=>'$user->C1()',
			),
			//RU
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','admin','delete'),
				'expression'=>'$user->A2()',
			),
			//CRU
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','validarVisita','admin','index','view','obtenerSucursales'),
				'expression'=>'$user->T1()',
			),
			//CRUD todos los permisos otorgados a las cuentas indicadas
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','validarVisita','admin','delete','index','view','obtenerSucursales','ExportPDF','InformesValorizados','VisitasNoValorizadas'),
				'expression'=>'$user->A1()',
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function behaviors()
    {
        return array(
        	//'fpdf'=>array('class'=>'path.to.FPDFbehavior'),
            'eexcelview'=>array(
                'class'=>'ext.eexcelview.EExcelBehavior',
               
            ),
        );
    }

	public function actionExportPdf()
	{
		$this->render('exportpdf');
	}


	public function actionExcel(){

		session_start();
		$dataProvider = $_SESSION['reportFullBarcos']->getData();
		$model=$dataProvider;
		$content=$this->renderPartial("excel",array("model"=>$model),true);
		Yii::app()->request->sendFile("test.xls",$content);

	}
    public function actionInformes()
	{
		$this->render('_reportInformes');
	}
    public function actionInformesVisitasNoValorizadas()
	{
		$this->render('_reportInformeValorizados');
	}
}

?>
