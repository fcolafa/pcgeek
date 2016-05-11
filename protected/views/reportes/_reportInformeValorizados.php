<?php
/* @var $this BarcosCapacidadesController */
 // @var $model BarcosCapacidades 
/* @var $form CActiveForm */

?>
<div class="span6 offset3">
	<div class="panel panel-primary">
		<div class="panel-heading text-center"><h2>No Valorizados</h2></div>
			<div class="panel-body">
<?php
$this->widget('zii.widgets.CMenu', array(
                'htmlOptions'=>array('class'=>'pull-right nav'),
                'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
                'itemCssClass'=>'item-test',
                'encodeLabel'=>false,
            ));
?>


<?php
set_time_limit(90);
ini_set('max_execution_time', 90);

$rawData=Yii::app()->db->createCommand('SELECT * FROM viewInformeValores')->queryAll();

if(!empty($rawData)){
	$dataProvider=new CArrayDataProvider($rawData, array(
    'id'=>'ID_VALOR',
    'sort'=>array(
        'attributes'=>array(
            'NOMBRE_VISITA','UBICACION',
        ),
    ),
    'pagination'=>array(
        'pageSize'=>50,
    ),
));


    $dataProviderReport=new CArrayDataProvider($rawData, array(
    'id'=>'ID_VALOR',
    'sort'=>array(
        'attributes'=>array(
             'NOMBRE_VISITA','UBICACION',
        ),
    ),
    'pagination'=>array(
        'pageSize'=>9999999999999999,
    ),
));
    
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$model->search(),
    'columns'=>array(
              array(
                            'name' =>'NOMBRE_VISITA',
                            'header'=>'VISITA',
                    ),
            array(
                        'name' =>'UBICACION',
                        'header'=>'UBICACION',
                ),
        /*
        array('class' => 'CButtonColumn', 'template' => '{update}', 
'updateButtonUrl' => 'Yii::app()->controller->createUrl("valores/create",array("id"=>$data["UBICACION"]))',
)*/
array(
            'class'=>'CButtonColumn',
                        'template' => '{create}',
                        'buttons' => array(
                             'create' => array(
                                    'label'=>'create',
                                    'url'=>'Yii::app()->createUrl("valores/create",array("id1"=>$data["ID_VISITA"],"id2"=>$data["ID_UBICACION"]))',
                       ) )
            ),
    ),
)); 
    
}
        else
            echo "Error al tratar de cargar el reporte, comuniquese con el administrador del sistema";

    ?>
		</div>
	</div>
</div>