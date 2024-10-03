<?php

/**
 * This is the model class for table "ca_proceso".
 *
 * The followings are the available columns in table 'ca_proceso':
 * @property integer $id
 * @property string $nombre
 * @property string $fecha_programada
 * @property string $fecha_efectuada
 * @property string $responsable
 * @property integer $revision
 * @property integer $uo
 *
 * The followings are the available model relations:
 * @property CaRevisionDireccion[] $caRevisionDireccions
 */
class CaProceso extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaProceso the static model class
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
		return 'ca_proceso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, fecha_programada, fecha_efectuada, responsable, uo', 'required','message'=>$this->errorStyle("required")),
			array('nombre, responsable, uo', 'length', 'max'=>255,'message'=>$this->errorStyle("numeric")),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, fecha_programada, fecha_efectuada, responsable, revision, uo', 'safe', 'on'=>'search'),
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
			'caRevisionDireccions' => array(self::HAS_MANY, 'CaRevisionDireccion', 'proceso'),
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
			'fecha_programada' => 'Fecha Programada',
			'fecha_efectuada' => 'Fecha de Realización',
			'responsable' => 'Responsable',
			'revision' => 'Revisión',
			'uo' => 'Unidad'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	
	public function search1($rev)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('revision',$rev);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('fecha_programada',$this->fecha_programada,true);
		$criteria->compare('fecha_efectuada',$this->fecha_efectuada,true);
		$criteria->compare('responsable',$this->responsable,true);
		$criteria->compare('uo',$this->uo);
		

		


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}