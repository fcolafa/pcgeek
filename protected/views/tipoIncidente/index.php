<?php
/* @var $this TipoIncidenteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Incidentes',
);

$this->menu=array(
	array('label'=>'Crear Tipo Incidente', 'url'=>array('create')),
	array('label'=>'Administrar Tipo Incidente', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Tipo Incidentes</h2></div>
		<div class="panel-body">

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

	</div>
</div>