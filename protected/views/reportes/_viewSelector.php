<?php
/* @var $this SistemaController */
/* @var $model Sistema */
/* @var $form CActiveForm */
?>
<?php
    $this->breadcrumbs=array(
        'reportes'=>array('index'),
        'Selección de Reporte',
    );
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'sistema-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>
<h1>Opciones de Gráfico</h1>
<table border='0'>
    <tr>
        <td>
            <div class="row">
                <?php echo '<p align="center"><b>Tipo</b></p>'; ?>
                <div>
                    <?php echo CHtml::radioButtonList('type','type', array('lc'=>'Linea Continua', 'bhs'=>'Barras Horizontal', 'bvs'=>'Barras Vertical', 'p'=>'Circular 2D', 'p3'=>'Circular 3D', 's'=>'Puntos', 'r'=>'Radar'));?>
                </div>
            </div>
        </td>
        <td width="50px">
        </td>
        <td valign="top" align="right">
            <div class="row">
                <?php echo '<p align="center"><b>Tamaño <br><font size="0em"> (Ej: 350x150)</b></font></p>'; ?>
                <div valign="center">
                    <?php 
                        echo 'Largo:';
                        echo CHtml::textField('height','',array('style'=>'width:30px;'));
                        echo 'px';
                    ?>
                    <br>
                    <?php 
                        echo 'Alto:';
                        echo CHtml::textField('width','',array('style'=>'width:30px;'));
                        echo 'px';
                    ?>
                </div>
            </div>
        </td>
        <td width="50px">
        </td>
        <td valign="top" align="right">
            <div class="row">
                <?php echo '<p align="center"><b>Titulo</b></p>'; ?>
                <div valign="center">
                    <br>
                    <?php 
                        echo CHtml::textField('title','',array('style'=>'width:100px;'));
                    ?>
                </div>
            </div>
        </td>
    </tr>
</table>

    <div class="row">
        <?php// echo $form->labelEx($model,'DESCRIPCION_SISTEMA'); ?>
        <?php// echo $form->textArea($model,'DESCRIPCION_SISTEMA',array('rows'=>6, 'cols'=>50)); ?>
        <?php// echo $form->error($model,'DESCRIPCION_SISTEMA'); ?>
    </div>

    <div class="row buttons">
        <?php ////echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
    </div>
<?php $this->endWidget(); ?>
    
</div><!-- form -->