<?php
/* @var $this DetalleInformeController */
/* @var $data DetalleInforme */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_INFORME_DET')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_INFORME_DET), array('view', 'id'=>$data->ID_INFORME_DET)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_VISITA')); ?>:</b>
	<?php echo CHtml::encode($data->ID_VISITA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_INFORME')); ?>:</b>
	<?php echo CHtml::encode($data->ID_INFORME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_ESTADO')); ?>:</b>
	<?php echo CHtml::encode($data->ID_ESTADO); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('VALOR')); ?>:</b>
	<?php echo CHtml::encode($data->VALOR); ?>
	<br />


</div>