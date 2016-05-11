<?php
/* @var $this SucursalesController */
/* @var $model Sucursales */

$this->breadcrumbs=array(
	'Sucursales'=>array('index'),
	$model->ID_SUCURSAL,
);

$this->menu=array(
	array('label'=>'Ver Sucursales', 'url'=>array('index')),
	array('label'=>'Crear Sucursales', 'url'=>array('create')),
	array('label'=>'Actualizar Sucursales', 'url'=>array('update', 'id'=>$model->ID_SUCURSAL)),
	array('label'=>'Borrar Sucursales', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_SUCURSAL),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar Sucursales', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Sucursal: <?php echo $model->NOMBRE_SUCURSAL; ?></h2></div>
		<div class="panel-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'ID_CLIENTE',
			'value'=>$model->iDCLIENTE->NOMBRE_CLIENTE,
		 ),
		'DIRECCION_SUCURSAL',
		'CONTACTO_SUCURSAL',
		'FONO_SUCURSAL',
		'DESCRIPCION',
	),
)); ?>
	</div>
</div>
