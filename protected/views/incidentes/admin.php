<?php
/* @var $this IncidentesController */
/* @var $model Incidentes */

$this->breadcrumbs=array(
	'Incidentes'=>array('index'),
	'Administrar',

);

$this->menu=array(
	array('label'=>'Ver Incidentes', 'url'=>array('index')),
	array('label'=>'Crear Incidentes', 'url'=>array('create')),
	array('label'=>'Exportar a Pdf', 'url'=>array('exportpdf')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#incidentes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="panel panel-primary">

	<div class="panel-heading text-center"><h3>Administrar Incidentes</h3></div>
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

<script>
			  function mostrarDetalles(){
			    var ID_INCIDENTE = $.fn.yiiGridView.getSelection('incidente');
			    $.fn.yiiGridView.update('el_detalle',{ data: ID_INCIDENTE });
			    
			  }
</script>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'incidente',
	'selectionChanged'=>'mostrarDetalles',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
/*		array(	'name' => 'ID_INCIDENTE',
						'htmlOptions'=> array('width'=>'5%'),
					),*/
		array(	'name' => 'CLIENTE',
						'htmlOptions'=> array('width'=>'15%'),
					),
		array(	'name' => 'NOMBRE_SUCURSAL',
						'htmlOptions'=> array('width'=>'15%'),
					),
		array(	'name' => 'MES',
						'htmlOptions'=> array('width'=>'5%'),
					),
		array(	'name' => 'PERIODO',
						'htmlOptions'=> array('width'=>'5%'),
					),
		array(	'name' => 'TIPO_INCIDENTE',
						'htmlOptions'=> array('width'=>'15%'),
					),
		array(	'name' => 'DESCRIPCION_INCIDENTE',
						'htmlOptions'=> array('width'=>'25%'),
					),
		array(  'header'=>'Imagen',
            'value'=>'CHtml::image(Yii::app()->request->baseUrl."/images/".$data->IMAGEN,"alt",array("width" => 100, "height" => 100))',
            'type'  => 'html',
            'htmlOptions'=> array('width'=>'13%'),
            ),
		array(
			 'class'=>'CButtonColumn',
					'template' =>'{view} {update} {delete}',
					'header' => 'Opciones',
					'htmlOptions' => array('width'=>'5%', 'class'=>'text-center'),
					'buttons'=>array(
						'view' => array(
							'url'=>'Yii::app()->createUrl("Incidentes/view", array("id"=>$data["ID_INCIDENTE"]))',
							'label'=>'Ver',
						),
						'update' => array(
							'url'=>'Yii::app()->createUrl("Incidentes/update", array("id"=>$data["ID_INCIDENTE"]))',
							'label'=>'Ver',
						),
						'delete' => array(
							'url'=>'Yii::app()->createUrl("Incidentes/delete", array("id"=>$data["ID_INCIDENTE"]))',
							'label'=>'Ver',
						),
					),
					'htmlOptions'=> array('width'=>'7%'),
		),
	),
));

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'el_detalle',
	'dataProvider'=>$dp_Imagen,
	'columns'=>array(
		array(
                        'header'=>'IMAGEN',
                        'value'=>'CHtml::image(Yii::app()->request->baseUrl."/images/".$data->IMAGEN,"alt",array("width" => 500, "height" => 400))',
                        'type'  => 'html',
                        'htmlOptions'=> array('class'=>'text-center'),
                        ),
	),
)); ?>
