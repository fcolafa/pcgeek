<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                'id'=>'sucDialog',
                'options'=>array(
                    'title'=>Yii::t('suc','Crear Sucursal'),
                    'autoOpen'=>true,
                    'modal'=>'true',
                    'width'=>'auto',
                    'height'=>'auto',
                ),
                ));
echo $this->renderPartial('_formDialogSucursal', array('model'=>$model)); ?>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>