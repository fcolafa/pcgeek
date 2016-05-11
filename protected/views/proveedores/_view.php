<?php
/* @var $this ProveedoresController */
/* @var $data Proveedores */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('RUT_PROVEEDOR')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->RUT_PROVEEDOR), array('view', 'id'=>$data->RUT_PROVEEDOR)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_PROVEEDOR')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE_PROVEEDOR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DIRECCION_PROVEEDOR')); ?>:</b>
	<?php echo CHtml::encode($data->DIRECCION_PROVEEDOR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CIUDAD_PROVEEDOR')); ?>:</b>
	<?php echo CHtml::encode($data->CIUDAD_PROVEEDOR); ?>
	<br />


</div>