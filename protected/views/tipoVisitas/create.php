<?php
/* @var $this TipoVisitasController */
/* @var $model TipoVisitas */

$this->breadcrumbs=array(
	'Tipo Visitas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Tipo de Visitas', 'url'=>array('index')),
	array('label'=>'Administrar Tipo Visitas', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Crear Tipo de Visitas</h2></div>
		<div class="panel-body">
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
	</div>
</div>