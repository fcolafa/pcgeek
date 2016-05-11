<?php
/* @var $this ClientesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clientes',
);

$this->menu=array(
	array('label'=>'Crear Clientes', 'url'=>array('create')),
	array('label'=>'Administrar Clientes', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Clientes</h2></div>
		<div class="panel-body">

<?php $this->widget('zii.widgets.EColumnListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'columns'=>4,
)); ?>
	</div>
</div>