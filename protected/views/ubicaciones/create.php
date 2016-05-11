<?php
/* @var $this UbicacionesController */
/* @var $model Ubicaciones */

$this->breadcrumbs=array(
	'Ubicaciones'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Ubicaciones', 'url'=>array('index')),
	array('label'=>'Administrar Ubicaciones', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Crear Ubicacion</h2></div>
		<div class="panel-body">
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
</div>