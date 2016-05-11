<?php
/* @var $this TipoEquipoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Equipos',
);

$this->menu=array(
	array('label'=>'Crear TipoEquipo', 'url'=>array('create')),
	array('label'=>'Administrar TipoEquipo', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2 class="text-center">Tipos de Equipos</h2> </div>
		<div class="panel-body">

<?php $this->widget('zii.widgets.EColumnListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'columns'=>4,
)); ?>
	</div>
</div>