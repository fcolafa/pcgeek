<?php
/* @var $this UbicacionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ubicaciones',
);

$this->menu=array(
	array('label'=>'Crear Ubicaciones', 'url'=>array('create')),
	array('label'=>'Administrar Ubicaciones', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Ubicaciones</h2></div>
		<div class="panel-body">

<?php $this->widget('zii.widgets.EColumnListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'columns'=>4,
)); ?>
	</div>
</div>