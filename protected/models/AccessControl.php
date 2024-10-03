<?php

/**
 * This is the model class for table "access_control".
 *
 * The followings are the available columns in table 'access_control':
 * @property integer $id
 * @property string $ip
 * @property integer $fecha
 * @property string $username
 */
class AccessControl extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AccessControl the static model class
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
		return 'access_control';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ip, fecha, username', 'required','message'=>$this->errorStyle("required")),
			array('fecha', 'numerical', 'integerOnly'=>true,'message'=>$this->errorStyle("numeric")),
			array('ip', 'length', 'max'=>25,'message'=>$this->errorStyle("lenght","25")),
            array('username', 'length', 'max'=>50,'message'=>$this->errorStyle("lenght","50")),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ip, fecha, username', 'safe', 'on'=>'search'),
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
			'ip' => 'IP',
			'fecha' => 'Fecha',
			'username' => 'Usuario',
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
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('fecha',$this->fecha);
		$criteria->compare('username',$this->username);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}



}