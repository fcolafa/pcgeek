


<h1> <?php echo $title ?></h1>
<p>
    <?php echo $body ?>  <?php echo CHtml::link("Haga clic aqui ",$_SERVER["SERVER_NAME"]."/ticket/view?id=".$model->id_ticket);  ?> para revisar
</p>

<?php //CHtml::link("http://".$_SERVER["SERVER_NAME"].Yii::app()->controller->renderPartial('render', array(),true), array("presupuesto/view&id=".$data->ID_PRESUPUESTO)));?>

