<?php
/* @var $this TipoUsuarioController */
/* @var $model TipoUsuario */

$this->breadcrumbs=array(
	'Tipo Usuarios'=>array('index'),
	$model->COD_TIPO_USUARIO=>array('view','id'=>$model->COD_TIPO_USUARIO),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Tipos de Usuario', 'url'=>array('index')),
	array('label'=>'Crear Tipo', 'url'=>array('create')),
	array('label'=>'Ver Tipos de Usuario', 'url'=>array('view', 'id'=>$model->COD_TIPO_USUARIO)),
	array('label'=>'Administrar Tipos de Usuario', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Modificar Tipo de Usuario #<?php echo $model->COD_TIPO_USUARIO; ?></h2></div>
		<div class="panel-body">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>