<?php
/* @var $this ValoresController */
/* @var $model Valores */

$this->breadcrumbs=array(
	'Valores'=>array('index'),
	$model->ID_VALOR=>array('view','id'=>$model->ID_VALOR),
	'Modificar',
);

$this->menu=array(
	array('label'=>' Valores', 'url'=>array('index')),
	array('label'=>'Crear Valores', 'url'=>array('create')),
	array('label'=>'Ver Valores', 'url'=>array('view', 'id'=>$model->ID_VALOR)),
	array('label'=>'Administrar Valores', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Modificar Valores <?php echo $model->ID_VALOR; ?></h2></div>
		<div class="panel-body">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>