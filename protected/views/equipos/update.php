<?php
/* @var $this EquiposController */
/* @var $model Equipos */

$this->breadcrumbs=array(
	'Equipos'=>array('index'),
	$model->ID_EQUIPOS=>array('view','id'=>$model->ID_EQUIPOS),
	'Modificar',
);

$this->menu=array(
	array('label'=>' Equipos', 'url'=>array('index')),
	array('label'=>'Crear Equipos', 'url'=>array('create')),
	array('label'=>'Ver Equipos', 'url'=>array('view', 'id'=>$model->ID_EQUIPOS)),
	array('label'=>'Administrar Equipos', 'url'=>array('admin')),
);
?>
<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Modificar Equipos <?php echo $model->ID_EQUIPOS; ?></h2> </div>
		<div class="panel-body">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>