<?php
/* @var $this TipoEquipoController */
/* @var $model TipoEquipo */

$this->breadcrumbs=array(
	'Tipo Equipos'=>array('index'),
	$model->ID_TIPOEQUIPO,
);

$this->menu=array(
	array('label'=>'Ver TipoEquipo', 'url'=>array('index')),
	array('label'=>'Crear TipoEquipo', 'url'=>array('create')),
	array('label'=>'Actualizar TipoEquipo', 'url'=>array('update', 'id'=>$model->ID_TIPOEQUIPO)),
	array('label'=>'Borrar TipoEquipo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_TIPOEQUIPO),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar TipoEquipo', 'url'=>array('admin')),
);
?>
<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2 class="text-center">Tipo Equipo : <?php echo $model->NOMBRE_TIPOEQUIPO; ?></h2> </div>
		<div class="panel-body">
<table class="table table-condensed">
	<tr>
		<td class="col-md-2 success">ID</td> <td class="success"><?=$model->ID_TIPOEQUIPO;?></td>
	</tr>
	<tr>
		<td class="col-md-2 success">Tipo</td> <td class="success"><?=$model->NOMBRE_TIPOEQUIPO;?></td>
	</tr>
	</table>

<!--<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_TIPOEQUIPO',
		'NOMBRE_TIPOEQUIPO',
	),
));*/ ?>-->
	</div>
</div>