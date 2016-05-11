<?php
/* @var $this UsuariosController */
/* @var $data Usuarios */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_USUARIO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->NOMBRE_USUARIO), array('view', 'id'=>$data->ID_USUARIO)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COD_TIPO_USUARIO')); ?>:</b>
	<?php echo CHtml::encode($data->tipoUsuario->TIPO_USUARIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_CLIENTE')); ?>:</b>
	<?php echo CHtml::encode($data->ID_CLIENTE==0 ? null : $data->iDCLIENTE->NOMBRE_CLIENTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_TECNICO')); ?>:</b>
	<?php echo CHtml::encode($data->ID_TECNICO==0 ? null : $data->iDTECNICO->nombreCompleto); ?>
	<br />


</div>