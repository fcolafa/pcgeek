<?php
/* @var $this ValoresController */
/* @var $model Valores */

$this->breadcrumbs=array(
	'Valores'=>array('index'),
	$model->ID_VALOR,
);

$this->menu=array(
	array('label'=>'Ver Valores', 'url'=>array('index')),
	array('label'=>'Crear Valores', 'url'=>array('create')),
	array('label'=>'Actualizar Valores', 'url'=>array('update', 'id'=>$model->ID_VALOR)),
	array('label'=>'Borrar Valores', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_VALOR),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar Valores', 'url'=>array('admin')),
);
?>
<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>ID Valor <?php echo $model->ID_VALOR; ?></h2></div>
		<div class="panel-body">
<table class="table table-condensed">
		<tr>
			<td class="col-md-2 success"> Visita </td><td class="success"><?=$model->iDVISITA->NOMBRE_VISITA;?></td>
			<td class="col-md-2 info"> Valor </td><td class="col-md-3 info"><?=$model->VALOR;?></td>
		</tr>
    <tr>
    	<td class="success"> Ubicacion </td><td colspan="3" class="success"><?=$model->iDUBICACION->UBICACION;?></td>
		</tr>
</table>
	</div>
</div>
