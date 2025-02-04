<?php

/**
 * This is the model class for table "rol".
 *
 * The followings are the available columns in table 'rol':
 * @property integer $id
 * @property string $rol
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property Usuario[] $usuarios
 */
class Rol extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Rol the static model class
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
		return 'rol';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rol, descripcion', 'required','message'=>$this->errorStyle("required")),
			array('rol', 'length', 'max'=>100,'message'=>$this->errorStyle("lenght","100")),
			array('descripcion', 'length', 'max'=>255,'message'=>$this->errorStyle("lenght","255")),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, rol, descripcion', 'safe', 'on'=>'search'),
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
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'id_role'),
			'rolPermisos' => array(self::HAS_MANY, 'RolPermiso', 'rol'),
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
			'descripcion' => 'Descripcion',
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
		$criteria->compare('rol',$this->rol,true);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function insertAuthItem($name, $type){
        $sql = "insert into authitem (name, type) values (:name, :type)";
        $parameters = array(":name"=>$name, ':type' => $type);
        Yii::app()->db->createCommand($sql)->execute($parameters);
    }

    public function deleteAuthItem($name){
        $sql = "delete from authitem where name= (:name)";
        $parameters = array(":name"=>$name);
        Yii::app()->db->createCommand($sql)->execute($parameters);
    }
	
	public function obtRolPermiso($id_rol,$id_permiso){
		
		$sql = "select pp.id
				 from rol_permiso pp
				 where pp.rol=".$id_rol."
				 and pp.permiso=".$id_permiso;
				 
		$ing = Yii::app()->db->createCommand($sql)->queryAll();
		return $ing;
	}

	public function beforeDelete(){
		foreach($this->rolPermisos as $c)
	        $c->delete();

		return parent::beforeDelete();
    }

    public function getVisible($id){
		if($id==3 || $id==9) 
			return false;
		else
			return true;
	}
}