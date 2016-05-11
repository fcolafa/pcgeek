<?php
/* @var $this IncidentesController */
/* @var $model Incidentes */

$this->breadcrumbs=array(
	'Incidentes'=>array('index'),
	$model->ID_INCIDENTE,
);

$this->menu=array(
	array('label'=>'Ver Incidentes', 'url'=>array('index')),
	array('label'=>'Crear Incidentes', 'url'=>array('create')),
	array('label'=>'Actualizar Incidentes', 'url'=>array('update', 'id'=>$model->ID_INCIDENTE)),
	array('label'=>'Borrar Incidentes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_INCIDENTE),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar Incidentes', 'url'=>array('admin')),
);
?>



<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2> Incidentes #<?php echo $model->ID_INCIDENTE; ?></h2></div>

	<div class="panel-body">
		<table class="table table-condensed">
			<tbody class="text-left">
				<tr>
					<td rowspan="16"> <img src="<?php echo Yii:: app() ->baseUrl."/images/".$model->IMAGEN ?>" class="imgC" WIDTH=576 HEIGHT=288></td>	
					<td class="col-md-4 success"> Tipo Incidente </td>
				</tr>
				<tr>
					<td><?=@$model->iDTIPOINCIDENTE->NOMBRE_TIPO_INCIDENTE;?></td>
				</tr>
				<tr>
					<td class="col-md-5 success"> Sucursal </td>
				</tr>
				<tr>
					<td><?=@$model->sucursales->NOMBRE_SUCURSAL;?></td>
				</tr>
				<tr>
					<td class="col-md-4 success"> Ubicacion Camara </td>
				</tr>
				<tr>
					<td><?=@$model->ID_CANALCAMARAS;?></td>
				</tr>
				<tr>
					<td class="col-md-4 success"> Fecha </td>
				</tr>
				<tr>
					<td><?=@$model->FECHA_INCIDENTE;?></td>
				</tr>
				<tr>
					<td class="col-md-4 success"> Hora </td>
				</tr>
				<tr>
					<td ><?=@$model->HORA_INCIDENTE;?></td>
				</tr>
				<tr>
					<td class="col-md-4 success"> Descripcion </td>
				</tr>
				<tr>
					<td class="col-md-4"><?=@$model->DESCRIPCION_INCIDENTE;?></td>
				</tr>
				<tr>
					<td class="col-md-4 success"> Fecha/Hora </td>
				</tr>
				<tr>
					<td><?=@$model->FECHA_HORA;?></td>
				</tr>
				<tr>
					<td class="col-md-4 success"> Usuario </td>
				</tr>
				<tr>
					<td class="col-md-4"><?=@$model->iDUSUARIO->NOMBRE_USUARIO;?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>