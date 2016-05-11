<?php
/* @var $this ValoresController */
/* @var $model Valores */

$this->breadcrumbs=array(
	'Valores'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver Valores', 'url'=>array('index')),
	array('label'=>'Crear Valores', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#valores-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Administrar Valores</h2></div>
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
	'id'=>'valores-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array('name'=>'ID_VALOR',
								  'htmlOptions'=> array('width'=>'10%')
								),
        array(
						'name' => 'ID_VISITA',
						'value' => '$data->iDVISITA->NOMBRE_VISITA',
						'htmlOptions'=> array('width'=>'40%'),
			            'header'=>'Visita',
			            'filter'=> CHtml::listData(Visitas::model()->findAll(array('order'=>'ID_VISITA')),'ID_VISITA','NOMBRE_VISITA'),
			        ),
         array(
						'name' => 'ID_UBICACION',
						'value' => '$data->iDUBICACION->UBICACION',
			 			'htmlOptions'=> array('width'=>'30%'),
			            'header'=>'Ubicacion',
			            'filter'=> CHtml::listData(Ubicaciones::model()->findAll(), 'ID_UBICACION', 'UBICACION'),
			        ),
        
		array('name'=>'VALOR',
								  'htmlOptions'=> array('width'=>'13%')
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
