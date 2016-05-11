<?php
/* @var $this SucursalesController */
/* @var $data Sucursales */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_SUCURSAL')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_SUCURSAL), array('view', 'id'=>$data->ID_SUCURSAL)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_CLIENTE')); ?>:</b>
	<?php echo CHtml::encode($data->iDCLIENTE->NOMBRE_CLIENTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_SUCURSAL')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE_SUCURSAL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DIRECCION_SUCURSAL')); ?>:</b>
	<?php echo CHtml::encode($data->DIRECCION_SUCURSAL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CONTACTO_SUCURSAL')); ?>:</b>
	<?php echo CHtml::encode($data->CONTACTO_SUCURSAL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FONO_SUCURSAL')); ?>:</b>
	<?php echo CHtml::encode($data->FONO_SUCURSAL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPCION')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPCION); ?>
	<br />


</div>