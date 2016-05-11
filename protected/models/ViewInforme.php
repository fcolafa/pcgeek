<?php

/**
 * This is the model class for table "viewinforme".
 *
 * The followings are the available columns in table 'viewinforme':
 * @property integer $ID_INFORME
 * @property string $FECHA_INGRESO
 * @property string $NOMBRES_TECNICO
 * @property integer $ID_CLIENTE
 * @property string $NOMBRE_CLIENTE
 * @property string $NOMBRE_SUCURSAL
 * @property string $UBICACION
 * @property string $NOMBRE_VISITA
 * @property integer $VALOR
 */
class ViewInforme extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'viewinforme';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('FECHA_INGRESO', 'required'),
			array('ID_INFORME, ID_CLIENTE, VALOR', 'numerical', 'integerOnly'=>true),
			array('NOMBRES_TECNICO, NOMBRE_CLIENTE, NOMBRE_VISITA', 'length', 'max'=>64),
			array('NOMBRE_SUCURSAL', 'length', 'max'=>50),
			array('UBICACION', 'length', 'max'=>55),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_INFORME, FECHA_INGRESO, NOMBRES_TECNICO, ID_CLIENTE, NOMBRE_CLIENTE, NOMBRE_SUCURSAL, UBICACION, NOMBRE_VISITA, VALOR', 'safe', 'on'=>'search'),
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
			'ID_INFORME' => 'Id Informe',
			'FECHA_INGRESO' => 'Fecha Ingreso',
			'NOMBRES_TECNICO' => 'Nombres Tecnico',
			'ID_CLIENTE' => 'Id Cliente',
			'NOMBRE_CLIENTE' => 'Nombre Cliente',
			'NOMBRE_SUCURSAL' => 'Nombre Sucursal',
			'UBICACION' => 'Ubicacion',
			'NOMBRE_VISITA' => 'Nombre Visita',
			'VALOR' => 'Valor',
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

		$criteria->compare('ID_INFORME',$this->ID_INFORME);
		$criteria->compare('FECHA_INGRESO',$this->FECHA_INGRESO,true);
		$criteria->compare('NOMBRES_TECNICO',$this->NOMBRES_TECNICO,true);
		$criteria->compare('ID_CLIENTE',$this->ID_CLIENTE);
		$criteria->compare('NOMBRE_CLIENTE',$this->NOMBRE_CLIENTE,true);
		$criteria->compare('NOMBRE_SUCURSAL',$this->NOMBRE_SUCURSAL,true);
		$criteria->compare('UBICACION',$this->UBICACION,true);
		$criteria->compare('NOMBRE_VISITA',$this->NOMBRE_VISITA,true);
		$criteria->compare('VALOR',$this->VALOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Viewinforme the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
