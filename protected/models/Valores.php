<?php

/**
 * This is the model class for table "valores".
 *
 * The followings are the available columns in table 'valores':
 * @property integer $ID_VALOR
 * @property integer $ID_UBICACION
 * @property integer $ID_VISITA
 * @property integer $VALOR
 *
 * The followings are the available model relations:
 * @property Ubicacion $iDUBICACION
 * @property Visitas $iDVISITA
 */
class Valores extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'valores';
	}
    
       
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_UBICACION, ID_VISITA', 'required'),
      array('ID_UBICACION, ID_VISITA', 'compruebaExistencia', 'on'=>'create'),
      //array('ID_VISITA', 'compruebaExistencia'),
			array('ID_UBICACION, ID_VISITA, VALOR', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_VALOR, ID_UBICACION, ID_VISITA, VALOR', 'safe', 'on'=>'search'),
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
			'iDUBICACION' => array(self::BELONGS_TO, 'Ubicaciones', 'ID_UBICACION'),
			'iDVISITA' => array(self::BELONGS_TO, 'Visitas', 'ID_VISITA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_VALOR' => 'Id Valor',
			'ID_UBICACION' => 'Id Ubicacion',
			'ID_VISITA' => 'Id Visita',
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

		$criteria->compare('ID_VALOR',$this->ID_VALOR);
		$criteria->compare('ID_UBICACION',$this->ID_UBICACION);
		$criteria->compare('ID_VISITA',$this->ID_VISITA);
		$criteria->compare('VALOR',$this->VALOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


  public function compruebaExistencia($attribute,$params){      
		$temp = Valores::model()->findByAttributes(array('ID_UBICACION'=>$this->ID_UBICACION,'ID_VISITA'=>$this->ID_VISITA));
		if ($temp!=null)
			$this->addError('ID_UBICACION','El valor ya existe en el sistema');
  }


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Valores the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
