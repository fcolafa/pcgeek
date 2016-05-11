<?php

/**
 * This is the model class for table "viewinformevalores".
 *
 * The followings are the available columns in table 'viewinformevalores':
 * @property integer $ID_VISITA
 * @property integer $ID_UBICACION
 * @property string $NOMBRE_VISITA
 * @property string $UBICACION
 */
class Viewinformevalores extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'viewinformevalores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NOMBRE_VISITA, UBICACION', 'required'),
			array('ID_VISITA, ID_UBICACION', 'numerical', 'integerOnly'=>true),
			array('NOMBRE_VISITA', 'length', 'max'=>64),
			array('UBICACION', 'length', 'max'=>55),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_VISITA, ID_UBICACION, NOMBRE_VISITA, UBICACION', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'NOMBRE_VISITA' => 'Nombre Visita',
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

		$criteria->compare('ID_VISITA',$this->ID_VISITA);
		$criteria->compare('ID_UBICACION',$this->ID_UBICACION);
		$criteria->compare('NOMBRE_VISITA',$this->NOMBRE_VISITA,true);
		$criteria->compare('UBICACION',$this->UBICACION,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Viewinformevalores the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
