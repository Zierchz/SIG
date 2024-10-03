<?php

/**
 * This is the model class for table "area".
 *
 * The followings are the available columns in table 'area':
 * @property integer $id
 * @property string $nombre
 * @property string $siglas
 * @property integer $padre
 * @property integer $id_empresa
 * @property string $direccion
 * @property string $centro_costo
 * @property integer $id_uorg
 * @property integer $sap_code
 * @property string $tipo_area
 */
class Area extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Area the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return CDbConnection database connection
	 */
	public function getDbConnection()
	{
		return Yii::app()->db_bdut;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'area';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, siglas, id_empresa, centro_costo, id_uorg, sap_code, tipo_area', 'required'),
			array('padre, id_empresa, id_uorg, sap_code', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>250),
			array('siglas', 'length', 'max'=>10),
			array('direccion', 'length', 'max'=>150),
			array('centro_costo, tipo_area', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, siglas, padre, id_empresa, direccion, centro_costo, id_uorg, sap_code, tipo_area', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'nombre' => 'Nombre',
			'siglas' => 'Siglas',
			'padre' => 'Padre',
			'id_empresa' => 'Id Empresa',
			'direccion' => 'Direccion',
			'centro_costo' => 'Centro Costo',
			'id_uorg' => 'Id Uorg',
			'sap_code' => 'Sap Code',
			'tipo_area' => 'Tipo Area',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('siglas',$this->siglas,true);
		$criteria->compare('padre',$this->padre);
		$criteria->compare('id_empresa',$this->id_empresa);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('centro_costo',$this->centro_costo,true);
		$criteria->compare('id_uorg',$this->id_uorg);
		$criteria->compare('sap_code',$this->sap_code);
		$criteria->compare('tipo_area',$this->tipo_area,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}