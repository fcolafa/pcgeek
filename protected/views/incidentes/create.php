<?php
/* @var $this IncidentesController */
/* @var $model Incidentes */

$this->breadcrumbs=array(
	'Incidentes'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Incidentes', 'url'=>array('index')),
	array('label'=>'Administrar Incidentes', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Crear Incidentes</h2></div>
		<div class="panel-body">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
	</div>
</div>