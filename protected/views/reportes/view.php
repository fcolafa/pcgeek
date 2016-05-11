<?php
/* @var $this SistemaController */
/* @var $model Sistema */

$this->breadcrumbs=array(
	'Sistemas'=>array('index'),
	$model->COD_SISTEMA,
);

$this->menu=array(
	array('label'=>'Ver Sistema', 'url'=>array('index')),
	array('label'=>'Crear Sistema', 'url'=>array('create')),
	array('label'=>'Actualizar Sistema', 'url'=>array('update', 'id'=>$model->COD_SISTEMA)),
	array('label'=>'Borrar Sistema', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->COD_SISTEMA),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar Sistema', 'url'=>array('admin')),
);
?>


<!-- Pestañas -->
<h1> Sistemas #<?php echo $model->COD_SISTEMA; ?></h1>
<div class="row-fluid">
  <div class="span12">
  	<?php 	//$this->beginWidget('zii.widgets.CPortlet', array('title'=>$model->NOMBRE_BARCO .":". $model->MATRICULA_BARCO,	));
		
	?>
    <?php
    $this->widget('zii.widgets.jui.CJuiTabs', array(
    	//'htmlOptions'=>array('style'=>'display: none;'),
		'tabs'=>array(
			//'end'=> "asasd",
		'Sistema' =>$this->renderPartial("_formTabSistema", array('model' => $model), $this),	
		'Sub Sistemas'=>$this->renderPartial('_formTabSubSistema',array('model' =>SubSistema::model()->find('COD_SISTEMA=:COD_SISTEMA', array(':COD_SISTEMA'=>$model->COD_SISTEMA))),$this),
		'Equipos'=>$this->renderPartial('_formTabEquipos',array('model' =>SubSistema::model()->find('COD_SISTEMA=:COD_SISTEMA', array(':COD_SISTEMA'=>$model->COD_SISTEMA))),$this),
		),
		// additional javascript options for the tabs plugin
		'options'=>array(
			'collapsible'=>true,
		),
	));
	?>
    <?php // $this->endWidget();?>
  </div>
  <div class="span12">


