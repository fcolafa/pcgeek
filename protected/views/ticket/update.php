<?php
/* @var $this TicketController */
/* @var $model Ticket */

$this->breadcrumbs=array(
	'Tickets'=>array('index'),
	$model->id_ticket=>array('view','id'=>$model->id_ticket),
	'Modificar',
);

$this->menu=array(
	array('label'=>' Ticket', 'url'=>array('index')),
	array('label'=>'Crear Ticket', 'url'=>array('create')),
	array('label'=>'Ver Ticket', 'url'=>array('view', 'id'=>$model->id_ticket)),
	array('label'=>'Administrar Ticket', 'url'=>array('admin')),
);
?>

<h1>Modificar Ticket <?php echo $model->id_ticket; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>