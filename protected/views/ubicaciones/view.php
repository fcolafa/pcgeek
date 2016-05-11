<?php
/* @var $this UbicacionesController */
/* @var $model Ubicaciones */

$this->breadcrumbs=array(
	'Ubicaciones'=>array('index'),
	$model->ID_UBICACION,
);

$this->menu=array(
	array('label'=>'Ver Ubicaciones', 'url'=>array('index')),
	array('label'=>'Crear Ubicaciones', 'url'=>array('create')),
	array('label'=>'Actualizar Ubicaciones', 'url'=>array('update', 'id'=>$model->ID_UBICACION)),
	array('label'=>'Borrar Ubicaciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_UBICACION),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar Ubicaciones', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Ubicaciones #<?php echo $model->ID_UBICACION; ?></h2></div>
		<div class="panel-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_UBICACION',
		'REGION',
		'UBICACION',
	),
)); ?>
	</div>
</div>
