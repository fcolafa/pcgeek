<?php
/* @var $this InformesController */
/* @var $model Informes */

$this->breadcrumbs=array(
	'Informes'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Informes', 'url'=>array('index')),
	array('label'=>'Administrar Informes', 'url'=>array('admin')),
);
?>


<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Crear Informes</h2></div>
		<div class="panel-body">
			<?php $this->renderPartial('_form', array('model'=>$model, 'model_visitas'=>$model_visitas, 'model_detalle'=>array())); ?> 
		</div>
	</div>
</div>