<?php
/* @var $this TipoUsuarioController */
/* @var $model TipoUsuario */

$this->breadcrumbs=array(
	'Tipo Usuarios'=>array('index'),
	$model->COD_TIPO_USUARIO,
);

$this->menu=array(
	array('label'=>'Ver Tipos de Usuario', 'url'=>array('index')),
	array('label'=>'Crear Tipo', 'url'=>array('create')),
	array('label'=>'Actualizar Tipo', 'url'=>array('update', 'id'=>$model->COD_TIPO_USUARIO)),
	array('label'=>'Borrar Tipo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->COD_TIPO_USUARIO),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar Tipos de Usuario', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Tipo de Usuario : <?php echo $model->COD_TIPO_USUARIO; ?></h2></div>
		<div class="panel-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'COD_TIPO_USUARIO',
		'TIPO_USUARIO',
		'C',
		'R',
		'U',
		'D',
	),
)); ?>
	</div>
</div>
