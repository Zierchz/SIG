<?php

/**
 * This is the model class for table "rol_permiso".
 *
 * The followings are the available columns in table 'rol_permiso':
 * @property integer $id
 * @property integer $rol
 * @property integer $permiso
 *
 * The followings are the available model relations:
 * @property Permiso $permiso0
 * @property Rol $rol0
 */
class RolPermiso extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RolPermiso the static model class
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
		return 'rol_permiso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rol, permiso', 'required','message'=>$this->errorStyle("required")),
			array('rol, permiso', 'numerical', 'integerOnly'=>true,'message'=>$this->errorStyle("numeric")),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, rol, permiso', 'safe', 'on'=>'search'),
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
			'permiso0' => array(self::BELONGS_TO, 'Permiso', 'permiso'),
			'rol0' => array(self::BELONGS_TO, 'Rol', 'rol'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'rol' => 'Rol',
			'permiso' => 'Permiso',
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
		$criteria->compare('rol',$this->rol);
		$criteria->compare('permiso',$this->permiso);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}