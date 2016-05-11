<?php

/**
 * This is the model class for table "tipo_usuario".
 *
 * The followings are the available columns in table 'tipo_usuario':
 * @property string $COD_TIPO_USUARIO
 * @property string $TIPO_USUARIO
 * @property integer $C
 * @property integer $R
 * @property integer $U
 * @property integer $D
 */
class TipoUsuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipo_usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('COD_TIPO_USUARIO, TIPO_USUARIO, C, R, U, D', 'required'),
			array('C, R, U, D', 'numerical', 'integerOnly'=>true),
			array('COD_TIPO_USUARIO', 'length', 'max'=>3),
			array('TIPO_USUARIO', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('COD_TIPO_USUARIO, TIPO_USUARIO, C, R, U, D', 'safe', 'on'=>'search'),
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
			'COD_TIPO_USUARIO' => 'Cod Tipo Usuario',
			'TIPO_USUARIO' => 'Nombre Tipo Usuario',
			'C' => 'C',
			'R' => 'R',
			'U' => 'U',
			'D' => 'D',
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

		$criteria->compare('COD_TIPO_USUARIO',$this->COD_TIPO_USUARIO,true);
		$criteria->compare('TIPO_USUARIO',$this->TIPO_USUARIO,true);
		$criteria->compare('C',$this->C);
		$criteria->compare('R',$this->R);
		$criteria->compare('U',$this->U);
		$criteria->compare('D',$this->D);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
            'pageSize' => 30,
        ),
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TipoUsuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
