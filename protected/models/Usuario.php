<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $rol
 * @property integer $sap_code
 * @property string $foto
 * @property integer $id_uo
 * @property string $nombre
 * @property integer $bloqueado
 * 
 *
 * The followings are the available model relations:
 * @property Rol $rol0
 */
class Usuario extends Model
{
	public $old_password;
    public $new_password;
	public $repeat_password;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuario the static model class
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
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, rol, sap_code, id_uo, nombre, bloqueado', 'required','message'=>$this->errorStyle("required")),
			array('rol, sap_code, id_uo, bloqueado', 'numerical','integerOnly'=>true,'message'=>$this->errorStyle("numeric")),
			array('username, nombre', 'length', 'max'=>45,'message'=>$this->errorStyle("lenght","45")),
			array('password', 'length', 'max'=>75,'message'=>$this->errorStyle("lenght","75")),
			array('foto', 'length', 'max'=>100,'message'=>$this->errorStyle("lenght","75")),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, rol, sap_code, foto, id_uo, nombre, bloqueado', 'safe', 'on'=>'search'),
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
			'rol0' => array(self::BELONGS_TO, 'Rol', 'rol'),
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
			'username' => 'Usuario',
			'password' => 'Clave',
			'rol' => 'Rol',
			'sap_code' => 'Código SAP',
			'foto' => 'Foto',
			'id_uo' => 'Unidad Organizativa',
			
			'nombre' => 'Nombre',
			'old_password' => 'Contraseña Actual',
			'new_password' => 'Nueva Contraseña',
			'repeat_password' => 'Repetir Contraseña',
			'bloqueado' => 'Bloqueado',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		//$criteria->compare('rol',$this->rol);
		$criteria->with[]='rol0';
		$criteria->addSearchCondition('rol0.nombre',$this->rol,true);
		$criteria->compare('sap_code',$this->sap_code,true);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('nombre',$this->nombre,true);
		// $criteria->with[]='idUo';
		// $criteria->addSearchCondition('idUo.nombre',$this->id_uo,true);
		// $criteria->with[]='idArea';
		// $criteria->addSearchCondition('idArea.nombre',$this->id_area,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function validatePassword($password)
    {
        return $password === $this->password;
    }

	// public function validatePassword($password)
    // {
    //     //return $password === $this->password;

    //     if (strlen($this->password) !== 60 OR strlen($password = crypt($password, $this->password)) !== 60)
	// 	{
	// 		return FALSE;
	// 	}

	// 	$compare = 0;
	// 	for ($i = 0; $i < 60; $i++)
	// 	{
	// 		$compare |= (ord($password[$i]) ^ ord($this->password[$i]));
	// 	}
	// 	return ($compare === 0);
    // }

    public function insertAuthAssign($user_id, $rol)
    {
        /*$sql = "INSERT INTO authassignment(itemname, userid) VALUES(:rol,:userid)";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":userid",$user_id,PDO::PARAM_STR);
        $command->bindParam(":rol",$rol,PDO::PARAM_STR);
        $command->execute();*/
    }
}