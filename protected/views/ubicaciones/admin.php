<?php
/* @var $this UbicacionesController */
/* @var $model Ubicaciones */

$this->breadcrumbs=array(
	'Ubicaciones'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver Ubicaciones', 'url'=>array('index')),
	array('label'=>'Crear Ubicaciones', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ubicaciones-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="span8 offset2">
	<div class="panel panel-primary">
		<div class="panel-heading text-center"><h2>Administrar Ubicaciones</h2></div>
		<div class="panel-body">

			<!--
			<p>
			You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
			or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
			</p>

			<?php //echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
			<div class="search-form" style="display:none">
			<?php //$this->renderPartial('_search',array('model'=>$model,)); ?> -->

			<!-- </div> search-form -->

				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'ubicaciones-grid',
					'dataProvider'=>$model->search(),
					'filter'=>$model,
					'columns'=>array(
						'ID_UBICACION',
						'REGION',
						'UBICACION',
						array(
				            'header'=>'Opciones',
							'class'=>'CButtonColumn',
						),
					),
				)); ?>
    </div>
	</div>
</div>