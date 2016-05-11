<?php
/* @var $this ReportesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reportes',
);


?>


<div class="form">
  <table class="table table-condensed">
    <tr>
        <td bgcolor="#CEF6CE" text-align="center" >
            <div  align="center">
                <?php  echo CHtml::link('<img src='.'"'. Yii::app()->theme->baseUrl.'/img/big_icons/Dashboard/dolar.png" alt="Gastos"  width="15%" />', array('reportes/Gastos'));?>
                <div class="dashIconText "><?php echo CHtml::link('<h4>Gastos</h4>',array('reportes/Gastos')); ?></div>
            </div>
        </td>
        <td bgcolor="#93F3FF">
            <div align="center">
                <?php  echo CHtml::link('<img src='.'"'. Yii::app()->theme->baseUrl.'/img/big_icons/Dashboard/mantenciones-mid-icon.png" alt="Mantenciones"  width="15%" />', array('reportes/Mantenciones'));   ?>
                <div class="dashIconText"><?php echo CHtml::link('<h4>Mantenciones</h4>',array('reportes/Mantenciones')); ?></div>
            </div>
        </td>
    </tr>
    <tr>
        <td  bgcolor="#8CB0B0" >
            <div  align="center">
                <?php  echo CHtml::link('<img src='.'"'. Yii::app()->theme->baseUrl.'/img/big_icons/Dashboard/certificado-mid-icon.png" alt="Certificados"  width="15%" />', array('reportes/Certificados'));   ?>
                <div class="dashIconText"><?php echo CHtml::link('<h4>Certificados</h4>',array('reportes/Certificados')); ?></div>
            </div>
        </td>
        <td bgcolor="#8EDC7E">
            <div  align="center">
                <?php  echo CHtml::link('<img src='.'"'. Yii::app()->theme->baseUrl.'/img/big_icons/Dashboard/revista-mid-icon.png" alt="Revistas"  width="15%" />', array('reportes/Revistas'));   ?>
                <div class="dashIconText"><?php echo CHtml::link('<h4>Revistas</h4>',array('reportes/Revistas')); ?></div>
            </div>
        </td>
    </tr>
    <tr>
        <td  bgcolor="#E8E59F"  style="text-align: center;">
            <div  align="center">
                <?php  echo CHtml::link('<img src='.'"'. Yii::app()->theme->baseUrl.'/img/big_icons/Dashboard/equipo-mid-icon.png" alt="Certificados"   width="15%" />', array('reportes/CatastroBarcos'));?>
                <div class="dashIconText"><?php echo CHtml::link('<h4>Catastro de Equipos</h4>',array('reportes/CatastroBarcos')); ?></div>            
          </div>
        </td>
        <td bgcolor="#E6BBC6">
          <div  align="center">
            <?php  echo CHtml::link('<img src='.'"'. Yii::app()->theme->baseUrl.'/img/big_icons/Dashboard/horometro.png" alt="Revistas"  width="15%" />', array('reportes/Horometros'));   ?>
            <div class="dashIconText"><?php echo CHtml::link('<h4>Horometros</h4>',array('reportes/Horometros')); ?></div>
          </div>
        </td>
    </tr>
  </table>