<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property string $COD_TIPO_USUARIO
 * @property integer $ID_CLIENTE
 * @property integer $ID_TECNICO
 * @property string $NOMBRE_USUARIO
 * @property string $CONTRASENA
 * @property string $EMAIL_USUARIO
 * @property string $FECHA_CREACION_USUARIO
 * @property integer $PRIMER_LOGIN
 *
 * The followings are the available model relations:
 * @property TipoUsuario $tipoUsuario
 * @property Tecnicos $iDTECNICO
 * @property Clientes $iDCLIENTE
 */

class Usuarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
        public $_RPT_CONTRASENA;      
        public $_PASSANTIGUA;
        
	public function tableName()
	{
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NOMBRE_USUARIO, CONTRASENA, COD_TIPO_USUARIO, _PASSANTIGUA, _RPT_CONTRASENA, EMAIL_USUARIO', 'required'),
                        array('ID_CLIENTE, ID_TECNICO, PRIMER_LOGIN', 'numerical', 'integerOnly'=>true),
			array('NOMBRE_USUARIO, CONTRASENA', 'length', 'max'=>50),
			array('COD_TIPO_USUARIO', 'length', 'max'=>3),
			array('NOMBRE_USUARIO', 'user_exist', 'on'=>'create'),
                        array('EMAIL_USUARIO','email'),
                        array('_RPT_CONTRASENA, _PASSANTIGUA', 'safe'),
                        array('_PASSANTIGUA','updatePassword','on'=>'update'),
                        array('EMAIL_USUARIO', 'length', 'max'=>60),
                        array('FECHA_CREACION_USUARIO', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('EMAIL_USUARIO,COD_TIPO_USUARIO, NOMBRE_USUARIO, CONTRASENA, EMAIL_USUARIO, CONTRASENA, ID_CLIENTE, ID_TECNICO, FECHA_CREACION_USUARIO, PRIMER_LOGIN', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'tipoUsuario' => array(self::BELONGS_TO, 'TipoUsuario', 'COD_TIPO_USUARIO'),
			'iDCLIENTE' => array(self::BELONGS_TO, 'Clientes', 'ID_CLIENTE'),
			'iDTECNICO' => array(self::BELONGS_TO, 'Tecnicos', 'ID_TECNICO'),
		);

	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'COD_TIPO_USUARIO' => 'Tipo de Usuario',
			'ID_CLIENTE' => 'Cliente',
			'ID_TECNICO' => 'Técnico',
			'NOMBRE_USUARIO' => 'Nombre Usuario',
			'CONTRASENA' => 'Contraseña Nueva',
			'EMAIL_USUARIO' => 'Email',
			'_PASSANTIGUA' => 'Contraseña Actual',
			'_RPT_CONTRASENA' => 'Repetir Contraseña Nueva',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('COD_TIPO_USUARIO',$this->COD_TIPO_USUARIO,true);
		$criteria->compare('ID_CLIENTE',$this->ID_CLIENTE);
		$criteria->compare('ID_TECNICO',$this->ID_TECNICO);
		$criteria->compare('NOMBRE_USUARIO',$this->NOMBRE_USUARIO,true);
		$criteria->compare('CONTRASENA',$this->CONTRASENA,true);
		$criteria->compare('EMAIL_USUARIO',$this->EMAIL_USUARIO,true);
                $criteria->compare('FECHA_CREACION_USUARIO',$this->FECHA_CREACION_USUARIO,true);
		$criteria->compare('PRIMER_LOGIN',$this->PRIMER_LOGIN);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
    			'defaultOrder'=>'NOMBRE_USUARIO ASC',
    		),
				'pagination' => array(
	            'pageSize' => 20,
	        	),
		));
	}

	public function user_exist($attribute, $params)
	{
		//Buscar el usuario en la tabla
	  	//$table = Usuarios::find()->where("NOMBRE_USUARIO=:user", [":user" => $this->NOMBRE_USUARIO]);

	  	$table = Usuarios::model()->findAll(array('condition'=>'NOMBRE_USUARIO="'.$this->NOMBRE_USUARIO.'"')); 
	  	//die(var_dump($table));
	  	//Si el username existe mostrar el error
	  	if (count($table) >= 1)
	  	{
	        $this->addError($attribute, "El usuario ingresado ya existe");
	  	}
	}
          public function updatePassword($attribute, $params) {
           $user= Usuarios::model()->findByPk($this->ID_USUARIO);
           if($this->ID_USUARIO!=Yii::app()->user->getUser_Id()){
               if ($this->_PASSANTIGUA!=$user->CONTRASENA)
                     $this->addError($attribute, Yii::t('validation','Wrong Password'));
           }
           else{
                if (md5($this->_PASSANTIGUA)!=$user->CONTRASENA)
                     $this->addError($attribute, Yii::t('validation','Wrong Password'));
                }
           
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function validatePassword($password)
	{
		return md5($password) ===$this->CONTRASENA;
	}
}
