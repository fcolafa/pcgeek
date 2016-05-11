<?php
/* @var $this IncidentesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Incidentes',
);

$this->menu=array(
	array('label'=>'Crear Incidentes', 'url'=>array('create')),
	array('label'=>'Administrar Incidentes', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Incidentes</h2> </div>
		<div class="panel-body">

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>
</div>