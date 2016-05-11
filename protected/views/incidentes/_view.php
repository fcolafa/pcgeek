<?php
/* @var $this IncidentesController */
/* @var $data Incidentes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_INCIDENTE')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_INCIDENTE), array('view', 'id'=>$data->ID_INCIDENTE)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_SUCURSAL')); ?>:</b>
	<?php echo CHtml::encode(@$data->sucursales->NOMBRE_SUCURSAL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_CANALCAMARAS')); ?>:</b>
	<?php echo CHtml::encode($data->ID_CANALCAMARAS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FECHA_INCIDENTE')); ?>:</b>
	<?php echo CHtml::encode($data->FECHA_INCIDENTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HORA_INCIDENTE')); ?>:</b>
	<?php echo CHtml::encode($data->HORA_INCIDENTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_TIPO_INCIDENTE')); ?>:</b>
	<?php echo CHtml::encode(@$data->ID_TIPO_INCIDENTE->NOMBRE_TIPO_INCIDENTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPCION_INCIDENTE')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPCION_INCIDENTE); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('IMAGEN')); ?>:</b>
	<?php echo CHtml::encode($data->IMAGEN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FECHA_HORA')); ?>:</b>
	<?php echo CHtml::encode($data->FECHA_HORA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_USUARIO')); ?>:</b>
	<?php echo CHtml::encode($data->ID_USUARIO); ?>
	<br />

	*/ ?>

</div>