﻿


<h1> <?php echo "Cuenta de Usuario Creada" ;?></h1>
<table>
    <thead></thead>
    <tbody>
        <tr><td>Nombre de Usuario:</td>  <td><?php echo $model->NOMBRE_USUARIO?></td> </tr>
     
        <tr><td>Email</td><td><?php echo $model->EMAIL_USUARIO ?></td></tr>
        <tr><td>Contraseña</td>  <td><?php echo $pass ?></td></tr>
        <tr><td>Fecha de Creacion</td>  <td><?php echo $model->FECHA_CREACION_USUARIO ?></td></tr>
    </tbody>
        
</table>

        <?php echo CHtml::link("Enlace al sistema ",$_SERVER["SERVER_NAME"]."/site/index");  ?>

<?php //CHtml::link("http://".$_SERVER["SERVER_NAME"].Yii::app()->controller->renderPartial('render', array(),true), array("presupuesto/view&id=".$data->ID_PRESUPUESTO)));?>

