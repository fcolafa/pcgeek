<?php
/* @var $this TipoEquipoController */
/* @var $model TipoEquipo */

$this->breadcrumbs=array(
	'Tipo Equipos'=>array('index'),
	$model->ID_TIPOEQUIPO=>array('view','id'=>$model->ID_TIPOEQUIPO),
	'Modificar',
);

$this->menu=array(
	array('label'=>' TipoEquipo', 'url'=>array('index')),
	array('label'=>'Crear TipoEquipo', 'url'=>array('create')),
	array('label'=>'Ver TipoEquipo', 'url'=>array('view', 'id'=>$model->ID_TIPOEQUIPO)),
	array('label'=>'Administrar TipoEquipo', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2 class="text-center">Modificar Tipo de Equipo : <?php echo $model->ID_TIPOEQUIPO; ?></h2> </div>
		<div class="panel-body">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>