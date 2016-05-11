<?php
/* @var $this VisitasController */
/* @var $model Visitas */

$this->breadcrumbs=array(
	'Visitas'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver Visitas', 'url'=>array('index')),
	array('label'=>'Crear Visitas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#visitas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Administrar Visitas</h2></div>
		<div class="panel-body">

			<!--
			<p>
			You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
			or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
			</p>

			<?php //echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
			<div class="search-form" style="display:none">
			<?php //$this->renderPartial('_search',array('model'=>$model,)); ?>
			</div>
		-->

			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'visitas-grid',
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'columns'=>array(
					array('name'=>'ID_VISITA',
								  'htmlOptions'=> array('width'=>'13%')
								),
					array(
					 	'name'  => "TIPO_VISITA",
						'header'=> 'Tipo visita',
						'value' => '$data->iDTIPOVISITA->TIPO',
						'htmlOptions'=> array('width'=>'20%'),
						'filter'=> CHtml::listData(TipoVisitas::model()->findAll(array('order'=>'TIPO')),'ID_TIPO_VISITA','TIPO'),
					),
					array('name'=>'NOMBRE_VISITA',
								  'htmlOptions'=> array('width'=>'20%')
								),
					array('name'=>'DESCRIPCION',
								  'htmlOptions'=> array('width'=>'40%')
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
