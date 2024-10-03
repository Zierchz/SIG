<?php

/**
 * This is the model class for table "ca_preguntas".
 *
 * The followings are the available columns in table 'ca_preguntas':
 * @property integer $id
 * @property string $pregunta
 * @property string $referencia
 * @property string $conformidad
 * @property string $observaciones
 * @property integer $lista_id
 */
class CaPreguntas extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaPreguntas the static model class
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
		return 'ca_preguntas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pregunta, referencia, lista_id', 'required','message'=>$this->errorStyle("required")),
			array('lista_id', 'numerical', 'integerOnly'=>true,'message'=>$this->errorStyle("numeric")),
			array('pregunta, referencia, observaciones, conformidad', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, pregunta, referencia, conformidad, observaciones, lista_id', 'safe', 'on'=>'search'),
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
			'pregunta' => 'Pregunta',
			'referencia' => 'Referencia',
			'conformidad' => 'Conformidad',
			'observaciones' => 'Observaciones',
			'lista_id' => 'Lista',
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
		$criteria->compare('pregunta',$this->pregunta,true);
		$criteria->compare('referencia',$this->referencia,true);
		$criteria->compare('conformidad',$this->conformidad);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('lista_id',$this->lista_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function search1($lista_id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('pregunta',$this->pregunta,true);
		$criteria->compare('referencia',$this->referencia,true);
		$criteria->compare('conformidad',$this->conformidad);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('lista_id',$lista_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}