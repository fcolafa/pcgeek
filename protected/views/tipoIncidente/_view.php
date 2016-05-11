<?php
/* @var $this TipoIncidenteController */
/* @var $data TipoIncidente */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_TIPO_INCIDENTE')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_TIPO_INCIDENTE), array('view', 'id'=>$data->ID_TIPO_INCIDENTE)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_TIPO_INCIDENTE')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE_TIPO_INCIDENTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPCION_TIPO_INICIDENTE')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPCION_TIPO_INICIDENTE); ?>
	<br />


</div>