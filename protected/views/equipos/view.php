<?php
/* @var $this EquiposController */
/* @var $model Equipos */

$this->breadcrumbs=array(
	'Equipos'=>array('index'),
	$model->ID_EQUIPOS,
);

$this->menu=array(
	array('label'=>'Ver Equipos', 'url'=>array('index')),
	array('label'=>'Crear Equipos', 'url'=>array('create')),
	array('label'=>'Actualizar Equipos', 'url'=>array('update', 'id'=>$model->ID_EQUIPOS)),
	array('label'=>'Borrar Equipos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_EQUIPOS),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar Equipos', 'url'=>array('admin')),
	array('label'=>'Duplicar','url'=>array('create','id'=>$model->ID_EQUIPOS,'class'=>'btn btn-success')),

);
?>
<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Equipos <?php echo $model->MODELO_EQUIPO; ?></h2> </div>
		<div class="panel-body">
<table class="table table-condensed">

	<tr>
		<td class="col-md-2 success">ID</td> <td class="success"><?=$model->ID_EQUIPOS;?></td>
	</tr>
	<tr>
		<td class="col-md-2 success">Proveedor</td> <td class="success"><?=$model->rUTPROVEEDOR->NOMBRE_PROVEEDOR;?></td>
	</tr>
	<tr>
		<td class="col-md-2 success">Codigo</td> <td class="success"><?=$model->CODIGO_INVENTARIO;?></td>
	</tr>
	<tr>
		<td class="col-md-2 success">Tipo Equipo</td> <td class="success"><?=$model->iDTIPOEQUIPO->NOMBRE_TIPOEQUIPO;?></td>
	</tr>
	<tr>
		<td class="col-md-2 success">Modelo</td> <td class="success"><?=$model->MODELO_EQUIPO;?></td>
	</tr>
	<tr>
		<td class="col-md-2 success">Fecha Compra</td> <td class="success"><?=$model->FECHA_COMPRA;?></td>
	</tr>
	<tr>
		<td class="col-md-2 success">Fecha Baja</td> <td class="success"><?=$model->FECHA_BAJA;?></td>
	</tr>
	<tr>
		<td class="col-md-2 success">Sucursal</td> <td class="success"><?=@$model->sucursales->NOMBRE_SUCURSAL;?></td>
	</tr>
	<tr>
		<td class="col-md-2 success">Ubicacion</td> <td class="success"><?=$model->UBICACION_EQUIPO;?></td>
	</tr>
	<tr>
		<td class="col-md-2 success">Estado</td> <td class="success"><?=$model->ESTADO_EQUIPO;?></td>
	</tr>
	<tr>
		<td class="col-md-2 success">Usuario</td> <td class="success"><?=$model->USUARIO_EQUIPO;?></td>
	</tr>
	<tr>
		<td class="col-md-2 success">Numero Factura</td> <td class="success"><?=$model->NUMERO_FACTURA;?></td>
	</tr>
	<tr>
		<td class="col-md-2 success">Observacion</td> <td class="success"><?=$model->OBSV_EQUIPO;?></td>
	</tr>
	
</table>
<!--<?php /* $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_EQUIPOS',
		'RUT_PROVEEDOR',
		'CODIGO_INVENTARIO',
		//array('name'=>'ID_TIPOEQUIPO','value'=>'$data->iDTIPOEQUIPO->NOMBRE_TIPOEQUIPO'),		
		'MODELO_EQUIPO',
		'FECHA_COMPRA',
		'FECHA_BAJA',
		'ESTADO_EQUIPO',
		'USUARIO_EQUIPO',
		'NUMERO_FACTURA',
		'OBSV_EQUIPO',
		'ID_TIPOEQUIPO',
	),
));*/ ?>-->
	</div>
</div>
