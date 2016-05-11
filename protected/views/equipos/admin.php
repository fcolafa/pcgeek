<?php
/* @var $this EquiposController */
/* @var $model Equipos */

$this->breadcrumbs=array(
	'Equiposes'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver Equipos', 'url'=>array('index')),
	array('label'=>'Crear Equipos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#equipos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Administrar Equipos</h2> </div>
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
	'id'=>'equipos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'ID_EQUIPOS',
		array('name'=>'CODIGO_INVENTARIO',
								  'htmlOptions'=> array('width'=>'10%')
								),
		array('name'=>'RUT_PROVEEDOR','htmlOptions'=> array('width'=>'16%'),'value'=>'$data->rUTPROVEEDOR->NOMBRE_PROVEEDOR'),
		//'RUT_PROVEEDOR',
		array('header'=>'Tipo Equipo','htmlOptions'=> array('width'=>'14%'),'value'=>'$data->iDTIPOEQUIPO->NOMBRE_TIPOEQUIPO'),
		array('name'=>'MODELO_EQUIPO',
								  'htmlOptions'=> array('width'=>'18%')
								),
		array('name'=>'ID_SUCURSAL',
								  'htmlOptions'=> array('width'=>'16%')
								),
		array('name'=>'UBICACION_EQUIPO',
								  'htmlOptions'=> array('width'=>'16%')
								),
		//'ID_TIPOEQUIPO',
		//array('name'=>'ID_SUCURSAL','value'=>'$data->sucursales->NOMBRE_SUCURSAL'),
		//array('name'=>'ID_SUCURSAL','value'=>'$data->sucursales->NOMBRE_SUCURSAL'),
		//'FECHA_COMPRA',
		//'FECHA_BAJA',
		/*
		'ESTADO_EQUIPO',
		'USUARIO_EQUIPO',
		'NUMERO_FACTURA',
		'OBSV_EQUIPO',
		'ID_TIPOEQUIPO',
		*/
		array(
			 'htmlOptions'=> array('width'=>'10%'),
			'header'=>'Opciones',
			'class'=>'CButtonColumn',
		),
	),
)); ?>
	</div>
</div>
