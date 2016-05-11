<?php
/* @var $this DetalleInformeController */
/* @var $model DetalleInforme */

$this->breadcrumbs=array(
	'Informes Mantenciones'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver Detalle Informe', 'url'=>array('index')),
	array('label'=>'Crear Detalle Informe', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#informes-mantenciones-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Administrar Detalle de Informes</h2></div>
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
	'id'=>'informes-mantenciones-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ID_INFORME_DET',
		'ID_VISITA',
		'ID_INFORME',
		'ID_ESTADO',
		'VALOR',
		array(
						'header'=>'Opciones',
						'class'=>'CButtonColumn',
					),
	),
)); ?>
		</div>
	</div>
</div>