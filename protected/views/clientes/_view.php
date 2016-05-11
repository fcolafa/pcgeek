<?php
/* @var $this ClientesController */
/* @var $data Clientes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('RUT_CLIENTE')); ?>:</b>
	<?php echo CHtml::encode($data->RUT_CLIENTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_CLIENTE')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->NOMBRE_CLIENTE), array('view', 'id'=>$data->ID_CLIENTE)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DIRECCION_CLIENTE')); ?>:</b>
	<?php echo CHtml::encode($data->DIRECCION_CLIENTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FONO_CLIENTE')); ?>:</b>
	<?php echo CHtml::encode($data->FONO_CLIENTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CONTACTO')); ?>:</b>
	<?php echo CHtml::encode($data->CONTACTO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FONO_CONTACTO')); ?>:</b>
	<?php echo CHtml::encode($data->FONO_CONTACTO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPCION')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPCION); ?>
	<br />

</div>