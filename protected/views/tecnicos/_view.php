<?php
/* @var $this TecnicosController */
/* @var $data Tecnicos */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('RUT_TECNICO')); ?>:</b>
	<?php echo CHtml::encode($data->RUT_TECNICO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRES_TECNICO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->NOMBRES_TECNICO), array('view', 'id'=>$data->ID_TECNICO)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('APELLIDOS_TECNICO')); ?>:</b>
	<?php echo CHtml::encode($data->APELLIDOS_TECNICO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DIRECCION_TECNICO')); ?>:</b>
	<?php echo CHtml::encode($data->DIRECCION_TECNICO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FONO_TECNICO')); ?>:</b>
	<?php echo CHtml::encode($data->FONO_TECNICO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPCION')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPCION); ?>
	<br />


</div>