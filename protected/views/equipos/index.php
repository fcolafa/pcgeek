<?php
/* @var $this EquiposController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Equipos',
);

$this->menu=array(
	array('label'=>'Crear Equipos', 'url'=>array('create')),
	array('label'=>'Administrar Equipos', 'url'=>array('admin')),
);
?>
<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Equipos</h2> </div>
		<div class="panel-body">

<?php $this->widget('zii.widgets.EColumnListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'columns'=>4,

)); ?>
	</div>
</div>
