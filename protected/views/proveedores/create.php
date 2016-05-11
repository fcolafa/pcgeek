<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */

$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Proveedor', 'url'=>array('index')),
	array('label'=>'Administrar Proveedores', 'url'=>array('admin')),
);
?>


<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2 class="text-center">Crear Proveedor</h2> </div>
		<div class="panel-body">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>