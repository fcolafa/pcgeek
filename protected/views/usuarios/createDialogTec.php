<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                'id'=>'techDialog',
                'options'=>array(
                    'title'=>Yii::t('tech','Crear Técnico'),
                    'autoOpen'=>true,
                    'modal'=>'true',
                    'width'=>'auto',
                    'height'=>'auto',
                ),
                ));
echo $this->renderPartial('_formDialogTecnico', array('model'=>$model)); ?>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>