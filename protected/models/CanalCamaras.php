<?php

/**
 * This is the model class for table "canal_camaras".
 *
 * The followings are the available columns in table 'canal_camaras':
 * @property integer $ID_CANALCAMARAS
 * @property integer $ID_SUCURSAL
 * @property integer $NUM_CAMARA
 * @property string $UBICACION_CAMARA
 * @property string $FECHA_CAMBIO_CAMARA
 * @property string $OBSERVACION_CAMARA
 * @property integer $ESTADO_CAMARA
 *
 * The followings are the available model relations:
 * @property Sucursales $sucursales
 */
class CanalCamaras extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'canal_camaras';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_SUCURSAL, NUM_CAMARA, UBICACION_CAMARA', 'required'),
			array('ID_SUCURSAL, NUM_CAMARA, ESTADO_CAMARA', 'numerical', 'integerOnly'=>true),
			array('UBICACION_CAMARA', 'length', 'max'=>50),
			array('OBSERVACION_CAMARA', 'length', 'max'=>255),
			array('FECHA_CAMBIO_CAMARA', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_CANALCAMARAS, ID_SUCURSAL, NUM_CAMARA, UBICACION_CAMARA, FECHA_CAMBIO_CAMARA, OBSERVACION_CAMARA, ESTADO_CAMARA', 'safe', 'on'=>'search'),
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
			'sucursales' => array(self::BELONGS_TO, 'Sucursales', 'ID_SUCURSAL'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_CANALCAMARAS' => 'ID',
			'ID_SUCURSAL' => 'Sucursal',
			'NUM_CAMARA' => 'Número Camara',
			'UBICACION_CAMARA' => 'Ubicación Camara',
			'FECHA_CAMBIO_CAMARA' => 'Fecha Cambio Camara',
			'OBSERVACION_CAMARA' => 'Observación Camara',
			'ESTADO_CAMARA' => 'Estado Camara',
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

		$criteria->compare('ID_CANALCAMARAS',$this->ID_CANALCAMARAS);
		$criteria->compare('ID_SUCURSAL',$this->ID_SUCURSAL);
		$criteria->compare('NUM_CAMARA',$this->NUM_CAMARA);
		$criteria->compare('UBICACION_CAMARA',$this->UBICACION_CAMARA,true);
		$criteria->compare('FECHA_CAMBIO_CAMARA',$this->FECHA_CAMBIO_CAMARA,true);
		$criteria->compare('OBSERVACION_CAMARA',$this->OBSERVACION_CAMARA,true);
		$criteria->compare('ESTADO_CAMARA',$this->ESTADO_CAMARA);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function getUbicacionCamara()
  {
      return $this->NUM_CAMARA.' - '.$this->UBICACION_CAMARA;
  }


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CanalCamaras the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
