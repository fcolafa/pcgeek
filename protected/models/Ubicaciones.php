<?php

/**
 * This is the model class for table "ubicaciones".
 *
 * The followings are the available columns in table 'ubicaciones':
 * @property integer $ID_UBICACION
 * @property string $REGION
 * @property string $UBICACION
 *
 * The followings are the available model relations:
 * @property Informes[] $informes
 * @property Valores[] $valores
 */
class Ubicaciones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ubicaciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('REGION, UBICACION', 'required'),
			array('REGION', 'length', 'max'=>4),
			array('UBICACION', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_UBICACION, REGION, UBICACION', 'safe', 'on'=>'search'),
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
			'informes' => array(self::HAS_MANY, 'Informes', 'ID_UBICACION'),
			'valores' => array(self::HAS_MANY, 'Valores', 'ID_UBICACION'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_UBICACION' => 'Id Ubicacion',
			'REGION' => 'Region',
			'UBICACION' => 'Ubicacion',
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

		$criteria->compare('ID_UBICACION',$this->ID_UBICACION);
		$criteria->compare('REGION',$this->REGION,true);
		$criteria->compare('UBICACION',$this->UBICACION,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ubicaciones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
