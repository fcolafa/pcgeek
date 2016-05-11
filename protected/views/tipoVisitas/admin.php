<?php
/* @var $this TipoVisitasController */
/* @var $model TipoVisitas */

$this->breadcrumbs=array(
	'Tipo Visitases'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver Tipo de Visitas', 'url'=>array('index')),
	array('label'=>'Crear Tipo de Visitas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tipo-visitas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="span8 offset2">
	<div class="panel panel-primary">
		<div class="panel-heading text-center"><h2>Administrar Tipo de Visitas</h2></div>
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
				'id'=>'tipo-visitas-grid',
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'columns'=>array(
					array('name'=>'TIPO',
								  'htmlOptions'=> array('width'=>'35%')
								),
					array('name'=>'DESCRIPCION',
								  'htmlOptions'=> array('width'=>'55%')
								),
					array(
						'header'=>'Opciones',
						'htmlOptions'=> array('width'=>'10%'),
						'class'=>'CButtonColumn',
					),
				),
			)); ?>
		</div>
	</div>
</div>