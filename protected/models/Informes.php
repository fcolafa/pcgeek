<?php

/**
 * This is the model class for table "informes".
 *
 * The followings are the available columns in table 'informes':
 * @property integer $ID_INFORME
 * @property integer $ID_TECNICO
 * @property integer $ID_CLIENTE
 * @property integer $ID_SUCURSAL
 * @property string $FECHA_INGRESO
 * @property string $HORA_INGRESO
 * @property string $HORA_SALIDA
 * @property string $OBSERVACIONES
 * @property string $IMAGEN
 * @property string $TIMESTAMP
 *
 * The followings are the available model relations:
 * @property Clientes $iDCLIENTE
 * @property Sucursales $sucursales
 * @property Tecnicos $iDTECNICO
 * @property DetalleInforme[] $detalleInforme
 */
class Informes extends CActiveRecord
{

	public $tecnico;
	public $cliente;
	public $sucursal;
	public $detalle;
    public $ubicacion;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'informes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_TECNICO, ID_CLIENTE, FECHA_INGRESO', 'required'),
			array('ID_TECNICO', 'existe_detalle'),
			array('ID_TECNICO, ID_CLIENTE, ID_SUCURSAL, ID_UBICACION', 'numerical', 'integerOnly'=>true),
			array('HORA_INGRESO, HORA_SALIDA, OBSERVACIONES, IMAGEN', 'safe'),
			array('IMAGEN', 'file','types'=>'JPEG, JPG, jpeg, jpg, png, pdf', 'allowEmpty'=>true, 'on'=>'update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_INFORME, ID_TECNICO, tecnico, ID_CLIENTE, cliente, ID_SUCURSAL, sucursal,ID_UBICACION, ubicacion, FECHA_INGRESO, HORA_INGRESO, HORA_SALIDA, OBSERVACIONES, IMAGEN, TIMESTAMP', 'safe', 'on'=>'search'),
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
			'iDCLIENTE' => array(self::BELONGS_TO, 'Clientes', 'ID_CLIENTE'),
			'sucursales' => array(self::BELONGS_TO, 'Sucursales', 'ID_SUCURSAL'),
			'iDTECNICO' => array(self::BELONGS_TO, 'Tecnicos', 'ID_TECNICO'),
      'iDUBICACION' => array(self::BELONGS_TO, 'Ubicaciones', 'ID_UBICACION'),
			'detalleInforme' => array(self::HAS_MANY, 'DetalleInforme', 'ID_INFORME'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_INFORME' => 'Informe',
			'ID_TECNICO' => 'Técnico',
			'ID_CLIENTE' => 'Cliente',
			'ID_SUCURSAL' => 'Sucursal',
            'ID_UBICACION' => 'Ubicacion',
			'FECHA_INGRESO' => 'Fecha Ingreso',
			'HORA_INGRESO' => 'Hora Ingreso',
			'HORA_SALIDA' => 'Hora Salida',
			'OBSERVACIONES' => 'Observaciones',
			'IMAGEN' => 'Imagen',
			'TIMESTAMP' => 'Fecha Creación',
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
		$criteria->compare('ID_TECNICO',$this->ID_TECNICO);
		$criteria->compare('ID_CLIENTE',$this->ID_CLIENTE);
		$criteria->compare('ID_SUCURSAL',$this->ID_SUCURSAL);
        $criteria->compare('ID_UBICACION',$this->ID_UBICACION);
		$criteria->compare('FECHA_INGRESO',$this->FECHA_INGRESO,true);
		$criteria->compare('HORA_INGRESO',$this->HORA_INGRESO,true);
		$criteria->compare('HORA_SALIDA',$this->HORA_SALIDA,true);
		$criteria->compare('OBSERVACIONES',$this->OBSERVACIONES,true);
		$criteria->compare('IMAGEN',$this->IMAGEN,true);
		$criteria->compare('TIMESTAMP',$this->TIMESTAMP,true);

		if (Yii::app()->user->T1()){

			$table = Usuarios::model()->find('NOMBRE_USUARIO="'.Yii::app()->user->name.'"');
				if ($table->ID_TECNICO == null || $table->ID_TECNICO == ''){					
					$tecnico = 0;
				} else{
					$tecnico = $table->ID_TECNICO;
				}
			$criteria->compare ('ID_TECNICO', $tecnico, true, "AND");

		}

		//$criteria->with = array('iDTECNICO');
		//$criteria->compare('APELLIDOS_TECNICO',$this->iDTECNICO->APELLIDOS_TECNICO);
		//$criteria->compare('NOMBRE_CLIENTE',$this->iDCLIENTE->NOMBRE_CLIENTE);
		//$criteria->compare('NOMBRE_SUCURSAL',$this->sucursales->NOMBRE_SUCURSAL);

		return new CActiveDataProvider($this, array(
			'keyAttribute'=>'ID_INFORME',
			'criteria'=>$criteria,			
			'sort'=>array(
    			'defaultOrder'=>'ID_INFORME DESC',
    			//'defaultOrder'=>array('TIPO_VISITA'=>CSort::SORT_ASC),
    		),
		));
	}

	public function existe_detalle($attribute, $params)
	{
	  	//Si el usuario no ingresó visitas mostrar el error
	  	if ($this->detalle != "tiene_detalle")
	  	{
	        $this->addError($attribute, "Debe ingresar motivos de visita");
	  	}
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Informes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
