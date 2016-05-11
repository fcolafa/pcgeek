<?php
/* @var $this TipoEquipoController */
/* @var $model TipoEquipo */

$this->breadcrumbs=array(
	'Tipo Equipos'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver TiposEquipo', 'url'=>array('index')),
	array('label'=>'Crear TipoEquipo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tipo-equipo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="span6 offset3">
	<div class="panel panel-primary">
		<div class="panel-heading text-center"><h2 class="text-center">Administrar Tipo de Equipos</h2> </div>
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
	'id'=>'tipo-equipo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array('name'=>'ID_TIPOEQUIPO',
					'header'=>'ID',
				  'htmlOptions'=> array('width'=>'25%')
				),
		array('name'=>'NOMBRE_TIPOEQUIPO',
					'header'=>'Tipo de Equipo',
				  'htmlOptions'=> array('width'=>'60%')
				),
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=> array('width'=>'15%'),
			'header'=>'Opciones',
		),
	),
)); ?>
		</div>
	</div>
</div>