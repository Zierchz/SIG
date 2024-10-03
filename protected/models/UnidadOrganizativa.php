<?php

/**
 * This is the model class for table "unidad_organizativa".
 *
 * The followings are the available columns in table 'unidad_organizativa':
 * @property integer $id
 * @property string $nombre
 * @property string $siglas
  * @property string $old
 *
 * The followings are the available model relations:
 * @property Usuario[] $usuarios
 */
class UnidadOrganizativa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UnidadOrganizativa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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
			array('nombre, siglas', 'required'),
			array('nombre', 'length', 'max'=>250),
			array('siglas', 'length', 'max'=>10),
			array('old', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, siglas, old', 'safe', 'on'=>'search'),
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
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'id_uo'),
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
			'old' => 'Siglas Antiguas',
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
		$criteria->compare('old',$this->old,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}