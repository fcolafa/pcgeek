<?php
/* @var $this TecnicosController */
/* @var $model Tecnicos */

$this->breadcrumbs=array(
	'Tecnicos'=>array('index'),
	$model->ID_TECNICO,
);

$this->menu=array(
	array('label'=>'Ver Tecnicos', 'url'=>array('index')),
	array('label'=>'Crear Tecnicos', 'url'=>array('create')),
	array('label'=>'Actualizar Tecnicos', 'url'=>array('update', 'id'=>$model->ID_TECNICO)),
	array('label'=>'Borrar Tecnicos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_TECNICO),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar Tecnicos', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Técnico: <?php echo $model->APELLIDOS_TECNICO.", ".$model->NOMBRES_TECNICO; ?></h2></div>
		<div class="panel-body">

<table class="table table-condensed">
		<tr>
			<td class="col-md-2 success"> Rut </td><td class="success"><?=$model->RUT_TECNICO;?></td>
			<td class="col-md-2 info"> Estado </td><td class="col-md-3 info"><?=$model->ESTADO;?></td>
		</tr>
        <tr>
			<td class="col-md-2 success"> Direccion </td><td class="success"><?=$model->DIRECCION_TECNICO;?></td>
			<td class="col-md-2 info"> Fono </td><td class="col-md-3 info"><?=$model->FONO_TECNICO;?></td>
		</tr>
        <tr>
			<td class="success"> Descripcion </td><td colspan="3" class="success"><?=$model->DESCRIPCION;?></td>
		</tr>
</table>
	</div>
</div>