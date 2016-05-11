<?php
/* @var $this VisitasController */
/* @var $data Visitas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIPO_VISITA')); ?>:</b>
	<?php echo CHtml::encode($data->iDTIPOVISITA->TIPO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_VISITA')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE_VISITA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPCION')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPCION); ?>
	<br />


</div>