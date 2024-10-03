<?php

/**
 * This is the model class for table "ca_relacion_unidad".
 *
 * The followings are the available columns in table 'ca_relacion_unidad':
 * @property integer $id
 * @property integer $id_rectora
 * @property integer $id_auditada
 * @property string $sigla_rectora
 * @property string $sigla_auditada
 */
class CaRelacionUnidad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaRelacionUnidad the static model class
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
		return 'ca_relacion_unidad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_rectora, id_auditada', 'required'),
			array('id_rectora, id_auditada', 'numerical', 'integerOnly'=>true),
			array('sigla_rectora, sigla_auditada', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_rectora, id_auditada, sigla_rectora, sigla_auditada', 'safe', 'on'=>'search'),
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
			'id_rectora' => 'Id Rectora',
			'id_auditada' => 'Id Auditada',
			'sigla_rectora' => 'Sigla Rectora',
			'sigla_auditada' => 'Sigla Auditada',
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
		$criteria->compare('id_rectora',$this->id_rectora);
		$criteria->compare('id_auditada',$this->id_auditada);
		$criteria->compare('sigla_rectora',$this->sigla_rectora,true);
		$criteria->compare('sigla_auditada',$this->sigla_auditada,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}