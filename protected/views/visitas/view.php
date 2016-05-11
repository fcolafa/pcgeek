<?php
/* @var $this VisitasController */
/* @var $model Visitas */

$this->breadcrumbs=array(
	'Visitases'=>array('index'),
	$model->ID_VISITA,
);

$this->menu=array(
	array('label'=>'Ver Visitas', 'url'=>array('index')),
	array('label'=>'Crear Visitas', 'url'=>array('create')),
	array('label'=>'Actualizar Visitas', 'url'=>array('update', 'id'=>$model->ID_VISITA)),
	array('label'=>'Borrar Visitas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_VISITA),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar Visitas', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Visitas: <?php echo $model->NOMBRE_VISITA ; ?></h2></div>
		<div class="panel-body">
<!--- falta mostrar el tipo de visita-->
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		 array(
			'name'=>'TIPO_VISITA',
			'value'=>$model->iDTIPOVISITA->TIPO,
		 ),
		'DESCRIPCION',
	),
)); ?>
	</div>
</div>
