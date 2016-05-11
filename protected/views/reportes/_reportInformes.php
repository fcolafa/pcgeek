<?php
/* @var $this BarcosCapacidadesController */
 // @var $model BarcosCapacidades 
/* @var $form CActiveForm */

?>
<div class="panel panel-primary">

	<div class="panel-heading text-center"><h2>Informes Valorizados</h2></div>
	<div class="panel-body">
<?php
    $this->widget('zii.widgets.CMenu', array(
                'htmlOptions'=>array('class'=>'pull-right nav'),
                'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
                'itemCssClass'=>'item-test',
                'encodeLabel'=>false,
            ));

Yii::app()->clientScript->registerScript('search', "
        $('.search-button').click(function(){
            $('.search-form').toggle();
            return false;
        });
        $('.search-form form').submit(function(){
            $('#informes_valorizados').yiiGridView('update', {
                data: $(this).serialize()
            });
            return false;
        });
    ");
?>

<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search2',array(
        'model'=>$model,
    )); ?>
</div>

<?php
            set_time_limit(90);
            ini_set('max_execution_time', 90);
               
            $this->widget('zii.widgets.grid.CGridView', array(
            	'id'=>'informes_valorizados',
                'dataProvider'=>$model->search(),
                'filter'=>$model,
                'columns'=>array(
                    array(  'name' =>'ID_INFORME',
						  'htmlOptions'=> array('width'=>'8%'),
                            'header'=>'ID_INFORME',
                        ),
                    array(  'name' =>'NOMBRES_TECNICO',
						  'htmlOptions'=> array('width'=>'14%'),
                            'header'=>'TECNICO',
                        ),
                    array(	'name' => 'NOMBRE_CLIENTE',
            	            'header'=>'Cliente',
						  'htmlOptions'=> array('width'=>'14%'),
            	            'filter'=> CHtml::listData(Clientes::model()->findAll(array('order'=>'ID_CLIENTE')),'ID_CLIENTE','NOMBRE_CLIENTE'),
            	        ),
                    array(  'name' =>'NOMBRE_SUCURSAL',
						  'htmlOptions'=> array('width'=>'16%'),
                            'header'=>'SUCURSAL',
                        ),
                    array(  'name' =>'NOMBRE_VISITA',
						  'htmlOptions'=> array('width'=>'16%'),
                            'header'=>'VISITA',
                        ),
                    array(  'name' =>'UBICACION',
						  'htmlOptions'=> array('width'=>'14%'),
                            'header'=>'UBICACION',
                        ),
					 /*array(	'name' => 'FECHA_INGRESO',
            	            'header'=>'FECHA_INGRESO',
            	            'filter'=> CHtml::listData(Informes::model()->findAll(array('order'=>'FECHA_INGRESO')),'FECHA_INGRESO','FECHA_INGRESO'),
            	        ),*/
					array(  'name' =>'FECHA_INGRESO',
						  'htmlOptions'=> array('width'=>'10%'),
                            'header'=>'FECHA_INGRESO',
                          ),
                    array(  'name' =>'VALOR',
						  'htmlOptions'=> array('width'=>'8%'),
                            'header'=>'VALOR',
                          ),
                   
                ),
            )); 
            


        ?>
    </div>
</div>