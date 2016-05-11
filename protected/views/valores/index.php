<?php
/* @var $this ValoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Valores',
);

$this->menu=array(
	array('label'=>'Crear Valores', 'url'=>array('create')),
	array('label'=>'Administrar Valores', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Valores</h2></div>
		<div class="panel-body">


<?php $this->widget('zii.widgets.EColumnListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'columns'=>4,
)); ?>
