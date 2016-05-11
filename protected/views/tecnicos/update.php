<?php
/* @var $this TecnicosController */
/* @var $model Tecnicos */

$this->breadcrumbs=array(
	'Tecnicos'=>array('index'),
	$model->ID_TECNICO=>array('view','id'=>$model->ID_TECNICO),
	'Modificar',
);

$this->menu=array(
	array('label'=>' Técnicos', 'url'=>array('index')),
	array('label'=>'Crear Técnicos', 'url'=>array('create')),
	array('label'=>'Ver Técnicos', 'url'=>array('view', 'id'=>$model->ID_TECNICO)),
	array('label'=>'Administrar Técnicos', 'url'=>array('admin')),
);
?>


<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Modificar Técnico: <?php echo $model->APELLIDOS_TECNICO . " , " . $model->NOMBRES_TECNICO; ?></h2></div>
		<div class="panel-body">
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
	</div>
</div>