<?php

/**
 * This is the model class for table "detalle_informe".
 *
 * The followings are the available columns in table 'detalle_informe':
 * @property integer $ID_INFORME_DET
 * @property integer $ID_VISITA
 * @property integer $ID_INFORME
 * @property integer $ID_ESTADO
 * @property integer $VALOR
 *
 * @property integer $TIPO_VISITA
 * @property integer $NOMBRE_VISITA
 *
 * The followings are the available model relations:
 * @property EstadoInforme $iDESTADO
 * @property Visitas $iDVISITA
 * @property Informes $iDINFORME
 */
class DetalleInforme extends CActiveRecord
{

	public $TIPO_VISITA;
	public $NOMBRE_VISITA;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detalle_informe';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_INFORME, ID_VISITA', 'required'),
			array('ID_INFORME_DET, ID_VISITA, ID_INFORME, ID_ESTADO, VALOR', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_INFORME_DET, ID_VISITA, ID_INFORME, ID_ESTADO, VALOR', 'safe', 'on'=>'search'),
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
			'iDESTADO' => array(self::BELONGS_TO, 'EstadoInforme', 'ID_ESTADO'),
			'iDVISITA' => array(self::BELONGS_TO, 'Visitas', 'ID_VISITA'),
			'iDINFORME' => array(self::BELONGS_TO, 'Informes', 'ID_INFORME'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_INFORME_DET' => 'Folio',
			'ID_VISITA' => 'Visita',
			'ID_INFORME' => 'Informe',
			'ID_ESTADO' => 'Estado',
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

		$criteria->compare('ID_INFORME_DET',$this->ID_INFORME_DET);
		$criteria->compare('ID_VISITA',$this->ID_VISITA);
		$criteria->compare('ID_INFORME',$this->ID_INFORME);
		$criteria->compare('ID_ESTADO',$this->ID_ESTADO);
		$criteria->compare('VALOR',$this->VALOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DetalleInforme the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
