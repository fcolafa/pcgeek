<?php
/* @var $this TecnicosController */
/* @var $model Tecnicos */

$this->breadcrumbs=array(
	'Tecnicos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Técnicos', 'url'=>array('index')),
	array('label'=>'Administrar Técnicos', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Crear Técnicos</h2></div>
		<div class="panel-body">
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
	</div>
</div>