<?php
/* @var $this SucursalesController */
/* @var $model Sucursales */

$this->breadcrumbs=array(
	'Sucursales'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver Sucursales', 'url'=>array('index')),
	array('label'=>'Crear Sucursales', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sucursales-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Administrar Sucursales</h2></div>
		<div class="panel-body">


<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

			<?php //echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
			<div class="search-form" style="display:none">
			<?php //$this->renderPartial('_search',array('model'=>$model,)); ?>
			</div> -->

			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'sucursales-grid',
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'columns'=>array(
					array(
					 	'name'  => "ID_CLIENTE",
						'header'=> 'Cliente',
						'htmlOptions'=> array('width'=>'17%'),
						'value' => '$data->iDCLIENTE->NOMBRE_CLIENTE',
						'filter'=> CHtml::listData(Clientes::model()->findAll(array('order'=>'NOMBRE_CLIENTE')),'ID_CLIENTE','NOMBRE_CLIENTE'),
					),
					array('name'=>'NOMBRE_SUCURSAL',
								  'htmlOptions'=> array('width'=>'15%')
								),
					array('name'=>'DIRECCION_SUCURSAL',
								  'htmlOptions'=> array('width'=>'30%')
								),
					array('name'=>'CONTACTO_SUCURSAL',
								  'htmlOptions'=> array('width'=>'15%')
								),
					array('name'=>'FONO_SUCURSAL',
								  'htmlOptions'=> array('width'=>'13%')
								),
					/*
					'DESCRIPCION',
					*/
					array(
						'header'=>'Opciones',
						'htmlOptions'=> array('width'=>'10%'),
						'class'=>'CButtonColumn',
					),
				),
			)); ?>
