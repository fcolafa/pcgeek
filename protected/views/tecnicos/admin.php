<?php
/* @var $this TecnicosController */
/* @var $model Tecnicos */

$this->breadcrumbs=array(
	'Tecnicos'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver Técnicos', 'url'=>array('index')),
	array('label'=>'Crear Técnicos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tecnicos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Administrar Técnicos</h2></div>
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
				'id'=>'tecnicos-grid',
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'columns'=>array(
					array('name'=>'RUT_TECNICO',
								  'htmlOptions'=> array('width'=>'13%')
								),
					array('name'=>'NOMBRES_TECNICO',
								  'htmlOptions'=> array('width'=>'15%')
								),
					array('name'=>'APELLIDOS_TECNICO',
								  'htmlOptions'=> array('width'=>'15%')
								),
      		array('value'=>'($data->ESTADO=="0")?"Activo":"Inactivo"',
						'header'=>'Estado',
					  'htmlOptions'=> array('width'=>'7%')
					),
					array('name'=>'DIRECCION_TECNICO',
								  'htmlOptions'=> array('width'=>'30%')
								),
					array('name'=>'FONO_TECNICO',
								  'htmlOptions'=> array('width'=>'13%')
								),
					/*
					'DESCRIPCION',
					*/
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