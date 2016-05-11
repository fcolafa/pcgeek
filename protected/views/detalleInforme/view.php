<?php
/* @var $this DetalleInformeController */
/* @var $model DetalleInforme */

$this->breadcrumbs=array(
	'Detalle Informe'=>array('index'),
	$model->ID_INFORME_DET,
);

$this->menu=array(
	array('label'=>'Ver Detalle de Informe', 'url'=>array('index')),
	array('label'=>'Crear Detalle a Informe', 'url'=>array('create')),
	array('label'=>'Actualizar Detalle de Informe', 'url'=>array('update', 'id'=>$model->ID_INFORME_DET)),
	array('label'=>'Borrar Detalle de Informe', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_INFORME_DET),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar Detalle de Informe', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Detalle de Informe #<?php echo $model->ID_INFORME_DET; ?></h2></div>
		<div class="panel-body">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_INFORME_DET',
		'ID_VISITA',
		'ID_INFORME',
		'ID_ESTADO',
		'VALOR',
	),
)); ?>
	</div>
</div>
