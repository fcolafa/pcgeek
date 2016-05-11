<?php

class EWebUser extends CWebUser{

 

    protected $_model;



    

    function A1(){

        $user = $this->loadUser();

        if ($user)

           return $user->COD_TIPO_USUARIO==LevelLookUp::A1;

        return false;

    }



    function A2(){

        $user = $this->loadUser();

        if ($user)

           return $user->COD_TIPO_USUARIO==LevelLookUp::A2;

        return false;

    }

    function G1(){

        $user = $this->loadUser();

        if ($user)

           return $user->COD_TIPO_USUARIO==LevelLookUp::G1;

        return false;

    }

    //Tecnicos

    function T1(){

        $user = $this->loadUser();

        if ($user)

           return $user->COD_TIPO_USUARIO==LevelLookUp::T1;

        return false;

    }


    //Clientes

    function C1(){

        $user = $this->loadUser();

        if ($user)

           return $user->COD_TIPO_USUARIO==LevelLookUp::C1;

        return false;

    }



    // Load user model.

    protected function loadUser()

    {

        $sql = "SELECT ID_USUARIO, COD_TIPO_USUARIO FROM usuarios Where NOMBRE_USUARIO=:value";

        $params=array(':value'=>$this->id);

        if ( $this->_model === null ) {

                $this->_model = Usuarios::model()->findBySql($sql,$params);

        }

        return $this->_model;

    }

    function getUser_Id(){
        if (Yii::app()->user->id != '')
        {
            $user = $this->loadUser(Yii::app()->user->id);
            $t = $user->ID_USUARIO;
            

        }else {
            $t = '';            
            
        }
        return $t;
    }

}