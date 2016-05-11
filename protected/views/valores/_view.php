<?php
/* @var $this ValoresController */
/* @var $data Valores */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_VALOR')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_VALOR), array('view', 'id'=>$data->ID_VALOR)); ?>
	<br />
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('UBICACION')); ?>:</b>
	<?php echo CHtml::encode($data->iDUBICACION->UBICACION); ?>
	<br />
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('VISITA')); ?>:</b>
	<?php echo CHtml::encode($data->iDVISITA->NOMBRE_VISITA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VALOR')); ?>:</b>
	<?php echo CHtml::encode($data->VALOR); ?>
	<br />


</div>