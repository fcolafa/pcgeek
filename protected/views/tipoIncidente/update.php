<?php
/* @var $this TipoIncidenteController */
/* @var $model TipoIncidente */

$this->breadcrumbs=array(
	'Tipo Incidentes'=>array('index'),
	$model->ID_TIPO_INCIDENTE=>array('view','id'=>$model->ID_TIPO_INCIDENTE),
	'Modificar',
);

$this->menu=array(
	array('label'=>' Tipo Incidente', 'url'=>array('index')),
	array('label'=>'Crear Tipo Incidente', 'url'=>array('create')),
	array('label'=>'Ver Tipo Incidente', 'url'=>array('view', 'id'=>$model->ID_TIPO_INCIDENTE)),
	array('label'=>'Administrar Tipo Incidente', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Modificar Tipo Incidente " <?php echo $model->NOMBRE_TIPO_INCIDENTE; ?> "</h2></div>
		<div class="panel-body">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>