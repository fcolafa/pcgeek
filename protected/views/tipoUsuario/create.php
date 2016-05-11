<?php
/* @var $this TipoUsuarioController */
/* @var $model TipoUsuario */

$this->breadcrumbs=array(
	'Tipo Usuarios'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Tipos de Usuario', 'url'=>array('index')),
	array('label'=>'Administrar Tipos de Usuario', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Crear Tipos de Usuarios</h2></div>
		<div class="panel-body">
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
	</div>
</div>
