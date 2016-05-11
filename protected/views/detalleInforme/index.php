<?php
/* @var $this DetalleInformeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Detalles de Informes',
);

$this->menu=array(
	array('label'=>'Crear Detalle a Informe', 'url'=>array('create')),
	array('label'=>'Administrar Detalle de Informe', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Detalle de Informe</h2></div>
		<div class="panel-body">

<?php $this->widget('zii.widgets.EColumnListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'columns'=>4,
)); ?>
	</div>
</div>