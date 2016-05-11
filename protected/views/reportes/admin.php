<?php
/* @var $this SistemaController */
/* @var $model Sistema */

$this->breadcrumbs=array(
	'Sistemas'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver Sistema', 'url'=>array('index')),
	array('label'=>'Crear Sistema', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sistema-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Sistemas</h1>

<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->
<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sistema-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'COD_SISTEMA',
		'MATRICULA_BARCO',
		'NOMBRE_SISTEMA',
		'DESCRIPCION_SISTEMA',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
