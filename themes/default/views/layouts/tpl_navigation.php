
	
<!-- aquí esta el menú que se está utilizando -->
     
                <?php 
//                $this->widget('zii.widgets.CMenu',array(
//                    'htmlOptions'=>array('class'=>'nav navbar-nav navbar-text'),
//                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
//                    'itemCssClass'=>'dropdown',
//                    'encodeLabel'=>false,
//                    'items'=>array(
//                        array('label'=>'Inicio', 'url'=>array('/site/index'),'visible'=>!Yii::app()->user->isGuest),
//                        //menú de Clientes
//
//                        array('label'=>'Clientes <span class="caret"></span>', 'url'=>'#','visible'=>Yii::app()->user->A1()||Yii::app()->user->A2()||Yii::app()->user->T1(),'itemOptions'=>array('class'=>"dropdown", 'tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
//                        'items'=>array(                            
//                            array('label'=>'Clientes', 'url'=>array('clientes/admin'),'visible'=>Yii::app()->user->A1()||Yii::app()->user->A2()),
//                            array('label'=>'Clientes', 'url'=>array('clientes/index'),'visible'=>Yii::app()->user->T1()),
//                            array('label'=>'Sucursales', 'url'=>array('sucursales/admin'),'visible'=>Yii::app()->user->A1()||Yii::app()->user->A2()||Yii::app()->user->T1()),
//                            array('label'=>'Visitas', 'url'=>array('visitas/admin'),'visible'=>Yii::app()->user->A1()||Yii::app()->user->A2()||Yii::app()->user->T1()),
//                        )),
//                        //Ingreso Informes
//                        array('label'=>'Informes <span class="caret"></span>', 'url'=>'#','visible'=>!Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
//                        'items'=>array(
//                            array('label'=>'Informes' , 'url'=>array('informes/admin')),
//                        )),
//                        //Menu admin
//                        array('label'=>'Sistema <span class="caret"></span>', 'url'=>'#','visible'=>Yii::app()->user->A1()||Yii::app()->user->A2(),'itemOptions'=>array('class'=>"dropdown", 'tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
//                        'items'=>array(
//                            array('label'=>'Tecnicos', 'url'=>array('tecnicos/admin')),
//                            array('label'=>'Usuarios', 'url'=>array('usuarios/admin')),
//                            array('label'=>'Valores', 'url'=>array('valores/admin')),
//                            array('label'=>'Ubicaciones', 'url'=>array('ubicaciones/admin')),
//                            array('label'=>'Tipos Usuarios' , 'url'=>array('tipoUsuario/admin'),'visible'=>Yii::app()->user->A1()),
//                            array('label'=>'Tipos Visitas', 'url'=>array('tipoVisitas/admin'),'visible'=>Yii::app()->user->A1()),
//                        )),
//                        array('label'=>'Inventario <span class="caret"></span>', 'url'=>'#','visible'=>Yii::app()->user->A1()||Yii::app()->user->A2(),'itemOptions'=>array('class'=>"dropdown", 'tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
//                        'items'=>array(
//                                array('label'=>'Equipos', 'url'=>array('equipos/admin')),
//                                array('label'=>'Tipo Equipos', 'url'=>array('tipoEquipo/admin')),
//                                array('label'=>'Proveedor', 'url'=>array('proveedores/admin')),
//                            )),
//                        array('label'=>'Reporte Incidentes <span class="caret"></span>', 'url'=>'#','visible'=>Yii::app()->user->A1()||Yii::app()->user->A2(),'itemOptions'=>array('class'=>"dropdown", 'tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
//                        'items'=>array(
//                                array('label'=>'Incidentes', 'url'=>array('incidentes/admin')),
//                                array('label'=>'Tipo Incidente', 'url'=>array('tipoIncidente/admin')),
//                                array('label'=>'Canal Camaras', 'url'=>array('canalCamaras/admin')),
//                            )),
//                        array('label'=>'Soporte','url'=>array('Ticket/admin')),
//                        array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
//                        ),
//                    ));        
if(Yii::app()->user->isFTime()==0){               
$this->widget('ext.multilevelmenu.MultilevelHorizontalMenu',
array(
"menu"=>array(
             array("url"=>array("route"=>'site/index'),
                       "label"=>'Inicio'),
             array("url"=>array('#'),
                       "label"=>'Clientes <span class="caret"></span>',
                       "visible"=>Yii::app()->user->A1()||Yii::app()->user->A2()||Yii::app()->user->T1(),
              array("url"=>array(
                           "link"=>array('clientes/admin'),
                          // "htmlOptions"=>array("target"=>"_BLANK","visible"=>!Yii::app()->user->isGuest)
                  ),
                           "label"=>Yii::t('actions','Clientes')),
                           "visible"=>!Yii::app()->user->isGuest,
              array("url"=>array(
                           "link"=>array('sucursales/admin'),
                           //"htmlOptions"=>array("target"=>"_BLANK","visible"=>!Yii::app()->user->isGuest)
                  ),
                           "label"=>Yii::t('actions','Sucursales')),
              array("url"=>array(
                           "link"=>array('visitas/admin'),
                          // "htmlOptions"=>array()
                  ),
                           "label"=>Yii::t('actions','Visitas')),
                           
        
       
                ),
             array("url"=>array("route"=>'informes/admin'),
                       "label"=>'Informes',
                       "visible"=>Yii::app()->user->A1()||Yii::app()->user->A2()||Yii::app()->user->T1(),                 
                ),
                        
          
         array("url"=>array('#'),
                       "label"=>'Sistema <span class="caret"></span>',
                       "visible"=>Yii::app()->user->A1()||Yii::app()->user->A2(),
              array("url"=>array(
                           "link"=>array('tecnicos/admin'),
                          // "htmlOptions"=>array("target"=>"_BLANK","visible"=>!Yii::app()->user->isGuest)
                  ),
                           "label"=>Yii::t('actions','Tecnicos')),
                           "visible"=>!Yii::app()->user->isGuest,
              array("url"=>array(
                           "link"=>array('usuarios/admin'),
                           //"htmlOptions"=>array("target"=>"_BLANK","visible"=>!Yii::app()->user->isGuest)
                  ),
                           "label"=>Yii::t('actions','Usuarios')),
              array("url"=>array(
                           "link"=>array('valores/admin'),
                          // "htmlOptions"=>array()
                  ),
                           "label"=>Yii::t('actions','Valores')),
              array("url"=>array(
                           "link"=>array('ubicaciones/admin'),
                          // "htmlOptions"=>array()
                  ),
                           "label"=>Yii::t('actions','Ubicaciones')),
              array("url"=>array(
                           "link"=>array('tipoUsuario/admin'),
                          // "htmlOptions"=>array()
                  ),
                           "label"=>Yii::t('actions','Tipos Usuarios')),
              array("url"=>array(
                           "link"=>array('tipoVisitas/admin'),
                          // "htmlOptions"=>array()
                  ),
                           "label"=>Yii::t('actions','Tipos Visitas')),
                ),
    //inventario
          array("url"=>array('#'),
                       "label"=>'Inventario <span class="caret"></span>',
                       "visible"=>Yii::app()->user->A1()||Yii::app()->user->A2(),
              array("url"=>array(
                           "link"=>array('equipos/admin'),
                          // "htmlOptions"=>array("target"=>"_BLANK","visible"=>!Yii::app()->user->isGuest)
                  ),
                           "label"=>Yii::t('actions','Equipos')),
                           "visible"=>!Yii::app()->user->isGuest,
              array("url"=>array(
                           "link"=>array('tipoEquipo/admin'),
                           //"htmlOptions"=>array("target"=>"_BLANK","visible"=>!Yii::app()->user->isGuest)
                  ),
                           "label"=>Yii::t('actions','Tipo Equipos')),
              array("url"=>array(
                           "link"=>array('proveedores/admin'),
                          // "htmlOptions"=>array()
                  ),
                           "label"=>Yii::t('actions','Tipo Equipos')),
                           
        
       
                ),
    //Reporte incidentes
          array("url"=>array('#'),
                       "label"=>'Reporte Incidentes <span class="caret"></span>',
                       "visible"=>Yii::app()->user->A1()||Yii::app()->user->A2(),
              array("url"=>array(
                           "link"=>array('incidentes/admin'),
                          // "htmlOptions"=>array("target"=>"_BLANK","visible"=>!Yii::app()->user->isGuest)
                  ),
                           "label"=>Yii::t('actions','Incidentes')),
                           "visible"=>!Yii::app()->user->isGuest,
              array("url"=>array(
                           "link"=>array('tipoIncidente/admin'),
                           //"htmlOptions"=>array("target"=>"_BLANK","visible"=>!Yii::app()->user->isGuest)
                  ),
                           "label"=>Yii::t('actions','Tipo Incidente')),
              array("url"=>array(
                           "link"=>array('canalCamaras/admin'),
                          // "htmlOptions"=>array()
                  ),
                           "label"=>Yii::t('actions','Canal Camaras')),
                           
        
       
                ),
          array("url"=>array("route"=>'Ticket/admin'),
                       "label"=>'Soporte',
                        "visible"=>Yii::app()->user->A1()||Yii::app()->user->A2(),
              ),
    
          array("url"=>array('site/Login'),
                       "label"=>(Yii::app()->user->isGuest)?(Yii::t('actions',"Login")):Yii::app()->user->name.' <span class="caret"></span>',
              
              array("url"=>array(
                           "link"=>array('site/Logout'),
                           "htmlOptions"=>array("target"=>"_BLANK","visible"=>!Yii::app()->user->isGuest)),
                           "label"=>Yii::t('actions','Logout')),
                           "visible"=>!Yii::app()->user->isGuest,

                ),
             
       
       
               
   
          ),
)
);
}else
$this->widget('ext.multilevelmenu.MultilevelHorizontalMenu',
array(
"menu"=>array(
             array("url"=>array("route"=>'site/index'),
                       "label"=>'Inicio'),
          ),

));

?>
      

<!--
<div class="subnav navbar navbar-fixed-top">
    <div class="navbar-inner">
    	<div class="container">
        
        	<div class="style-switcher pull-left">
                <a href="javascript:chooseStyle('none', 60)" checked="checked"><span class="style" style="background-color:#0088CC;"></span></a>
                <a href="javascript:chooseStyle('style2', 60)"><span class="style" style="background-color:#7c5706;"></span></a>
                <a href="javascript:chooseStyle('style3', 60)"><span class="style" style="background-color:#468847;"></span></a>
                <a href="javascript:chooseStyle('style4', 60)"><span class="style" style="background-color:#4e4e4e;"></span></a>
                <a href="javascript:chooseStyle('style5', 60)"><span class="style" style="background-color:#d85515;"></span></a>
                <a href="javascript:chooseStyle('style6', 60)"><span class="style" style="background-color:#a00a69;"></span></a>
                <a href="javascript:chooseStyle('style7', 60)"><span class="style" style="background-color:#a30c22;"></span></a>
          	</div>
           <form class="navbar-search pull-right" action="">
           	 
           <input type="text" class="search-query span2" placeholder="Search">
           
           </form>
    	</div> container 
    </div> navbar-inner 
</div> subnav -->
