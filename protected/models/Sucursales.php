<?php

/**
 * This is the model class for table "sucursales".
 *
 * The followings are the available columns in table 'sucursales':
 * @property integer $ID_SUCURSAL
 * @property integer $ID_CLIENTE
 * @property string $NOMBRE_SUCURSAL
 * @property string $DIRECCION_SUCURSAL
 * @property string $CONTACTO_SUCURSAL
 * @property string $FONO_SUCURSAL
 * @property string $DESCRIPCION
 *
 * The followings are the available model relations:
 * @property Clientes $iDCLIENTE
 */
class Sucursales extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sucursales';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_CLIENTE, NOMBRE_SUCURSAL', 'required'),
			array('ID_CLIENTE', 'numerical', 'integerOnly'=>true),
			array('NOMBRE_SUCURSAL', 'length', 'max'=>50),
			array('DIRECCION_SUCURSAL, CONTACTO_SUCURSAL', 'length', 'max'=>64),
			array('FONO_SUCURSAL', 'length', 'max'=>24),
			array('DESCRIPCION', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_SUCURSAL,nombreCompleto, ID_CLIENTE, NOMBRE_SUCURSAL, DIRECCION_SUCURSAL, CONTACTO_SUCURSAL, FONO_SUCURSAL, DESCRIPCION', 'safe', 'on'=>'search'),
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
			'iDCLIENTE' => array(self::BELONGS_TO, 'Clientes', 'ID_CLIENTE'));
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_SUCURSAL' => 'Id Sucursal',
			'ID_CLIENTE' => 'Cliente',
			'NOMBRE_SUCURSAL' => 'Nombre Sucursal',
			'DIRECCION_SUCURSAL' => 'Direccion Sucursal',
			'CONTACTO_SUCURSAL' => 'Persona Contacto',
			'FONO_SUCURSAL' => 'Fono Sucursal',
			'DESCRIPCION' => 'Descripcion',
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

		$criteria->compare('ID_SUCURSAL',$this->ID_SUCURSAL);
		$criteria->compare('ID_CLIENTE',$this->ID_CLIENTE);
		$criteria->compare('NOMBRE_SUCURSAL',$this->NOMBRE_SUCURSAL,true);
		$criteria->compare('DIRECCION_SUCURSAL',$this->DIRECCION_SUCURSAL,true);
		$criteria->compare('CONTACTO_SUCURSAL',$this->CONTACTO_SUCURSAL,true);
		$criteria->compare('FONO_SUCURSAL',$this->FONO_SUCURSAL,true);
		$criteria->compare('DESCRIPCION',$this->DESCRIPCION,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
    			'defaultOrder'=>'NOMBRE_SUCURSAL ASC',
    			//'defaultOrder'=>array('TIPO_VISITA'=>CSort::SORT_ASC),
    		),
		));
	}

	public function getNombreCompleto()
    {
        return $this->iDCLIENTE->NOMBRE_CLIENTE.', '.$this->NOMBRE_SUCURSAL;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sucursales the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
