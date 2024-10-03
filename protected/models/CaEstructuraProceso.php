<?php

/**
 * This is the model class for table "ca_estructura_proceso".
 *
 * The followings are the available columns in table 'ca_estructura_proceso':
 * @property string $id
 * @property string $nombre
 * @property integer $id_uo
 *
 * The followings are the available model relations:
 * @property UnidadOrganizativa $idUo
 */
class CaEstructuraProceso extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaEstructuraProceso the static model class
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
		return 'ca_estructura_proceso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, id_uo', 'required'),
			array('id_uo', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, id_uo', 'safe', 'on'=>'search'),
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
			'idUo' => array(self::BELONGS_TO, 'UnidadOrganizativa', 'id_uo'),
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
			'id_uo' => 'Id Uo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($uni)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nombre',$this->nombre,true);
		if($uni==7){
		$criteria->compare('id_uo',$this->id_uo);}
		else{
			$criteria->compare('id_uo',$uni);}


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}