<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->NOMBRE_USUARIO,
);

$this->menu=array(
	array('label'=>'Ver Usuarios', 'url'=>array('index')),
	array('label'=>'Crear Usuarios', 'url'=>array('create')),
	array('label'=>'Actualizar Usuarios', 'url'=>array('update', 'id'=>$model->ID_USUARIO)),
	array('label'=>'Borrar Usuarios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_USUARIO),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Usuario: <?php echo $model->NOMBRE_USUARIO; ?></h2></div>
		<div class="panel-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(

		//'CONTRASENA_USUARIO',
		array(
			'name'=>'ID_TECNICO',
			'value'=> $model->ID_TECNICO==0 ? null : $model->iDTECNICO->nombreCompleto,
		 ),
		array(
			'name'=>'ID_CLIENTE',
			'value'=>$model->ID_CLIENTE==0 ? null : $model->iDCLIENTE->NOMBRE_CLIENTE,
		 ),
		array(
			'name'=>'COD_TIPO_USUARIO',
			'value'=>$model->tipoUsuario->TIPO_USUARIO,
		 ),
		array(
			'name'=>'EMAIL_USUARIO',
			'value'=>$model->EMAIL_USUARIO,
		 ),
	),
)); ?>
	</div>
</div>
