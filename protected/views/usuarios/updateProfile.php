<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

$this->breadcrumbs=array(
	'Actualizar Perfil',
);

$this->menu=array(
	//array('label'=>'Usuarios', 'url'=>array('index')),
	//array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Actualizar Perfil: <?php echo $model->NOMBRE_USUARIO; ?></h2></div>
		<div class="panel-body">
			<?php $this->renderPartial('_formProfile', array('model'=>$model)); ?>
		</div>
	</div>
</div>
