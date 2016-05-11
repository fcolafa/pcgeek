<?php
/* @var $this TipoIncidenteController */
/* @var $model TipoIncidente */

$this->breadcrumbs=array(
	'Tipo Incidentes'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Tipo Incidente', 'url'=>array('index')),
	array('label'=>'Administrar Tipo Incidente', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Crear Tipos de Incidentes</h2></div>
		<div class="panel-body">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>