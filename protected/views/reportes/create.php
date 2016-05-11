<?php
/* @var $this SistemaController */
/* @var $model Sistema */

$this->breadcrumbs=array(
	'Sistemas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Sistema', 'url'=>array('index')),
	array('label'=>'Administrar Sistema', 'url'=>array('admin')),
);
?>

<h1>Crear Sistema</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>