<?php
/* @var $this TicketController */
/* @var $model Ticket */

$this->breadcrumbs=array(
	Yii::t('database','Tickets')=>array('admin'),
	Yii::t('actions','Create'),
);
$this->menu=array(
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('database','Ticket'), 'url'=>array('admin')),
);
     

   $link="Medida Correctiva ".Yii::t('database','Ticket').":". CHtml::link(CHtml::encode($ticketm->id_ticket), Yii::app()->baseUrl . '/ticket/'.$ticketm->id_ticket, array('target'=>'_blank'));
    

?>
<div class="panel panel-primary">
    <div class="panel-heading text-center"><h2><?php echo $link?></h2></div>
		<div class="panel-body">

<?php $this->renderPartial('_form_remedy', array('ticketm'=>$ticketm)); ?>
 </div></div>