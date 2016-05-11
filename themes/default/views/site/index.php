<?php
/* @var $this SiteController */

//$this->pageTitle=Yii::app()->name;
$this->pageTitle='PC Geek';
$baseUrl = Yii::app()->theme->baseUrl; 
?>




<style type="text/css">

.shadowtable{
    -moz-box-shadow: -6px -7px 7px #969696;
    -webkit-box-shadow: -6px -7px 7px #969696;
    box-shadow: -6px -7px 7px #969696;
}

.rounderborder{
    border:none 7px #000000;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright:5px;
    -moz-border-radius-bottomleft:5px;
    -moz-border-radius-bottomright:0px;
    -webkit-border-top-left-radius:5px;
    -webkit-border-top-right-radius:5px;
    -webkit-border-bottom-left-radius:5px;
    -webkit-border-bottom-right-radius:0px;
    border-top-left-radius:5px;
    border-top-right-radius:5px;
    border-bottom-left-radius:5px;
    border-bottom-right-radius:0px;
}
</style>
  <div class="row-fluid" >
    <div id="msg_warnning" class="alert alert-warning" style="display: none">
        
    </div>
    <div class="container-fluid" valign="center"  style="padding-top:0%;">
       
            <?php if(Yii::app()->user->A1()){?>
            <div align="center" valign="top" class="messageButtonb blue">
                <?php  echo CHtml::link('<img src='.'"'. Yii::app()->theme->baseUrl.'/img/icons/clients_add.png" alt="Clientes"  width="23%" />', array('sucursales/admin'));   ?>
                <div class="dashIconText"><?php echo CHtml::link('<h4>Clientes</h4>',array('sucursales/admin')); ?></div>
            </div>
       
     
            <div align="center" valign="top" class="messageButtonb blue">
                <?php  echo CHtml::link('<img src='.'"'. Yii::app()->theme->baseUrl.'/img/icons/tech_support.png" alt="Visitas"  width="23%" />', array('visitas/admin'));   ?>
                <div class="dashIconText"><?php echo CHtml::link('<h4>Visitas</h4>',array('visitas/admin')); ?></div>
            </div>
            
            <div align="center" valign="top" class="messageButtonb blue">
                <?php  echo CHtml::link('<img src='.'"'. Yii::app()->theme->baseUrl.'/img/icons/report_check.png" alt="Informes"  width="23%" />', array('informes/admin'));   ?>
                <div> <?php echo CHtml::link('<h4>Informes</h4>',array('informes/admin')); ?></div>
            </div>
   
        
      
            <div align="center" valign="top" class="messageButtonb blue">
                <?php  echo CHtml::link('<img src='.'"'. Yii::app()->theme->baseUrl.'/img/icons/users.png" alt="Usuarios"  width="23%" />', array('usuarios/admin'));   ?>
                <div class="dashIconText"><?php echo CHtml::link('<h4>Usuarios</h4>',array('usuarios/admin')); ?></div>
            </div>
         
      
      
            <?php }?>
        <?php if(Yii::app()->user->A1()||Yii::app()->user->C1()){ ?>
           <div align="center" valign="top" class="messageButtonb blue">
                <?php  echo CHtml::link('<img src='.'"'. Yii::app()->theme->baseUrl.'/img/icons/ticket.png" alt="Ticket"  width="23%" />', array('ticket/admin'));   ?>
                <div class="dashIconText"><?php echo CHtml::link('<h4>Tickets de soporte</h4>',array('ticket/admin')); ?></div>
            </div>
        <?php } ?>
</div>
  </div>

