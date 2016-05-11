<?php
/* @var $this EquiposController */
/* @var $data Equipos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_EQUIPOS')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_EQUIPOS), array('view', 'id'=>$data->ID_EQUIPOS)); ?>
	<br />

	<b><?php echo CHtml::encode($data->rUTPROVEEDOR->getAttributeLabel('RUT_PROVEEDOR')); ?>:</b>
	<?php echo CHtml::encode($data->rUTPROVEEDOR->NOMBRE_PROVEEDOR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CODIGO_INVENTARIO')); ?>:</b>
	<?php echo CHtml::encode($data->CODIGO_INVENTARIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->iDTIPOEQUIPO->getAttributeLabel('NOMBRE_TIPOEQUIPO')); ?>:</b>
	<?php echo CHtml::encode($data->iDTIPOEQUIPO->NOMBRE_TIPOEQUIPO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MODELO_EQUIPO')); ?>:</b>
	<?php echo CHtml::encode($data->MODELO_EQUIPO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FECHA_COMPRA')); ?>:</b>
	<?php echo CHtml::encode($data->FECHA_COMPRA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FECHA_BAJA')); ?>:</b>
	<?php echo CHtml::encode($data->FECHA_BAJA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESTADO_EQUIPO')); ?>:</b>
	<?php echo CHtml::encode($data->ESTADO_EQUIPO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USUARIO_EQUIPO')); ?>:</b>
	<?php echo CHtml::encode($data->USUARIO_EQUIPO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NUMERO_FACTURA')); ?>:</b>
	<?php echo CHtml::encode($data->NUMERO_FACTURA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OBSV_EQUIPO')); ?>:</b>
	<?php echo CHtml::encode($data->OBSV_EQUIPO); ?>
	<br />
	

</div>