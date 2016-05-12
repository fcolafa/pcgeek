<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver Usuarios', 'url'=>array('index')),
	array('label'=>'Crear Usuarios', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuarios-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Administrar Usuarios</h2> </div>
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


<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuarios-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'NOMBRE_USUARIO',
		array(
		 	'name'  => 'ID_CLIENTE',
			'header'=> 'Cliente',			
			'value' => '$data->ID_CLIENTE==0 ? null : $data->iDCLIENTE->NOMBRE_CLIENTE',
			'filter'=> CHtml::listData(Clientes::model()->findAll(array('order'=>'NOMBRE_CLIENTE')),'ID_CLIENTE','NOMBRE_CLIENTE'),
		),
		array(
		 	'name'  => 'ID_TECNICO',
			'header'=> 'Tecnico',
			'value' => '$data->ID_TECNICO==0 ? null : $data->iDTECNICO->nombreCompleto',
			'filter'=> CHtml::listData(Tecnicos::model()->findAll(array('order'=>'APELLIDOS_TECNICO')),'ID_TECNICO','APELLIDOS_TECNICO'),
		),
		array(
		 	'name'  => 'COD_TIPO_USUARIO',
			'header'=> 'Tipo de Usuario',
			'value' => '$data->tipoUsuario->TIPO_USUARIO',
		),
		array(
			'header'=>'Opciones',
                        'class'=>'CButtonColumn',
                        'template'=>'{view}{update}{delete}',
                        'buttons'=>array(
                            'update'=>array(
                             //   'imageUrl'=>Yii::app()->request->baseUrl.'/images/use.png',
                           // 'url'=>'UsuariosController::getAdminAction($data->ID_USUARIO);',                          
                            'url'=>'Yii::app()->user->A1()?Yii::app()->controller->createUrl("update",array("id"=>$data->ID_USUARIO)):Yii::app()->controller->createUrl("updateProfile",array("id"=>$data->ID_USUARIO));',
                           'visible'=>'Yii::app()->user->getUser_Id()==$data->ID_USUARIO',    
                         ),

		),
                    ),),
	
	)); 
?>
	</div>
</div>