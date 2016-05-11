<?php
/* @var $this SucursalesController */
/* @var $model Sucursales */

$this->breadcrumbs=array(
	'Sucursales'=>array('index'),
	$model->ID_SUCURSAL=>array('view','id'=>$model->ID_SUCURSAL),
	'Modificar',
);

$this->menu=array(
	array('label'=>' Sucursales', 'url'=>array('index')),
	array('label'=>'Crear Sucursales', 'url'=>array('create')),
	array('label'=>'Ver Sucursales', 'url'=>array('view', 'id'=>$model->ID_SUCURSAL)),
	array('label'=>'Administrar Sucursales', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Modificar Sucursales <?php echo $model->ID_SUCURSAL;; ?></h2></div>
		<div class="panel-body">
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
	</div>
</div>