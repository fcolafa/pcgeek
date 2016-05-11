<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */

$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver Proveedores', 'url'=>array('index')),
	array('label'=>'Crear Proveedores', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#proveedores-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2 class="text-center">Administrar Proveedores</h2> </div>
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
					'id'=>'proveedores-grid',
					'dataProvider'=>$model->search(),
					'filter'=>$model,
					'columns'=>array(
						array('name'=>'RUT_PROVEEDOR',
								  'htmlOptions'=> array('width'=>'13%')
								),
						array('name'=>'NOMBRE_PROVEEDOR',
								  'htmlOptions'=> array('width'=>'30%')
								),
						array('name'=>'DIRECCION_PROVEEDOR',
								  'htmlOptions'=> array('width'=>'27%')
								),
						array('name'=>'CIUDAD_PROVEEDOR',
								  'htmlOptions'=> array('width'=>'20%')
								),
						array(
							'class'=>'CButtonColumn',
							'htmlOptions'=> array('width'=>'10%'),
							'header'=>'Opciones',
						),
					),
				)); ?>
	</div>
</div>