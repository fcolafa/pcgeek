<?php
/* @var $this TipoVisitasController */
/* @var $model TipoVisitas */

$this->breadcrumbs=array(
	'Tipo Visitas'=>array('index'),
	$model->ID_TIPO_VISITA=>array('view','id'=>$model->ID_TIPO_VISITA),
	'Modificar',
);

$this->menu=array(
	array('label'=>' Tipo de visita', 'url'=>array('index')),
	array('label'=>'Crear de visita', 'url'=>array('create')),
	array('label'=>'Ver Tipo de visita', 'url'=>array('view', 'id'=>$model->ID_TIPO_VISITA)),
	array('label'=>'Administrar Tipo visita', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Modificar Tipo de visita: <?php echo $model->TIPO; ?></h2></div>
		<div class="panel-body">
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
	</div>
</div>
</div>