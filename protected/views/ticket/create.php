<?php
/* @var $this TicketController */
/* @var $model Ticket */

$this->breadcrumbs=array(
	'Tickets'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Ticket', 'url'=>array('index')),
	array('label'=>'Administrar Ticket', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Crear Ticket</h2></div>
		<div class="panel-body">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
                </div></div>