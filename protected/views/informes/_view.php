<?php
/* @var $this InformesController */
/* @var $data Informes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_INFORME')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_INFORME), array('view', 'id'=>$data->ID_INFORME)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_TECNICO')); ?>:</b>
	<?php echo CHtml::encode($data->iDTECNICO->APELLIDOS_TECNICO).", ".CHtml::encode($data->iDTECNICO->NOMBRES_TECNICO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_CLIENTE')); ?>:</b>
	<?php echo CHtml::encode($data->iDCLIENTE->NOMBRE_CLIENTE); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('ID_UBICACION')); ?>:</b>
	<?php echo CHtml::encode($data->iDUBICACION->UBICACION); ?>
	<br />
    
	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_SUCURSAL')); ?>:</b>
	<?php echo CHtml::encode($data->sucursales->NOMBRE_SUCURSAL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FECHA_INGRESO')); ?>:</b>
	<?php echo CHtml::encode($data->FECHA_INGRESO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HORA_INGRESO')); ?>:</b>
	<?php echo CHtml::encode($data->HORA_INGRESO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HORA_SALIDA')); ?>:</b>
	<?php echo CHtml::encode($data->HORA_SALIDA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IMAGEN')); ?>:</b>
	<?php echo CHtml::encode($data->IMAGEN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OBSERVACIONES')); ?>:</b>
	<?php echo CHtml::encode($data->OBSERVACIONES); ?>
	<br />
	
	<?php /*
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIMESTAMP')); ?>:</b>
	<?php echo CHtml::encode($data->TIMESTAMP); ?>
	<br />

	*/ ?>

</div>