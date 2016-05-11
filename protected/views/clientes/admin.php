<?php
/* @var $this ClientesController */
/* @var $model Clientes */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver Clientes', 'url'=>array('index')),
	array('label'=>'Crear Clientes', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#clientes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="panel panel-primary">

	<div class="panel-heading text-center"><h2>Administrar Clientes</h2></div>
		<div class="panel-body">
<!-- 			
			<p>
			You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
			or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
			</p>
			
			<?php //echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
			<div class="search-form" style="display:none">
			<?php //$this->renderPartial('_search',array('model'=>$model,)); ?>
			</div>  -->
			
			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'clientes-grid',
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'columns'=>array(
					array('name'=>'RUT_CLIENTE',
								  'htmlOptions'=> array('width'=>'12%')
								),
					array('name'=>'NOMBRE_CLIENTE',
								  'htmlOptions'=> array('width'=>'28%')
								),
					array('name'=>'DIRECCION_CLIENTE',
								  'htmlOptions'=> array('width'=>'29%')
								),
					array('name'=>'FONO_CLIENTE',
								  'htmlOptions'=> array('width'=>'12%')
								),
					array('name'=>'FONO_CONTACTO',
								  'htmlOptions'=> array('width'=>'12%')
								),
					array(
						'header'=>'Opciones',
						'htmlOptions'=> array('width'=>'7%'),
						'class'=>'CButtonColumn',
					),
				),
			)); ?>
		</div>
	</div>
</div>