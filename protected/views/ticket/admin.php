<?php
/* @var $this TicketController */
/* @var $model Ticket */

$this->breadcrumbs=array(
	'Tickets'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver Ticket', 'url'=>array('index')),
	array('label'=>'Crear Ticket', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ticket-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="panel panel-primary">

	<div class="panel-heading text-center"><h2>Administrar Tickets</h2></div>
		<div class="panel-body">



<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->

<!-- search-form -->

<?php 

if(Yii::app()->user->A1())
    $search=$model->search();
else
    $search=$model->searchClient();
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ticket-grid',
	'dataProvider'=>$search,
	'filter'=>$model,
       'afterAjaxUpdate'=>"function() {
 	jQuery('#ticket_date_incident').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['es'], {'showAnim':'fold','dateFormat':'yy-mm-dd','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
 	jQuery('#ticket_date').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['es'], {'showAnim':'fold','dateFormat':'yy-mm-dd','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
 	
}",
	'columns'=>array(
		'id_ticket',
            
               array(
                    'name'=>'id_user',
                    'value'=>'$data->id_user',
                    'visible'=>false,
                  
                    ),
//                 array(
//                    'name'=>'idEmbarkation.embarkation_name',
//                    'value'=>'!empty($data->idEmbarkation->embarkation_name)?$data->idEmbarkation->embarkation_name:"No Asignado"',
//                    'filter'=>  CHtml::activeTextField($model, '_embarkation_name'),
//                    ),
//                 array(
//                    'name'=>'idHeadquarter.headquarter_name',
//                    'value'=>'$data->idHeadquarter->headquarter_name',
//                    'filter'=>  CHtml::activeTextField($model, '_headquarter_name'),
//                    ),
		 'ticket_subject',
//              array(
//                    'name'=>'idUser.user_names',
//                    'value'=>'$data->idUser->user_names',
//                    'filter'=>  CHtml::activeTextField($model, '_user_names'),
//                    ),
//              array(
//                    'name'=>'idUser.user_lastnames',
//                    'value'=>'$data->idUser->user_lastnames',
//                    'filter'=>  CHtml::activeTextField($model, '_user_lastnames'),
//                    ),
               array(
                    'name'=>'idUser.iDCLIENTE.NOMBRE_CLIENTE',
                    'value'=>'@$data->idUser->iDCLIENTE->NOMBRE_CLIENTE',
                    'filter'=>  CHtml::activeTextField($model, '_client_name'),
                    ),
		               array(
                
                       'name' => 'ticket_date_incident',
                        'value'=>'!empty($data->ticket_date_incident)?Yii::app()->dateFormatter->format("d MMMM y \n HH:mm:ss",strtotime($data->ticket_date_incident)):" "',
                        'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', 
                                
                                array(
                                        'model' => $model,
                                        'attribute' => 'ticket_date_incident',
                                        'language' => 'es',
                                       
                                        'htmlOptions' => array(
                                                'id' => 'ticket_date_incident',
                                                'dateFormat' => 'yy-mm-dd',
                                        ),
                                        'options' => array(  // (#3)
                  'showOn' => 'focus', 
                  'dateFormat' => 'yy-mm-dd',
                  'showOtherMonths' => true,
                  'selectOtherMonths' => true,
                  'changeMonth' => true,
                  'changeYear' => true,
                  'showButtonPanel' => true,
          )
                                ),
                                true),
                
              
            ),
            	               array(
                
                       'name' => 'ticket_date',
                        'value'=>'Yii::app()->dateFormatter->format("d MMMM y \n HH:mm:ss",strtotime($data->ticket_date))',
                        'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', 
                                
                                array(
                                        'model' => $model,
                                        'attribute' => 'ticket_date',
                                        'language' => 'es',
                                       
                                        'htmlOptions' => array(
                                                'id' => 'ticket_date',
                                                'dateFormat' => 'yy-mm-dd',
                                        ),
                                        'options' => array(  // (#3)
                  'showOn' => 'focus', 
                  'dateFormat' => 'yy-mm-dd',
                  'showOtherMonths' => true,
                  'selectOtherMonths' => true,
                  'changeMonth' => true,
                  'changeYear' => true,
                  'showButtonPanel' => true,
          )
                                ),
                                true),
            ),
            array(
                    
                    'header'=>'Dias Transcurridos',
                    'value'=>'($data->ticket_status=="Cerrado")?"-":"$data->daysPassed"',
                ),
		   array(
                    
                    'name'=>'ticket_status',
                    'filter'=>array('Nuevo'=>'Nuevo','Cerrado'=>'Cerrado','En Curso'=>'En Curso'),
                    'value'=>'$data->ticket_status',
                ),
		array(
			'class'=>'CButtonColumn',
                      'buttons'=>array(
                       
                            'update'=>array(
                            'visible'=>'false',
                         ),
                             'delete'=>array(
                            'visible'=>'false',
                         ),
                          ),
		),
	),
)); ?>
</div>
</div>
