<?php
/* @var $this CanalCamarasController */
/* @var $model CanalCamaras */

$this->breadcrumbs=array(
	'Canal Camaras'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver Canal Camaras', 'url'=>array('index')),
	array('label'=>'Crear Canal Camaras', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#canal-camaras-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="panel panel-primary">
		<div class="panel-heading text-center"><h2>Administrar Canal Camaras</h2></div>
			<div class="panel-body">
<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->

<div class="search-form" style="display:none">
	<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'canal-camaras-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		 	array(
						'name' => 'ID_SUCURSAL',
						'value' => '$data->sucursales->getNombreCompleto()',
			 			'htmlOptions'=> array('width'=>'25%'),
			            'header'=>'Cliente, Sucursal',
			            'filter'=> CHtml::listData(Sucursales::model()->findAll(), 'ID_SUCURSAL', 'NOMBRE_SUCURSAL'),
			        ),
			array(	'name' => 'NUM_CAMARA',
							'header'=>'N° Canal',
							'htmlOptions'=> array('width'=>'6%'),
					),
			array(	'name' => 'UBICACION_CAMARA',
							'htmlOptions'=> array('width'=>'20%'),
					),
			array(	'name' => 'FECHA_CAMBIO_CAMARA',
							'header'=>'Fecha cambio',
							'htmlOptions'=> array('width'=>'10%'),
					),
			array(	'name' => 'OBSERVACION_CAMARA',
							'htmlOptions'=> array('width'=>'25%'),
					),
			array(	'name' => 'ESTADO_CAMARA',
							'header'=>'Estado',
							'htmlOptions'=> array('width'=>'6%'),
					),
		array(	'class'=>'CButtonColumn',
						'header'=>'Opciones',
						'htmlOptions'=> array('width'=>'8%'),
		),
	),
)); ?>
	</div>
</div>