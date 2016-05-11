<?php
/* @var $this VisitasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Visitas',
);

$this->menu=array(
	array('label'=>'Crear Visitas', 'url'=>array('create')),
	array('label'=>'Administrar Visitas', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Visitas</h2></div>
		<div class="panel-body">

<?php $this->widget('zii.widgets.EColumnListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'columns'=>4,
)); ?>
	</div>
</div>
