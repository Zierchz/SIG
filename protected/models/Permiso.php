<?php

/**
 * This is the model class for table "permiso".
 *
 * The followings are the available columns in table 'permiso':
 * @property integer $id
 * @property string $permiso
 * @property string $descripcion
 * @property string $url
 * @property string $icono
 * @property string $menu
 * @property string $modelo
 * @property string $padre
 * @property integer $visible
 *
 * The followings are the available model relations:
 * @property RolPermiso[] $rolPermisos
 */
class Permiso extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Permiso the static model class
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
		return 'permiso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('permiso, url, menu, modelo, padre, visible', 'required','message'=>$this->errorStyle("required")),
			array('visible', 'numerical', 'integerOnly'=>true,'message'=>$this->errorStyle("numeric")),
			array('permiso, descripcion', 'length', 'max'=>250,'message'=>$this->errorStyle("lenght","250")),
			array('url', 'length', 'max'=>100,'message'=>$this->errorStyle("lenght","100")),
			array('icono', 'length', 'max'=>150,'message'=>$this->errorStyle("lenght","150")),
			array('menu, modelo, padre', 'length', 'max'=>50,'message'=>$this->errorStyle("lenght","50")),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, permiso, descripcion, url, icono, menu, modelo, padre, visible', 'safe', 'on'=>'search'),
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
			'rolPermisos' => array(self::HAS_MANY, 'RolPermiso', 'permiso'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'permiso' => 'Permiso',
			'descripcion' => 'Descripcion',
			'url' => 'Url',
			'icono' => 'Icono',
			'menu' => 'Menu',
			'modelo' => 'Modelo',
			'padre' => 'Padre',
			'visible' => 'Visible',
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
		$criteria->compare('permiso',$this->permiso,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('icono',$this->icono,true);
		$criteria->compare('menu',$this->menu,true);
		$criteria->compare('modelo',$this->modelo,true);
		$criteria->compare('padre',$this->padre,true);
		$criteria->compare('visible',$this->visible);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}