<?php
/* @var $this TipoUsuarioController */
/* @var $model TipoUsuario */

$this->breadcrumbs=array(
	'Tipo Usuarios'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver Tipos de Usuario', 'url'=>array('index')),
	array('label'=>'Crear Tipo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tipo-usuario-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="span6 offset3">
	<div class="panel panel-primary">
		<div class="panel-heading text-center"><h2>Tipos de Usuarios</h2></div>
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
				'id'=>'tipo-usuario-grid',
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'columns'=>array(
					array('name'=>'COD_TIPO_USUARIO',
								 'htmlOptions'=> array('width'=>'30%')
								),
					array('name'=>'TIPO_USUARIO',
								 'htmlOptions'=> array('width'=>'50%') 
								),
					array(
						'header'=>'Opciones',
						'htmlOptions'=> array('width'=>'20%'),
						'class'=>'CButtonColumn',
					),
				),
			)); ?>
		</div>
	</div>
</div>