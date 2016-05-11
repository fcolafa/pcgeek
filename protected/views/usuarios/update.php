<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->NOMBRE_USUARIO=>array('view','id'=>$model->NOMBRE_USUARIO),
	'Modificar',
);

$this->menu=array(
	array('label'=>' Usuarios', 'url'=>array('index')),
	array('label'=>'Crear Usuarios', 'url'=>array('create')),
	array('label'=>'Ver Usuarios', 'url'=>array('view', 'id'=>$model->ID_USUARIO)),
	array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Modificar Usuario: <?php echo $model->NOMBRE_USUARIO; ?></h2></div>
		<div class="panel-body">
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
	</div>
</div>
