<?php
/* @var $this ProveedoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Proveedores',
);

$this->menu=array(
	array('label'=>'Crear Proveedores', 'url'=>array('create')),
	array('label'=>'Administrar Proveedores', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2 class="text-center">Proveedores</h2> </div>
		<div class="panel-body">

<?php $this->widget('zii.widgets.EColumnListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'columns'=>4,
)); ?>
