<?php
/* @var $this InformesController */
/* @var $model Informes */

$this->breadcrumbs=array(
	'Informes'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver Informes', 'url'=>array('index')),
	array('label'=>'Crear Informes', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#informes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="panel panel-primary">

	<div class="panel-heading text-center"><h2>Administrar Informes</h2></div>
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
			<div id='log'></div>
			<script>
			  function mostrarDetalles(){
			    var ID_INFORME = $.fn.yiiGridView.getSelection('visitas');
			    $.fn.yiiGridView.update('el_detalle',{ data: ID_INFORME });
			    
			  }
			</script>

			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'visitas',
				'selectionChanged'=>'mostrarDetalles',
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'columns'=>array(
					'ID_INFORME',
					array(
						'name' => 'ID_TECNICO',
						'value' => '$data->iDTECNICO->nombreCompleto',
			            'header'=>'Tecnico',
			            'filter'=> CHtml::listData(Tecnicos::model()->findAll(array('order'=>'ID_TECNICO')),'ID_TECNICO','nombreCompleto'),
			        ),
					array(
						'name' => 'ID_CLIENTE',
						'value' => '$data->iDCLIENTE->NOMBRE_CLIENTE',
			            'header'=>'Cliente',
			            'filter'=> CHtml::listData(Clientes::model()->findAll(array('order'=>'ID_CLIENTE')),'ID_CLIENTE','NOMBRE_CLIENTE'),
			        ),
                    array(
						'name' => 'ID_UBICACION',
						'value' => '$data->iDUBICACION->UBICACION',
			            'header'=>'Ubicacion',
			            'filter'=> CHtml::listData(Ubicaciones::model()->findAll(array('order'=>'ID_UBICACION')),'ID_UBICACION','UBICACION'),
			        ),
			        array(
						'name' => 'FECHA_INGRESO',
						'value' => '$data->FECHA_INGRESO',
			            'header'=>'Fecha',
			        ),

					array(
						'header'=>'Opciones',
						'class'=>'CButtonColumn',
					),
				),
			)); 

			$this->widget('zii.widgets.grid.CGridView', array(
			  'id'=>'el_detalle',
			  'dataProvider'=>$dP_detalle,
			    'columns'=>array(
			    	'ID_INFORME',
			    	array(
						'name'=>'ID_VISITA',
						'value'=>'$data->iDVISITA->TIPO_VISITA',
						'header'=>'Tipo Visita',
					 ),
			    	array(
						'name'=>'ID_VISITA',
						'value'=>'$data->iDVISITA->NOMBRE_VISITA',
						'header'=>'Motivo Visita',
					 ),
			    	array(
						'name'=>'ID_ESTADO',
						'value'=>'$data->iDESTADO->ESTADO',
						'header'=>'Estado',
					 ),
			        
			    ),
			));
			?>
