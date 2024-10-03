<?php

/**
 * This is the model class for table "trabajador".
 *
 * The followings are the available columns in table 'trabajador':
 * @property string $ci
 * @property string $correo
 * @property string $nombre_apellidos
 * @property string $genero
 * @property string $direccion
 * @property string $telef_casa
 * @property string $telef_trabajo
 * @property string $movil
 * @property integer $departamento
 * @property string $especialidad
 * @property string $escolaridad
 * @property string $grado
 * @property integer $cargo
 * @property string $foto
 * @property integer $edad
 * @property integer $fecha_nac
 * @property integer $titulo_trab
 * @property string $codigo
 *
 * The followings are the available model relations:
 * @property Cargo $cargo0
 * @property Titulo $tituloTrab
 */
class Trabajador extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Trabajador the static model class
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
		return 'trabajador';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ci, nombre_apellidos, genero, departamento, especialidad, escolaridad, grado, cargo, titulo_trab, codigo', 'required'),
			array('departamento, cargo, edad, fecha_nac, titulo_trab', 'numerical', 'integerOnly'=>true),
			array('ci, codigo', 'length', 'max'=>11),
			array('correo', 'length', 'max'=>100),
			array('nombre_apellidos, direccion', 'length', 'max'=>250),
			array('genero, telef_casa, telef_trabajo, movil, especialidad, escolaridad, grado, foto', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ci, correo, nombre_apellidos, genero, direccion, telef_casa, telef_trabajo, movil, departamento, especialidad, escolaridad, grado, cargo, foto, edad, fecha_nac, titulo_trab, codigo', 'safe', 'on'=>'search'),
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
			'cargo0' => array(self::BELONGS_TO, 'Cargo', 'cargo'),
			'tituloTrab' => array(self::BELONGS_TO, 'Titulo', 'titulo_trab'),
			'area0' => array(self::BELONGS_TO, 'Area', 'departamento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ci' => 'Ci',
			'correo' => 'Correo',
			'nombre_apellidos' => 'Nombre Apellidos',
			'genero' => 'Genero',
			'direccion' => 'Direccion',
			'telef_casa' => 'Telef Casa',
			'telef_trabajo' => 'Telef Trabajo',
			'movil' => 'Movil',
			'departamento' => 'Departamento',
			'especialidad' => 'Especialidad',
			'escolaridad' => 'Escolaridad',
			'grado' => 'Grado',
			'cargo' => 'Cargo',
			'foto' => 'Foto',
			'edad' => 'Edad',
			'fecha_nac' => 'Fecha Nac',
			'titulo_trab' => 'Titulo Trab',
			'codigo' => 'Codigo',
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

		$criteria->compare('ci',$this->ci,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('nombre_apellidos',$this->nombre_apellidos,true);
		$criteria->compare('genero',$this->genero,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telef_casa',$this->telef_casa,true);
		$criteria->compare('telef_trabajo',$this->telef_trabajo,true);
		$criteria->compare('movil',$this->movil,true);
		$criteria->compare('departamento',$this->departamento);
		$criteria->compare('especialidad',$this->especialidad,true);
		$criteria->compare('escolaridad',$this->escolaridad,true);
		$criteria->compare('grado',$this->grado,true);
		$criteria->compare('cargo',$this->cargo);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('edad',$this->edad);
		$criteria->compare('fecha_nac',$this->fecha_nac);
		$criteria->compare('titulo_trab',$this->titulo_trab);
		$criteria->compare('codigo',$this->codigo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}