<?php
/* @var $this SistemaController */
/* @var $data Sistema */
?>

<div class="span3">

<table class="table table-bordered">
	<td style="width: 300px; height: 100px;">
	<b><?php echo CHtml::encode($data->getAttributeLabel('COD_SISTEMA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->COD_SISTEMA), array('view', 'id'=>$data->COD_SISTEMA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MATRICULA_BARCO')); ?>:</b>
	<?php echo CHtml::encode($data->MATRICULA_BARCO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_SISTEMA')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE_SISTEMA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPCION_SISTEMA')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPCION_SISTEMA); ?>
	<br />
</td>
</table>
</div>