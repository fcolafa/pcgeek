<?php
/* @var $this InformesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Informes',
);

$this->menu=array(
	array('label'=>'Crear Informes', 'url'=>array('create')),
	array('label'=>'Administrar Informes', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Informes</h2></div>
		<div class="panel-body">

<?php $this->widget('zii.widgets.EColumnListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'columns'=>4,
)); ?>
	</div>
</div>