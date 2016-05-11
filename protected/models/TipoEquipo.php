<?php

/**
 * This is the model class for table "tipo_equipo".
 *
 * The followings are the available columns in table 'tipo_equipo':
 * @property integer $ID_TIPOEQUIPO
 * @property string $NOMBRE_TIPOEQUIPO
 *
 * The followings are the available model relations:
 * @property Equipos[] $equiposes
 */
class TipoEquipo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipo_equipo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NOMBRE_TIPOEQUIPO', 'required'),
			array('NOMBRE_TIPOEQUIPO', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_TIPOEQUIPO, NOMBRE_TIPOEQUIPO', 'safe', 'on'=>'search'),
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
			'equiposes' => array(self::HAS_MANY, 'Equipos', 'ID_TIPOEQUIPO'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_TIPOEQUIPO' => 'Id',
			'NOMBRE_TIPOEQUIPO' => 'Tipo Equipo',
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

		$criteria->compare('ID_TIPOEQUIPO',$this->ID_TIPOEQUIPO);
		$criteria->compare('NOMBRE_TIPOEQUIPO',$this->NOMBRE_TIPOEQUIPO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TipoEquipo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
