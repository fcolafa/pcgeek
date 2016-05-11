<?php
/* @var $this IncidentesController */
/* @var $model Incidentes */

$this->breadcrumbs=array(
	'Incidentes'=>array('index'),
	$model->ID_INCIDENTE=>array('view','id'=>$model->ID_INCIDENTE),
	'Modificar',
);

$this->menu=array(
	array('label'=>' Incidentes', 'url'=>array('index')),
	array('label'=>'Crear Incidentes', 'url'=>array('create')),
	array('label'=>'Ver Incidentes', 'url'=>array('view', 'id'=>$model->ID_INCIDENTE)),
	array('label'=>'Administrar Incidentes', 'url'=>array('admin')),
);
?>

<h1>Modificar Incidentes <?php echo $model->ID_INCIDENTE; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>