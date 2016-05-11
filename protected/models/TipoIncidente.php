<?php

/**
 * This is the model class for table "tipo_incidente".
 *
 * The followings are the available columns in table 'tipo_incidente':
 * @property integer $ID_TIPO_INCIDENTE
 * @property string $NOMBRE_CORTO
 * @property string $DESCRIPCION_TIPO_INICIDENTE
 *
 * The followings are the available model relations:
 * @property Incidentes[] $incidentes
 */
class TipoIncidente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipo_incidente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NOMBRE_TIPO_INCIDENTE, DESCRIPCION_TIPO_INICIDENTE', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('NOMBRE_TIPO_INCIDENTE, DESCRIPCION_TIPO_INICIDENTE', 'safe'),
			array('ID_TIPO_INCIDENTE, NOMBRE_TIPO_INCIDENTE, DESCRIPCION_TIPO_INICIDENTE', 'safe', 'on'=>'search'),
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
			'incidentes' => array(self::HAS_MANY, 'Incidentes', 'ID_TIPO_INCIDENTE'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_TIPO_INCIDENTE' => 'N° Tipo Incidente',
			'NOMBRE_TIPO_INCIDENTE' => 'Nombre Corto',
			'DESCRIPCION_TIPO_INICIDENTE' => 'Descripcion Tipo Inicidente',
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

		$criteria->compare('ID_TIPO_INCIDENTE',$this->ID_TIPO_INCIDENTE);
		$criteria->compare('NOMBRE_TIPO_INCIDENTE',$this->NOMBRE_TIPO_INCIDENTE,true);
		$criteria->compare('DESCRIPCION_TIPO_INICIDENTE',$this->DESCRIPCION_TIPO_INICIDENTE,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TipoIncidente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
