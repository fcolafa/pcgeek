<?php
/* @var $this UsuariosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuarios',
);

$this->menu=array(
	array('label'=>'Crear Usuarios', 'url'=>array('create')),
	array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Usuarios</h2></div>
		<div class="panel-body">

<?php $this->widget('zii.widgets.EColumnListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'columns'=>4,
)); ?>
