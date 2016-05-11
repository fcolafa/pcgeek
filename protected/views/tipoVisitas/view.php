<?php
/* @var $this TipoVisitasController */
/* @var $model TipoVisitas */

$this->breadcrumbs=array(
	'Tipo Visitas'=>array('index'),
	$model->ID_TIPO_VISITA,
);

$this->menu=array(
	array('label'=>'Ver Tipo de visita', 'url'=>array('index')),
	array('label'=>'Crear Tipo de visita', 'url'=>array('create')),
	array('label'=>'Actualizar Tipo de visita', 'url'=>array('update', 'id'=>$model->ID_TIPO_VISITA)),
	array('label'=>'Borrar Tipo de visita', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_TIPO_VISITA),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar Tipo Visita', 'url'=>array('admin')),
);
?>


<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Tipo de visita: <?php echo $model->TIPO; ?></h2> </div>
		<div class="panel-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'DESCRIPCION',
	),
)); ?>
