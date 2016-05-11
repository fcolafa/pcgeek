<?php
/* @var $this TipoIncidenteController */
/* @var $model TipoIncidente */

$this->breadcrumbs=array(
	'Tipo Incidentes'=>array('index'),
	$model->ID_TIPO_INCIDENTE,
);

$this->menu=array(
	array('label'=>'Ver Tipo Incidente', 'url'=>array('index')),
	array('label'=>'Crear Tipo Incidente', 'url'=>array('create')),
	array('label'=>'Actualizar Tipo Incidente', 'url'=>array('update', 'id'=>$model->ID_TIPO_INCIDENTE)),
	array('label'=>'Borrar Tipo Incidente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_TIPO_INCIDENTE),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar Tipo Incidente', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Tipo de Incidente " <?php echo $model->NOMBRE_TIPO_INCIDENTE; ?> "</h2></div>
		<div class="panel-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_TIPO_INCIDENTE',
		'NOMBRE_TIPO_INCIDENTE',
		'DESCRIPCION_TIPO_INICIDENTE',
	),
)); ?>
	</div>
</div>
