<?php
/* @var $this ValoresController */
/* @var $model Valores */
if (isset($_GET["id1"]) && isset($_GET["id2"]))
{
    $model->ID_VISITA=$_GET["id1"];
    $model->ID_UBICACION=$_GET["id2"];
}
$this->breadcrumbs=array(
	'Valores'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Valores', 'url'=>array('index')),
	array('label'=>'Administrar Valores', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center"><h2>Crear Valores</h2></div>
		<div class="panel-body">
			<?php $this->renderPartial('_form', array('model'=>$model));?>
		</div>
	</div>
</div>