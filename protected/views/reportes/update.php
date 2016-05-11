<?php
/* @var $this SistemaController */
/* @var $model Sistema */

$this->breadcrumbs=array(
	'Sistemas'=>array('index'),
	$model->COD_SISTEMA=>array('view','id'=>$model->COD_SISTEMA),
	'Modificar',
);

$this->menu=array(
	array('label'=>' Sistema', 'url'=>array('index')),
	array('label'=>'Crear Sistema', 'url'=>array('create')),
	array('label'=>'Ver Sistema', 'url'=>array('view', 'id'=>$model->COD_SISTEMA)),
	array('label'=>'Administrar Sistema', 'url'=>array('admin')),
);
?>

<h1>Modificar Sistema <?php echo $model->COD_SISTEMA; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>