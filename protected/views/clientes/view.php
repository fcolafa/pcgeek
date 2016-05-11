<?php
/* @var $this ClientesController */
/* @var $model Clientes */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->ID_CLIENTE,
);

$this->menu=array(
	array('label'=>'Ver Clientes', 'url'=>array('index')),
	array('label'=>'Crear Clientes', 'url'=>array('create')),
	array('label'=>'Actualizar Clientes', 'url'=>array('update', 'id'=>$model->ID_CLIENTE)),
	array('label'=>'Borrar Clientes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_CLIENTE),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar Clientes', 'url'=>array('admin')),
);
?>
<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Cliente: <?php echo $model->NOMBRE_CLIENTE; ?></h2></div>
		<div class="panel-body">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'RUT_CLIENTE',
		'DIRECCION_CLIENTE',
		'FONO_CLIENTE',
		'CONTACTO',
		'FONO_CONTACTO',
		'DESCRIPCION',
	),
)); ?>
	</div>
</div>