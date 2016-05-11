<?php
/* @var $this SucursalesController */
/* @var $model Sucursales */

$this->breadcrumbs=array(
	'Sucursales'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Sucursales', 'url'=>array('index')),
	array('label'=>'Administrar Sucursales', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Crear Sucursales</h2></div>
		<div class="panel-body">
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
	</div>
</div>