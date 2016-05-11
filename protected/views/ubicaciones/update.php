<?php
/* @var $this UbicacionesController */
/* @var $model Ubicaciones */

$this->breadcrumbs=array(
	'Ubicaciones'=>array('index'),
	$model->ID_UBICACION=>array('view','id'=>$model->ID_UBICACION),
	'Modificar',
);

$this->menu=array(
	array('label'=>' Ubicaciones', 'url'=>array('index')),
	array('label'=>'Crear Ubicaciones', 'url'=>array('create')),
	array('label'=>'Ver Ubicaciones', 'url'=>array('view', 'id'=>$model->ID_UBICACION)),
	array('label'=>'Administrar Ubicaciones', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Modificar Ubicaciones <?php echo $model->ID_UBICACION; ?></h2></div>
		<div class="panel-body">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
			
	</div>
</div>