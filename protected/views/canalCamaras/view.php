<?php
/* @var $this CanalCamarasController */
/* @var $model CanalCamaras */

$this->breadcrumbs=array(
	'Canal Camaras'=>array('index'),
	$model->ID_CANALCAMARAS,
);

$this->menu=array(
	array('label'=>'Ver Canal Camaras', 'url'=>array('index')),
	array('label'=>'Crear Canal Camaras', 'url'=>array('create')),
	array('label'=>'Actualizar Canal Camaras', 'url'=>array('update', 'id'=>$model->ID_CANALCAMARAS)),
	array('label'=>'Borrar Canal Camaras', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_CANALCAMARAS),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar Canal Camaras', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
		<div class="panel-heading text-center"><h2>Canal N° <?php echo $model->NUM_CAMARA." cliente: ". $model->sucursales->getNombreCompleto(); ?></h2></div>
			<div class="panel-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_CANALCAMARAS',
		array(
			'label'=>'Cliente',
			'value'=>$model->sucursales->getNombreCompleto(),
		 ),
		'NUM_CAMARA',
		'UBICACION_CAMARA',
		'FECHA_CAMBIO_CAMARA',
		'OBSERVACION_CAMARA',
		array(
			'name'=>'ESTADO_CAMARA',
			'value'=>$model->ESTADO_CAMARA=="1"?"Activa":"Inactiva",
		 ),
	),
)); ?>
	</div>
</div>