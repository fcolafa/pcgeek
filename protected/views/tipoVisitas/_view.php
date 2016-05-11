<?php
/* @var $this TipoVisitasController */
/* @var $data TipoVisitas */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('TIPO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->TIPO), array('view', 'id'=>$data->ID_TIPO_VISITA));  ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPCION')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPCION); ?>
	<br />


</div>