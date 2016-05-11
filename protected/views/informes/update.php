<?php
/* @var $this InformesController */
/* @var $model Informes */

$this->breadcrumbs=array(
	'Informes'=>array('index'),
	$model->ID_INFORME=>array('view','id'=>$model->ID_INFORME),
	'Modificar',
);

$this->menu=array(
	array('label'=>' Informes', 'url'=>array('index')),
	array('label'=>'Crear Informes', 'url'=>array('create')),
	array('label'=>'Ver Informes', 'url'=>array('view', 'id'=>$model->ID_INFORME)),
	array('label'=>'Administrar Informes', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Modificar Informe <?php echo $model->ID_INFORME.": ".$model->iDCLIENTE->NOMBRE_CLIENTE.", ".$model->FECHA_INGRESO; ?></h2></div>
		<div class="panel-body">
			<?php $this->renderPartial('_form', array('model'=>$model, 'model_visitas'=>$model_visitas, 'model_detalle'=>$model_detalle)); ?> 
	</div>
</div>