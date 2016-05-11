<?php

/**
 * This is the model class for table "viewregistro".
 *
 * The followings are the available columns in table 'viewregistro':
 * @property integer $ID_INCIDENTE
 * @property string $CLIENTE
 * @property string $NOMBRE_SUCURSAL
 * @property integer $MES
 * @property integer $PERIODO
 * @property integer $TIPO_INCIDENTE
 * @property string $DESCRIPCION_INCIDENTE
 * @property string $IMAGEN
 */
class ViewRegistro extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'viewregistro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CLIENTE', 'required'),
			array('ID_INCIDENTE, MES, PERIODO, TIPO_INCIDENTE', 'numerical', 'integerOnly'=>true),
			array('CLIENTE, IMAGEN', 'length', 'max'=>64),
			array('NOMBRE_SUCURSAL, DESCRIPCION_INCIDENTE', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_INCIDENTE, CLIENTE, NOMBRE_SUCURSAL, MES, PERIODO, TIPO_INCIDENTE, DESCRIPCION_INCIDENTE, IMAGEN', 'safe', 'on'=>'search'),
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
			'ID_INCIDENTE' => 'ID',
			'CLIENTE' => 'Cliente',
			'NOMBRE_SUCURSAL' => 'Sucursal',
			'MES' => 'Mes',
			'PERIODO' => 'Periodo',
			'TIPO_INCIDENTE' => 'Tipo Incidente',
			'DESCRIPCION_INCIDENTE' => 'Descripción',
			'IMAGEN' => 'Imagen',
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
		$sort=new CSort;

		$criteria->compare('ID_INCIDENTE',$this->ID_INCIDENTE);
		$criteria->compare('CLIENTE',$this->CLIENTE,true);
		$criteria->compare('NOMBRE_SUCURSAL',$this->NOMBRE_SUCURSAL,true);
		$criteria->compare('MES',$this->MES);
		$criteria->compare('PERIODO',$this->PERIODO);
		$criteria->compare('TIPO_INCIDENTE',$this->TIPO_INCIDENTE,true);
		$criteria->compare('DESCRIPCION_INCIDENTE',$this->DESCRIPCION_INCIDENTE,true);
		$criteria->compare('IMAGEN',$this->IMAGEN,true);

		//busqueda de totalidad de usuarios y asigna una variable de sesion
		$_SESSION['datos_filtrados']=new CActiveDataProvider($this,array(
				'criteria'=>$criteria,
				'sort'=>$sort,
				'pagination'=>false,
		));

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'keyAttribute'=>'ID_INCIDENTE',
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Viewregistro the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
