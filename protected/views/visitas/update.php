<?php
/* @var $this VisitasController */
/* @var $model Visitas */

$this->breadcrumbs=array(
	'Visitas'=>array('index'),
	$model->ID_VISITA=>array('view','id'=>$model->ID_VISITA),
	'Modificar',
);

$this->menu=array(
	array('label'=>' Visitas', 'url'=>array('index')),
	array('label'=>'Crear Visitas', 'url'=>array('create')),
	array('label'=>'Ver Visitas', 'url'=>array('view', 'id'=>$model->ID_VISITA)),
	array('label'=>'Administrar Visitas', 'url'=>array('admin')),
);
?>


<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Modificar Visita <?php echo $model->NOMBRE_VISITA ; ?></h2></div>
		<div class="panel-body">
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
	</div>
</div>