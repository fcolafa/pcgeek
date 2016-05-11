<?php
/* @var $this SucursalesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sucursales',
);

$this->menu=array(
	array('label'=>'Crear Sucursales', 'url'=>array('create')),
	array('label'=>'Administrar Sucursales', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Sucursales</h2></div>
		<div class="panel-body">

<?php $this->widget('zii.widgets.EColumnListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'columns'=>4,
)); ?>
	</div>
</div>
