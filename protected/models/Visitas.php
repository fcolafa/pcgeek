<?php

/**
 * This is the model class for table "visitas".
 *
 * The followings are the available columns in table 'visitas':
 * @property integer $ID_VISITA
 * @property string $TIPO_VISITA
 * @property string $NOMBRE_VISITA
 * @property string $DESCRIPCION
 *
 * The followings are the available model relations:
 * @property DetalleInforme[] $informesMantenciones
 * @property TipoVisitas $iDTIPOVISITA
 */
class Visitas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'visitas';
	}

    
    public function getTipoDescripcion()
    {
        return $this->TIPO_VISITA.'-'.$this->NOMBRE_VISITA;
    }
    
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TIPO_VISITA, NOMBRE_VISITA', 'required'),
			array('NOMBRE_VISITA', 'length', 'max'=>64),
			array('DESCRIPCION', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_VISITA, TIPO_VISITA, NOMBRE_VISITA, DESCRIPCION', 'safe', 'on'=>'search'),
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
			'informesMantenciones' => array(self::HAS_MANY, 'DetalleInforme', 'ID_VISITA'),
			'iDTIPOVISITA' => array(self::BELONGS_TO, 'TipoVisitas', 'TIPO_VISITA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_VISITA' => 'Id Visita',
			'TIPO_VISITA' => 'Tipo de Visita',
			'NOMBRE_VISITA' => 'Nombre Visita',
			'DESCRIPCION' => 'Descripción',
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
		$criteria->compare('TIPO_VISITA',$this->TIPO_VISITA);
		$criteria->compare('NOMBRE_VISITA',$this->NOMBRE_VISITA,true);
		$criteria->compare('DESCRIPCION',$this->DESCRIPCION,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
    			'defaultOrder'=>'TIPO_VISITA ASC',
    			//'defaultOrder'=>array('TIPO_VISITA'=>CSort::SORT_ASC),
    		),
			'pagination' => array(
            'pageSize' => 30,
        ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Visitas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
