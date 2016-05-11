<?php
/* @var $this ClientesController */
/* @var $model Clientes */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->ID_CLIENTE=>array('view','id'=>$model->ID_CLIENTE),
	'Modificar',
);

$this->menu=array(
	array('label'=>' Clientes', 'url'=>array('index')),
	array('label'=>'Crear Clientes', 'url'=>array('create')),
	array('label'=>'Ver Clientes', 'url'=>array('view', 'id'=>$model->ID_CLIENTE)),
	array('label'=>'Administrar Clientes', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Modificar Cliente: <?php echo $model->NOMBRE_CLIENTE; ?></h2></div>
		<div class="panel-body">
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
	</div>
</div>