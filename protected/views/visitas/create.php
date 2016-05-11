<?php
/* @var $this VisitasController */
/* @var $model Visitas */

$this->breadcrumbs=array(
	'Visitas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Visitas', 'url'=>array('index')),
	array('label'=>'Administrar Visitas', 'url'=>array('admin')),
);
?>


<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Crear Visitas</h2></div>
		<div class="panel-body">
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
	</div>
</div>