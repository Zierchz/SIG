<?php

/**
 * This is the model class for table "cargo".
 *
 * The followings are the available columns in table 'cargo':
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property integer $segmento
 * @property string $estado
 *
 * The followings are the available model relations:
 * @property Trabajador[] $trabajadors
 */
class Cargo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cargo the static model class
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
		return 'cargo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, segmento, estado', 'required'),
			array('segmento', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>45),
			array('descripcion', 'length', 'max'=>250),
			array('estado', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, descripcion, segmento, estado', 'safe', 'on'=>'search'),
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
			'trabajadors' => array(self::HAS_MANY, 'Trabajador', 'cargo'),
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
			'descripcion' => 'Descripcion',
			'segmento' => 'Segmento',
			'estado' => 'Estado',
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
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('segmento',$this->segmento);
		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}