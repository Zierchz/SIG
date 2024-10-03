<?php

/**
 * This is the model class for table "ca_criterios_evaluaciones".
 *
 * The followings are the available columns in table 'ca_criterios_evaluaciones':
 * @property string $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $usuario
 * @property integer $observaciones
 * @property integer $uo
 */
class CaCriteriosEvaluaciones extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaCriteriosEvaluaciones the static model class
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
		return 'ca_criterios_evaluaciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, observaciones', 'required'),
			array('observaciones, uo', 'numerical', 'integerOnly'=>true),
			array('nombre, descripcion, usuario, observaciones', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, descripcion, usuario, observaciones, uo', 'safe', 'on'=>'search'),
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
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
			'usuario' => 'Usuario que lo creó',
			'observaciones' => 'Nota Maxima',
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
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		if($uni==7){
			$criteria->compare('uo',$this->uo);}
			else{
				$criteria->compare('uo',$uni);}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}