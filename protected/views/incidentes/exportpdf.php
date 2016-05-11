<?php

	$pdf = Yii::createComponent('application.extensions.MPDF57.mpdf');
	$dataProvider = $_SESSION['datos_filtrados']->getData();
	$contador=count($dataProvider);
	//creamos las cabeceras
	$html.='<table align="center"><tr>
				<td align="center"><b>Incidentes</b></td>
			</tr></table>
		
		Total Eventos: '.$contador;



		$html.='<table class="detail-view2" repeat_header="1" cellpadding="1" cellspacing="1" width="100%" border="0">
			<tr class="principal">
				<td class="principal" width="7%">&nbsp;Cliente</td>
				<td class="principal" width="7%">&nbsp;Sucursal</td>
				<td class="principal" width="7%">&nbsp;Mes</td>
				<td class="principal" width="7%">&nbsp;Periodo</td>
				<td class="principal" width="7%">&nbsp;Tipo Incidente</td>
				<td class="principal" width="7%">&nbsp;Imagen</td>
			</tr>';
			
			$i=0;
			$val=count($dataProvider);
			//dentro del ciclo vamos insertando los datos obtenidos
			while($i<$val)
			{
				$html.='<tr class="odd">
					<td class="odd" width="7%">&nbsp;'.$dataProvider[$i]["CLIENTE"].'</td>
					<td class="odd" width="7%">&nbsp;'.$dataProvider[$i]["NOMBRE_SUCURSAL"].'</td>
					<td class="odd" width="7%">&nbsp;'.$dataProvider[$i]["MES"].'</td>
					<td class="odd" width="7%">&nbsp;'.$dataProvider[$i]["PERIODO"].'</td>
					<td class="odd" width="7%">&nbsp;'.$dataProvider[$i]["TIPO_INCIDENTE"].'</td>
				  <td rowspan="2"><img border="1" src="images/'.$dataProvider[$i]["IMAGEN"].'" width="200" height="150"></td></tr>';
				$html.='<tr class="odd"><td colspan="5"> observacion </td></tr>'; 
				$i++;
			}
		$html.='</table>';

		$html=utf8_encode($html);
		$mpdf=new mPDF("");
		$mpdf->WriteHTML($html);
		$mpdf->Output("");
		exit; 
?>
