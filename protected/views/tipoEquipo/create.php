<?php
/* @var $this TipoEquipoController */
/* @var $model TipoEquipo */

$this->breadcrumbs=array(
	'Tipo Equipos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver TipoEquipo', 'url'=>array('index')),
	array('label'=>'Administrar TipoEquipo', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2 class="text-center">Crear Tipo de Equipos</h2> </div>
		<div class="panel-body">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
			
	</div>
</div>