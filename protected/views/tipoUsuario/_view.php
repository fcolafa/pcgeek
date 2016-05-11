<?php
/* @var $this TipoUsuarioController */
/* @var $data TipoUsuario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('COD_TIPO_USUARIO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->COD_TIPO_USUARIO), array('view', 'id'=>$data->COD_TIPO_USUARIO)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIPO_USUARIO')); ?>:</b>
	<?php echo CHtml::encode($data->TIPO_USUARIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('C')); ?>:</b>
	<?php echo CHtml::encode($data->C); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('R')); ?>:</b>
	<?php echo CHtml::encode($data->R); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('U')); ?>:</b>
	<?php echo CHtml::encode($data->U); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('D')); ?>:</b>
	<?php echo CHtml::encode($data->D); ?>
	<br />


</div>