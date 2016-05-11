<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */

$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->RUT_PROVEEDOR,
);

$this->menu=array(
	array('label'=>'Ver Proveedores', 'url'=>array('index')),
	array('label'=>'Crear Proveedores', 'url'=>array('create')),
	array('label'=>'Actualizar Proveedor', 'url'=>array('update', 'id'=>$model->RUT_PROVEEDOR)),
	array('label'=>'Borrar Proveedores', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->RUT_PROVEEDOR),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar Proveedores', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2 class="text-center"> Proveedor : <?php echo $model->RUT_PROVEEDOR; ?></h2> </div>
		<div class="panel-body">
<table class="table table-condensed">
	<tr>
		<td class="col-md-2 success">Rut</td> <td class="success"><?=$model->RUT_PROVEEDOR;?></td>
	</tr>
	<tr>
		<td class="col-md-2 success">Nombre</td> <td class="success"><?=$model->NOMBRE_PROVEEDOR;?></td>
	</tr>
	<tr>
		<td class="col-md-2 success">Direccion</td> <td class="success"><?=$model->DIRECCION_PROVEEDOR;?></td>
	</tr>
	<tr>
		<td class="col-md-2 success">Ciudad</td> <td class="success"><?=$model->CIUDAD_PROVEEDOR;?></td>
	</tr>
	</table>

<!--<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'RUT_PROVEEDOR',
		'NOMBRE_PROVEEDOR',
		'DIRECCION_PROVEEDOR',
		'CIUDAD_PROVEEDOR',
	),
));*/ ?>-->
	</div>
</div>
