<?php
/* @var $this CanalCamarasController */
/* @var $data CanalCamaras */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_CANALCAMARAS')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_CANALCAMARAS), array('view', 'id'=>$data->ID_CANALCAMARAS)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_SUCURSAL')); ?>:</b>
	<?php echo CHtml::encode($data->sucursales->getNombreCompleto()); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NUM_CAMARA')); ?>:</b>
	<?php echo CHtml::encode($data->NUM_CAMARA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UBICACION_CAMARA')); ?>:</b>
	<?php echo CHtml::encode($data->UBICACION_CAMARA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FECHA_CAMBIO_CAMARA')); ?>:</b>
	<?php echo CHtml::encode($data->FECHA_CAMBIO_CAMARA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OBSERVACION_CAMARA')); ?>:</b>
	<?php echo CHtml::encode($data->OBSERVACION_CAMARA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESTADO_CAMARA')); ?>:</b>
	<?php echo CHtml::encode($data->ESTADO_CAMARA=="1"?"Activa":"Inactiva"); ?>
	<br />


</div>