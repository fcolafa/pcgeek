<?php
/* @var $this DetalleInformeController */
/* @var $model DetalleInforme */

$this->breadcrumbs=array(
	'Detalle Informe'=>array('index'),
	$model->ID_INFORME_DET=>array('view','id'=>$model->ID_INFORME_DET),
	'Modificar',
);

$this->menu=array(
	array('label'=>' Detalle de Informe', 'url'=>array('index')),
	array('label'=>'Crear Detalle a Informe', 'url'=>array('create')),
	array('label'=>'Ver Detalle de Informe', 'url'=>array('view', 'id'=>$model->ID_INFORME_DET)),
	array('label'=>'Administrar Detalle de Informe', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Modificar Detalle de Informe <?php echo $model->ID_INFORME_DET; ?></h2></div>
		<div class="panel-body">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>