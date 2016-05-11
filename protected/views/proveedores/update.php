<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */

$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->RUT_PROVEEDOR=>array('view','id'=>$model->RUT_PROVEEDOR),
	'Modificar',
);

$this->menu=array(
	array('label'=>' Proveedores', 'url'=>array('index')),
	array('label'=>'Crear Proveedores', 'url'=>array('create')),
	array('label'=>'Ver Proveedores', 'url'=>array('view', 'id'=>$model->RUT_PROVEEDOR)),
	array('label'=>'Administrar Proveedores', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2 class="text-center">Modificar Proveedor : <?php echo $model->NOMBRE_PROVEEDOR; ?></h2> </div>
		<div class="panel-body">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>