<?php
/* @var $this CanalCamarasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Canal Camaras',
);

$this->menu=array(
	array('label'=>'Crear Canal Camaras', 'url'=>array('create')),
	array('label'=>'Administrar Canal Camaras', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
		<div class="panel-heading text-center"><h2>Canal Camaras</h2></div>
			<div class="panel-body">

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
	</div>
</div>
