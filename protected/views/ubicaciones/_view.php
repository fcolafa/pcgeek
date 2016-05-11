<?php
/* @var $this UbicacionesController */
/* @var $data Ubicaciones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_UBICACION')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_UBICACION), array('view', 'id'=>$data->ID_UBICACION)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('REGION')); ?>:</b>
	<?php echo CHtml::encode($data->REGION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UBICACION')); ?>:</b>
	<?php echo CHtml::encode($data->UBICACION); ?>
	<br />


</div>