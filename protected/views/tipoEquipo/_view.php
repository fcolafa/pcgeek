<?php
/* @var $this TipoEquipoController */
/* @var $data TipoEquipo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_TIPOEQUIPO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_TIPOEQUIPO), array('view', 'id'=>$data->ID_TIPOEQUIPO)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_TIPOEQUIPO')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE_TIPOEQUIPO); ?>
	<br />


</div>