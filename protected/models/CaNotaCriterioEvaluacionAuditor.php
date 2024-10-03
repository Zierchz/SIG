<?php

/**
 * This is the model class for table "ca_nota_criterio_evaluacion_auditor".
 *
 * The followings are the available columns in table 'ca_nota_criterio_evaluacion_auditor':
 * @property string $id
 * @property string $nombre_criterio
 * @property integer $id_evaluacion
 * @property integer $nota
 * @property string $fecha
 * @property string $observaciones
 * @property integer $id_usuario_evaluador
 *
 * The followings are the available model relations:
 * @property CaEvaluacionAuditor $idEvaluacion
 */
class CaNotaCriterioEvaluacionAuditor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaNotaCriterioEvaluacionAuditor the static model class
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
		return 'ca_nota_criterio_evaluacion_auditor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_criterio, id_evaluacion, nota, fecha, id_usuario_evaluador', 'required'),
			array('id_evaluacion, nota, id_usuario_evaluador', 'numerical', 'integerOnly'=>true),
			array('nombre_criterio, observaciones', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre_criterio, id_evaluacion, nota, fecha, observaciones, id_usuario_evaluador', 'safe', 'on'=>'search'),
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
			'idEvaluacion' => array(self::BELONGS_TO, 'CaEvaluacionAuditor', 'id_evaluacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre_criterio' => 'Nombre Criterio',
			'id_evaluacion' => 'Id Evaluacion',
			'nota' => 'Nota',
			'fecha' => 'Fecha',
			'observaciones' => 'Observaciones',
			'id_usuario_evaluador' => 'Id Usuario Evaluador',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nombre_criterio',$this->nombre_criterio,true);
		$criteria->compare('id_evaluacion',$this->id_evaluacion);
		$criteria->compare('nota',$this->nota);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('id_usuario_evaluador',$this->id_usuario_evaluador);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}