<?php
/* @var $this TipoVisitasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Visitas',
);

$this->menu=array(
	array('label'=>'Crear Tipo de visita', 'url'=>array('create')),
	array('label'=>'Administrar Tipo Visita', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Tipos de visitas</h2> </div>
		<div class="panel-body">

<?php $this->widget('zii.widgets.EColumnListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'columns'=>4,
)); ?>
