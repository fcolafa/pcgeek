<?php

/**
 * This is the model class for table "equipos".
 *
 * The followings are the available columns in table 'equipos':
 * @property integer $ID_EQUIPOS
 * @property string $RUT_PROVEEDOR
 * @property string $CODIGO_INVENTARIO
 * @property string $MODELO_EQUIPO
 * @property string $FECHA_COMPRA
 * @property string $FECHA_BAJA
 * @property integer $ESTADO_EQUIPO
 * @property string $USUARIO_EQUIPO
 * @property string $NUMERO_FACTURA
 * @property string $OBSV_EQUIPO
 * @property integer $ID_TIPOEQUIPO
 *
 * The followings are the available model relations:
 * @property TipoEquipo $iDTIPOEQUIPO
 * @property Proveedores $rUTPROVEEDOR
 */
class Equipos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $te;
	public function tableName()
	{
		return 'equipos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_TIPOEQUIPO', 'required'),
			array('ESTADO_EQUIPO, ID_TIPOEQUIPO,ID_SUCURSAL', 'numerical', 'integerOnly'=>true),
			array('RUT_PROVEEDOR, NUMERO_FACTURA', 'length', 'max'=>15),
			array('CODIGO_INVENTARIO', 'length', 'max'=>20),
			array('MODELO_EQUIPO,UBICACION_EQUIPO', 'length', 'max'=>65),
			array('USUARIO_EQUIPO', 'length', 'max'=>45),
			array('FECHA_COMPRA, FECHA_BAJA, OBSV_EQUIPO', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_EQUIPOS, RUT_PROVEEDOR, CODIGO_INVENTARIO, MODELO_EQUIPO, FECHA_COMPRA, FECHA_BAJA, ESTADO_EQUIPO, USUARIO_EQUIPO, NUMERO_FACTURA, OBSV_EQUIPO, ID_TIPOEQUIPO, ID_SUCURSAL,te', 'safe', 'on'=>'search'),
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
			'iDTIPOEQUIPO' => array(self::BELONGS_TO, 'TipoEquipo', 'ID_TIPOEQUIPO'),
			'rUTPROVEEDOR' => array(self::BELONGS_TO, 'Proveedores', 'RUT_PROVEEDOR'),
			'sucursales'  => array(self::BELONGS_TO, 'sucursales','ID_SUCURSAL')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_EQUIPOS' => 'Id Equipos',
			'RUT_PROVEEDOR' => 'Proveedor',
			'CODIGO_INVENTARIO' => 'Codigo',
			'MODELO_EQUIPO' => 'Modelo',
			'FECHA_COMPRA' => 'Fecha Compra',
			'FECHA_BAJA' => 'Fecha Baja',
			'ESTADO_EQUIPO' => 'Estado',
			'USUARIO_EQUIPO' => 'Usuario Equipo',
			'NUMERO_FACTURA' => 'Numero Factura',
			'OBSV_EQUIPO' => 'Obsv Equipo',
			'ID_TIPOEQUIPO' => 'Tipo Equipo',
			'ID_SUCURSAL' =>'sucursal',
			'UBICACION_EQUIPO'=>'Ubicacion Equipo'
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
		$criteria->with = array('iDTIPOEQUIPO');
		$criteria->compare('ID_EQUIPOS',$this->ID_EQUIPOS);
		$criteria->compare('RUT_PROVEEDOR',$this->RUT_PROVEEDOR,true);
		$criteria->compare('CODIGO_INVENTARIO',$this->CODIGO_INVENTARIO,true);
		$criteria->compare('MODELO_EQUIPO',$this->MODELO_EQUIPO,true);
		$criteria->compare('FECHA_COMPRA',$this->FECHA_COMPRA,true);
		$criteria->compare('FECHA_BAJA',$this->FECHA_BAJA,true);
		$criteria->compare('ESTADO_EQUIPO',$this->ESTADO_EQUIPO);
		$criteria->compare('USUARIO_EQUIPO',$this->USUARIO_EQUIPO,true);
		$criteria->compare('NUMERO_FACTURA',$this->NUMERO_FACTURA,true);
		$criteria->compare('OBSV_EQUIPO',$this->OBSV_EQUIPO,true);
		//$criteria->compare('ID_TIPOEQUIPO',$this->ID_TIPOEQUIPO);
		$criteria->compare('ID_SUCURSAL',$this->ID_SUCURSAL,true);
		$criteria->compare('UBICACION_EQUIPO',$this->UBICACION_EQUIPO);
		$criteria->compare('iDTIPOEQUIPO.NOMBRE_TIPOEQUIPO', $this->te, true );

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Equipos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
