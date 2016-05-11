<?php

/**
 * This is the model class for table "incidentes".
 *
 * The followings are the available columns in table 'incidentes':
 * @property integer $ID_INCIDENTE
 * @property integer $ID_SUCURSAL
 * @property string $ID_CANALCAMARAS
 * @property string $FECHA_INCIDENTE
 * @property string $HORA_INCIDENTE
 * @property integer $ID_TIPO_INCIDENTE
 * @property string $DESCRIPCION_INCIDENTE
 * @property string $IMAGEN
 * @property string $FECHA_HORA
 * @property integer $ID_USUARIO
 *
 * The followings are the available model relations:
 * @property Sucursales $sucursales
 * @property TipoIncidente $tIPOINCIDENTE
 * @property Usuarios $iDUSUARIO
 */
class Incidentes extends CActiveRecord
{
	public $ID_CLIENTE;
	public $ID_CANALCAMARAS;
	public $image;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'incidentes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_SUCURSAL, FECHA_INCIDENTE, ID_CANALCAMARAS, HORA_INCIDENTE, ID_TIPO_INCIDENTE', 'required'),
			array('image', 'file','types'=>'jpg, gif, png','on'=>'insert'),
			array('image', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'),
			
			array('ID_SUCURSAL, ID_TIPO_INCIDENTE, ID_USUARIO', 'numerical', 'integerOnly'=>true),
			array('DESCRIPCION_INCIDENTE', 'length', 'max'=>255),
			array('IMAGEN', 'length', 'max'=>64),
			array('FECHA_INCIDENTE, HORA_INCIDENTE, FECHA_HORA', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_INCIDENTE, ID_SUCURSAL, ID_CANALCAMARAS, FECHA_INCIDENTE, HORA_INCIDENTE, ID_TIPO_INCIDENTE, DESCRIPCION_INCIDENTE, IMAGEN, FECHA_HORA, ID_USUARIO', 'safe', 'on'=>'search'),
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
			'iDTIPOINCIDENTE' => array(self::BELONGS_TO, 'TipoIncidente', 'ID_TIPO_INCIDENTE'),
			'iDUSUARIO' => array(self::BELONGS_TO, 'Usuarios', 'ID_USUARIO'),
			'cliente' => array(self::BELONGS_TO, 'Clientes', 'ID_CLIENTE'),
			'iDCANALCAMARAS' => array(self::BELONGS_TO, 'CanalCamaras', 'ID_CANALCAMARAS'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_INCIDENTE' => 'ID',
			'ID_SUCURSAL' => 'Sucursal',
			'ID_CANALCAMARAS' => 'Ubicación Camara',
			'FECHA_INCIDENTE' => 'Fecha Incidente',
			'HORA_INCIDENTE' => 'Hora Incidente',
			'ID_TIPO_INCIDENTE' => 'Tipo Incidente',
			'DESCRIPCION_INCIDENTE' => 'Descripción Incidente',
			'IMAGEN' => 'Imagen',
			'FECHA_HORA' => 'Fecha Hora',
			'ID_USUARIO' => 'Usuario',
			'ID_CLIENTE'=>'Cliente'
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

		$criteria->compare('ID_INCIDENTE',$this->ID_INCIDENTE);
		$criteria->compare('ID_SUCURSAL',$this->ID_SUCURSAL);
		$criteria->compare('ID_CANALCAMARAS',$this->ID_CANALCAMARAS,true);
		$criteria->compare('FECHA_INCIDENTE',$this->FECHA_INCIDENTE,true);
		$criteria->compare('HORA_INCIDENTE',$this->HORA_INCIDENTE,true);
		$criteria->compare('ID_TIPO_INCIDENTE',$this->ID_TIPO_INCIDENTE);
		$criteria->compare('DESCRIPCION_INCIDENTE',$this->DESCRIPCION_INCIDENTE,true);
		$criteria->compare('IMAGEN',$this->IMAGEN,true);
		$criteria->compare('FECHA_HORA',$this->FECHA_HORA,true);
		$criteria->compare('ID_USUARIO',$this->ID_USUARIO);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Incidentes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
