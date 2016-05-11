<?php
/* @var $this CanalCamarasController */
/* @var $model CanalCamaras */

$this->breadcrumbs=array(
	'Canal Camaras'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Canal Camaras', 'url'=>array('index')),
	array('label'=>'Administrar Canal Camaras', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
		<div class="panel-heading text-center"><h2>Crear Canal Camaras</h2></div>
			<div class="panel-body">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
				
	</div>
</div>