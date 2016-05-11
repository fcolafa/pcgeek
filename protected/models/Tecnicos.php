<?php

/**
 * This is the model class for table "tecnicos".
 *
 * The followings are the available columns in table 'tecnicos':
 * @property integer $ID_TECNICO
 * @property string $RUT_TECNICO
 * @property string $NOMBRES_TECNICO
 * @property string $APELLIDOS_TECNICO
 * @property string $DIRECCION_TECNICO
 * @property string $FONO_TECNICO
 * @property string $DESCRIPCION
 *
 * The followings are the available model relations:
 * @property Informes[] $informes
 * @property Usuarios[] $usuarioses
 */
class Tecnicos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tecnicos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NOMBRES_TECNICO, APELLIDOS_TECNICO', 'required'),
			array('RUT_TECNICO', 'length', 'max'=>10),
			array('NOMBRES_TECNICO, APELLIDOS_TECNICO, DIRECCION_TECNICO', 'length', 'max'=>64),
      array('ESTADO', 'length', 'max'=>1),
      array('RUT_TECNICO', 'validateRut'),
      array('RUT_TECNICO', 'compruebaExistencia'),
			array('FONO_TECNICO', 'length', 'max'=>24),
			array('DESCRIPCION', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('RUT_TECNICO, NOMBRES_TECNICO, APELLIDOS_TECNICO, nombreCompleto, DIRECCION_TECNICO, ESTADO,FONO_TECNICO, DESCRIPCION', 'safe', 'on'=>'search'),
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
			'informes' => array(self::HAS_MANY, 'Informes', 'ID_TECNICO'),
			'usuarios' => array(self::HAS_MANY, 'Usuarios', 'ID_TECNICO'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_TECNICO' => 'Id Tecnico',
			'RUT_TECNICO' => 'Rut',
			'NOMBRES_TECNICO' => 'Nombres',
			'APELLIDOS_TECNICO' => 'Apellidos',
            'ESTADO' => 'Estado',
			'DIRECCION_TECNICO' => 'Direccion',
			'FONO_TECNICO' => 'Telefono',
			'DESCRIPCION' => 'Descripcion',
		);
	}

	public function validateRut($attribute, $params) {
			$rut =str_replace ("." , "", $this->RUT_TECNICO);
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
		            $this->addError('RUT_TECNICO', 'Rut no válido, verifique el dato ingresado"');
			    }else{
			    	$this->addError('RUT_TECNICO', 'Rut inválido. Datos no coinciden con el formato de rut"');
			    }
		}

		public function compruebaExistencia($attribute,$params){
	    if(!strpos($_SERVER['REQUEST_URI'], 'update'))
			{
				$dato = $this->RUT_TECNICO;
				$temp= Tecnicos::model()->findByAttributes(array('RUT_TECNICO'=>$this->RUT_TECNICO));

				if($temp!=null)
					$this->addError('RUT_TECNICO','Rut de tecnico existente en el sistema');
			}
	  }

		public function getPuntosRut( $rut ){
    	$rut = str_replace ("." , "", $rut);
    	$rutTmp = explode( "-", $rut );
    	return number_format( $rutTmp[0], 0, "", ".") . '-' . $rutTmp[1];
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

		$criteria->compare('ID_TECNICO',$this->ID_TECNICO);
		$criteria->compare('RUT_TECNICO',$this->RUT_TECNICO,true);
		$criteria->compare('NOMBRES_TECNICO',$this->NOMBRES_TECNICO,true);
		$criteria->compare('APELLIDOS_TECNICO',$this->APELLIDOS_TECNICO,true);
        $criteria->compare('ESTADO',$this->ESTADO,true);
		$criteria->compare('DIRECCION_TECNICO',$this->DIRECCION_TECNICO,true);
		$criteria->compare('FONO_TECNICO',$this->FONO_TECNICO,true);
		$criteria->compare('DESCRIPCION',$this->DESCRIPCION,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getNombreCompleto()
    {
        return $this->APELLIDOS_TECNICO.', '.$this->NOMBRES_TECNICO;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tecnicos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
