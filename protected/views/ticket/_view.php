<?php
/* @var $this TicketController */
/* @var $data Ticket */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ticket')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_ticket), array('view', 'id'=>$data->id_ticket)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_embarkation')); ?>:</b>
	<?php echo CHtml::encode($data->id_embarkation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ticket_date')); ?>:</b>
	<?php echo CHtml::encode($data->ticket_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ticket_subject')); ?>:</b>
	<?php echo CHtml::encode($data->ticket_subject); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ticket_description')); ?>:</b>
	<?php echo CHtml::encode($data->ticket_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ticket_status')); ?>:</b>
	<?php echo CHtml::encode($data->ticket_status); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ticket_date_incident')); ?>:</b>
	<?php echo CHtml::encode($data->ticket_date_incident); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_headquarter')); ?>:</b>
	<?php echo CHtml::encode($data->id_headquarter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ticket_solution')); ?>:</b>
	<?php echo CHtml::encode($data->ticket_solution); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('other_classification')); ?>:</b>
	<?php echo CHtml::encode($data->other_classification); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_classification')); ?>:</b>
	<?php echo CHtml::encode($data->id_classification); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ticket_close_date')); ?>:</b>
	<?php echo CHtml::encode($data->ticket_close_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ticket_remedy_date')); ?>:</b>
	<?php echo CHtml::encode($data->ticket_remedy_date); ?>
	<br />

	*/ ?>

</div>