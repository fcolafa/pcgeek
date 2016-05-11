<?php
/* @var $this DetalleInformeController */
/* @var $model DetalleInforme */

$this->breadcrumbs=array(
	'Detalle de Informes'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Detalle de Informe', 'url'=>array('index')),
	array('label'=>'Administrar Detalle de Informe', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Crear Detalle a Informe</h2></div>
		<div class="panel-body">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>