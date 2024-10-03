<?php

/**
 * This is the model class for table "unidad_organizativa".
 *
 * The followings are the available columns in table 'unidad_organizativa':
 * @property integer $id
 * @property string $uo_nombre
 * @property string $uo_siglas
 * @property string $uo_categoria
 * @property integer $sap_code
 * @property string $direccion
 * @property string $provincia
 * @property string $tipo_area
 */
class UnidadOrganizativaBdut extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UnidadOrganizativaBdut the static model class
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
		return 'unidad_organizativa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uo_nombre, uo_siglas, uo_categoria, sap_code, provincia, tipo_area', 'required'),
			array('sap_code', 'numerical', 'integerOnly'=>true),
			array('uo_nombre', 'length', 'max'=>150),
			array('uo_siglas', 'length', 'max'=>10),
			array('uo_categoria, tipo_area', 'length', 'max'=>50),
			array('direccion, provincia', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uo_nombre, uo_siglas, uo_categoria, sap_code, direccion, provincia, tipo_area', 'safe', 'on'=>'search'),
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
			'uo_nombre' => 'Uo Nombre',
			'uo_siglas' => 'Uo Siglas',
			'uo_categoria' => 'Uo Categoria',
			'sap_code' => 'Sap Code',
			'direccion' => 'Direccion',
			'provincia' => 'Provincia',
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
		$criteria->compare('uo_nombre',$this->uo_nombre,true);
		$criteria->compare('uo_siglas',$this->uo_siglas,true);
		$criteria->compare('uo_categoria',$this->uo_categoria,true);
		$criteria->compare('sap_code',$this->sap_code);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('provincia',$this->provincia,true);
		$criteria->compare('tipo_area',$this->tipo_area,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}