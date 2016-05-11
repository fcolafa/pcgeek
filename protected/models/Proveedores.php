<?php

/**
 * This is the model class for table "proveedores".
 *
 * The followings are the available columns in table 'proveedores':
 * @property string $RUT_PROVEEDOR
 * @property string $NOMBRE_PROVEEDOR
 * @property string $DIRECCION_PROVEEDOR
 * @property string $CIUDAD_PROVEEDOR
 *
 * The followings are the available model relations:
 * @property Equipos[] $equiposes
 */
class Proveedores extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'proveedores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('RUT_PROVEEDOR, NOMBRE_PROVEEDOR', 'required'),
			array('RUT_PROVEEDOR', 'length', 'max'=>15),
			array('NOMBRE_PROVEEDOR, DIRECCION_PROVEEDOR, CIUDAD_PROVEEDOR', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('RUT_PROVEEDOR, NOMBRE_PROVEEDOR, DIRECCION_PROVEEDOR, CIUDAD_PROVEEDOR', 'safe', 'on'=>'search'),
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
			'equiposes' => array(self::HAS_MANY, 'Equipos', 'RUT_PROVEEDOR'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'RUT_PROVEEDOR' => 'Rut Proveedor',
			'NOMBRE_PROVEEDOR' => 'Nombre Proveedor',
			'DIRECCION_PROVEEDOR' => 'Direccion Proveedor',
			'CIUDAD_PROVEEDOR' => 'Ciudad Proveedor',
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

		$criteria->compare('RUT_PROVEEDOR',$this->RUT_PROVEEDOR,true);
		$criteria->compare('NOMBRE_PROVEEDOR',$this->NOMBRE_PROVEEDOR,true);
		$criteria->compare('DIRECCION_PROVEEDOR',$this->DIRECCION_PROVEEDOR,true);
		$criteria->compare('CIUDAD_PROVEEDOR',$this->CIUDAD_PROVEEDOR,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Proveedores the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
