<?php

/**
 * This is the model class for table "clientes".
 *
 * The followings are the available columns in table 'clientes':
 * @property integer $ID_CLIENTE
 * @property string $RUT_CLIENTE
 * @property string $NOMBRE_CLIENTE
 * @property string $DIRECCION_CLIENTE
 * @property string $FONO_CLIENTE
 * @property string $CONTACTO
 * @property string $FONO_CONTACTO
 * @property string $DESCRIPCION
 *
 * The followings are the available model relations:
 * @property Informes[] $informes
 * @property Sucursales[] $sucursales
 * @property Usuarios[] $usuarioses
 */
class Clientes extends CActiveRecord
{

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'clientes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NOMBRE_CLIENTE', 'required'),
			array('RUT_CLIENTE', 'length', 'max'=>10),
			array('NOMBRE_CLIENTE, CONTACTO', 'length', 'max'=>64),
			array('FONO_CLIENTE, FONO_CONTACTO', 'length', 'max'=>24),
			array('RUT_CLIENTE', 'validateRut'),
                        array('RUT_CLIENTE', 'compruebaExistencia'),
			array('DIRECCION_CLIENTE, DESCRIPCION', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('RUT_CLIENTE, NOMBRE_CLIENTE, DIRECCION_CLIENTE, FONO_CLIENTE, CONTACTO, FONO_CONTACTO, DESCRIPCION', 'safe', 'on'=>'search'),
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
			'informes' => array(self::HAS_MANY, 'Informes', 'ID_CLIENTE'),
			'sucursales' => array(self::HAS_MANY, 'Sucursales', 'ID_CLIENTE'),
			'usuarioses' => array(self::HAS_MANY, 'Usuarios', 'ID_CLIENTE'),
		

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_CLIENTE' => 'Id Cliente',
			'RUT_CLIENTE' => 'Rut Cliente',
			'NOMBRE_CLIENTE' => 'Nombre Cliente',
			'DIRECCION_CLIENTE' => 'Direccion Cliente',
			'FONO_CLIENTE' => 'Fono Cliente',
			'CONTACTO' => 'Contacto',
			'FONO_CONTACTO' => 'Fono Contacto',
			'DESCRIPCION' => 'Observación',
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

		$criteria->compare('ID_CLIENTE',$this->ID_CLIENTE);
		$criteria->compare('RUT_CLIENTE',$this->RUT_CLIENTE,true);
		$criteria->compare('NOMBRE_CLIENTE',$this->NOMBRE_CLIENTE,true);
		$criteria->compare('DIRECCION_CLIENTE',$this->DIRECCION_CLIENTE,true);
		$criteria->compare('FONO_CLIENTE',$this->FONO_CLIENTE,true);
		$criteria->compare('CONTACTO',$this->CONTACTO,true);
		$criteria->compare('FONO_CONTACTO',$this->FONO_CONTACTO,true);
		$criteria->compare('DESCRIPCION',$this->DESCRIPCION,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
    			'defaultOrder'=>'NOMBRE_CLIENTE ASC',
    			//'defaultOrder'=>array('TIPO_VISITA'=>CSort::SORT_ASC),
    		),
		));
	}

	public function validateRut($attribute, $params) {
			$rut =str_replace ("." , "", $this->RUT_CLIENTE);
	        $data = explode('-', $rut);
	        if(ctype_digit($data[0])){
		        $evaluate = strrev($data[0]);
		        $multiply = 2;
		        $store = 0;
		        for ($i = 0; $i < strlen($evaluate); $i++) {
		            $store += $evaluate[$i] * $multiply;
		            $multiply++;
		            if ($multiply > 7)
		                $multiply = 2;
		        }
		        isset($data[1]) ? $verifyCode = strtolower($data[1]) : $verifyCode = '';
		        $result = 11 - ($store % 11);
		        if ($result == 10)
		            $result = 'k';
		        if ($result == 11)
		            $result = 0;
		        if ($verifyCode != $result)
		            $this->addError('RUT_CLIENTE', 'Rut no válido, verifique el dato ingresado"');
			    }else{
			    	$this->addError('RUT_CLIENTE', 'Rut inválido. Datos no coinciden con el formato de rut"');
			    }
		}

		public function compruebaExistencia($attribute,$params){
	    if(!strpos($_SERVER['REQUEST_URI'], 'update'))
			{
				$dato = $this->RUT_CLIENTE;
				$temp= Clientes::model()->findByAttributes(array('RUT_CLIENTE'=>$this->RUT_CLIENTE));

				if($temp!=null)
					$this->addError('RUT_CLIENTE','Rut de cliente existente en el sistema');
			}
	  }

		public function getPuntosRut( $rut ){
    	$rut = str_replace ("." , "", $rut);
    	$rutTmp = explode( "-", $rut );
    	return number_format( $rutTmp[0], 0, "", ".") . '-' . $rutTmp[1];
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Clientes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
