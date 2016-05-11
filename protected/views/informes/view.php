<?php
/* @var $this InformesController */
/* @var $model Informes */

$this->breadcrumbs=array(
	'Informes'=>array('index'),
	$model->ID_INFORME,
);

$this->menu=array(
	array('label'=>'Ver Informes', 'url'=>array('index')),
	array('label'=>'Crear Informes', 'url'=>array('create')),
	array('label'=>'Actualizar Informes', 'url'=>array('update', 'id'=>$model->ID_INFORME)),
	array('label'=>'Borrar Informes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_INFORME),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar Informes', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Informe <?php echo $model->ID_INFORME.": ".$model->iDCLIENTE->NOMBRE_CLIENTE.", ".$model->FECHA_INGRESO ; ?></h2></div>
		<div class="panel-body">


	<table class="table table-condensed">
		<tr>
			<td class="col-md-2 success"> Técnico </td><td class="success"><?=$model->iDTECNICO->NOMBRES_TECNICO;?></td>
			<td class="col-md-2 info"> Fecha </td><td class="col-md-3 info"><?=$model->FECHA_INGRESO;?></td>
		</tr>
		<tr>
			<td class="success"> Cliente </td><td class="success"><?=$model->iDCLIENTE->NOMBRE_CLIENTE;?></td>
			<td class="info"> Hora ingreso </td><td class="info"><?=$model->HORA_INGRESO;?></td>
		</tr>
    <tr>            
			<td class="success"> Sucursal </td><td class="success"><?=$model->sucursales->NOMBRE_SUCURSAL;?></td>
			<td class="info"> Hora salida </td><td class="info"><?=$model->HORA_SALIDA;?></td>
		</tr>
		<tr>			
			<td class="success"> Ubicacion </td><td colspan="3" class="success"><?=$model->iDUBICACION->UBICACION;?></td>
		</tr>
		<tr>
			<td class="success"> Observaciones </td><td colspan="3" class="success"><?=$model->OBSERVACIONES;?></td>
		</tr>
	</table>

	<div class="col-md-8">
		<?php 
		//die(var_dump($detalle));

			echo "<table class=\"table table-hover\">";

            //Se comenta la opcion validar
			/*$validar="";
			if(Yii::app()->user->A1() || Yii::app()->user->A2()) $validar="Validar";*/
			
			echo "<thead><tr><th class=\"col-md-3\"> Tipo Visita </th> <th class=\"col-md-4\"> Motivo Visita </th> <th class=\"col-md-2\"> Estado </th><th class=\"col-md-2\"> Valor </th><th class=\"col-md-2\"> Modificar </th></tr></thead><tbody>";

            //Se comenta la opcion validar
            //<th class=\"col-md-1\"> ".$validar." </th>
    				$suma=0;
					foreach ($detalle as $d) {       //var_dump($v->ID_VISITA);
						if ($d->TIPO_VISITA=="M") {
							echo "<tr><td>Mantenciones</td>";
						} elseif ($d->TIPO_VISITA=="I") {
							echo "<tr><td>Instalaciones</td>";
						} elseif ($d->TIPO_VISITA=="U") {
							echo "<tr><td>Urgencias</td>";
						} elseif ($d->TIPO_VISITA=="R") {
							echo "<tr><td>Retiro Equipos</td>";
						} elseif ($d->TIPO_VISITA=="E") {
							echo "<tr><td>Entrega Equipos</td>";
						}else {
							echo "<tr><td>Otras</td>";
						}
						
						echo "<td>".$d->NOMBRE_VISITA."</td>";
                        //echo "<td>".$model->iDUBICACION->UBICACION."</td>";
                        //echo "<td>".$Valores->iDVALOR->VALOR."</td>";
                        
					
						if ($d->ID_ESTADO==0) echo "<td> Por Validar </td>"; else echo "<td> Validado </td>";
						echo "<td>".number_format($d->VALOR, 0, ',', '.')."</td>";
						$suma = $suma + $d->VALOR;
						
						
						echo "<td>".CHtml::link('<img src='.'"'. Yii::app()->theme->baseUrl.'/img/small_icons/table_edit.png" title="Modificar" alt="Modificar"  width="20" />', array('detalleInforme/update', 'id'=> $d->ID_INFORME_DET))."</td>";
						
						
						
						/*if(Yii::app()->user->A1() || Yii::app()->user->A2()){
							echo '<td>';
								echo CHtml::ajaxLink(
								 /'<img src='.'"'. Yii::app()->theme->baseUrl.'/img/small_icons/accept.png" alt="Validar"  width="25" /> ',
								  Yii::app()->createUrl( 'informes/validarVisita' ),
								  array( // ajaxOptions
								    'type' => 'POST',
								    'beforeSend' => "function( request )
								                     {
								                       // Set up any pre-sending stuff like initializing progress indicators
								                     }",
								    'success' => "function( data )
								                  {
								                    if (data=='actualizado'){
								                    	// CAMBIAR EL TEXTO DE LA CELDA DE AL LADO 
								                    	// $('#estado_hito').text(': Validado');
								                    	alert( ' Actualizado' );
								                    	
								                    } else {
								                    	alert( data );
								                    }
								                  }",
								    'data' => array( 'visita' => $d->ID_INFORME_DET )//, 'val2' => '2' )
								  ),
								  array( //htmlOptions
								    'href' 	=> Yii::app()->createUrl( 'informes/validarVisita' ),
								    'id'	=>'validaVisita'.$d->ID_INFORME_DET,
								  )
								);
							echo '</td>';
						} else echo '<td></td>';

						echo '</tr>';*/
					}

				echo "</tr><tr><td class=\"col-md-3\"></td><td class=\"col-md-3\"></td><td class=\"col-md-3\"><b>Total</b></td><td class=\"col-md-3\"><b>".number_format($suma, 0, ',', '.')."</b></td><td></td>";
			echo "</tbody></table>";
		?>
	</div>

<div class="col-md-12">

	<div class="row">
		<?php if(!empty($model->IMAGEN)){
						$this->widget('zii.widgets.CMenu', array(
				                'htmlOptions'=>array('class'=>'pull-right nav'),
				                'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
				                'itemCssClass'=>'item-test',
				                'encodeLabel'=>false,
				                'items' => array(
				                        array('label' => '<img src='.'"'. Yii::app()->theme->baseUrl.'/img/small_icons/attach.png" title="Ver Archivo" width="25" /> Ver Archivo', 'url' => "http://".$_SERVER["SERVER_NAME"].Yii::app()->request->baseUrl."/archivos/informes/".$model->IMAGEN),
				                ),
				            ));
					}
		?>


	<?php /*if($model->IMAGEN!=''){
		echo "<div class = \"form-group\" id=\"la_imagen\" >";
		echo "<h3 class = 'btn btn-success'> Ver imagen existente </h3><div>";
		echo CHtml::image(Yii::app()->request->baseUrl.'/archivos/informes/'.$model->IMAGEN,"imagen",array("class"=>"img-thumbnail"));
		echo "</div></div>";

		echo '<script  type="text/javascript">';
  		//script para la imagen
	    echo '$(function() { $( "#la_imagen" ).accordion({ collapsible: true,	active: 2  }); });';
		echo '</script>';
	}*/?>
		</div>	
			</div>
	</div>
</div>
