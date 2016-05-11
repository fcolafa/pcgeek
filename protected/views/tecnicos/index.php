<?php
/* @var $this TecnicosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tecnicos',
);

$this->menu=array(
	array('label'=>'Crear Técnicos', 'url'=>array('create')),
	array('label'=>'Administrar Técnicos', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Técnicos</h2></div>
		<div class="panel-body">

<?php $this->widget('zii.widgets.EColumnListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'columns'=>4,
)); ?>
