<?php
/* @var $this CanalCamarasController */
/* @var $model CanalCamaras */

$this->breadcrumbs=array(
	'Canal Camaras'=>array('index'),
	$model->ID_CANALCAMARAS=>array('view','id'=>$model->ID_CANALCAMARAS),
	'Modificar',
);

$this->menu=array(
	array('label'=>' Canal Camaras', 'url'=>array('index')),
	array('label'=>'Crear Canal Camaras', 'url'=>array('create')),
	array('label'=>'Ver Canal Camaras', 'url'=>array('view', 'id'=>$model->ID_CANALCAMARAS)),
	array('label'=>'Administrar Canal Camaras', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
		<div class="panel-heading text-center"><h2>Modificar Canal <?php echo $model->NUM_CAMARA." cliente: ". $model->sucursales->getNombreCompleto(); ?></h2></div>
			<div class="panel-body">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
				
	</div>
</div>