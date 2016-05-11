<?php
/* @var $this TipoIncidenteController */
/* @var $model TipoIncidente */

$this->breadcrumbs=array(
	'Tipo Incidentes'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver Tipo Incidente', 'url'=>array('index')),
	array('label'=>'Crear Tipo Incidente', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tipo-incidente-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Administrar Tipo Incidentes</h2></div>
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
	'id'=>'tipo-incidente-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array('name'=>'ID_TIPO_INCIDENTE',
								  'htmlOptions'=> array('width'=>'10%')
								),
		array('name'=>'NOMBRE_TIPO_INCIDENTE',
								  'htmlOptions'=> array('width'=>'25%')
								),
		array('name'=>'DESCRIPCION_TIPO_INICIDENTE',
								  'htmlOptions'=> array('width'=>'58%')
								),
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=> array('width'=>'7%'),
			'header'=>'Opciones',
		),
	),
)); ?>
