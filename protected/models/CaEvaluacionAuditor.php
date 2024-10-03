<?php

/**
 * This is the model class for table "ca_evaluacion_auditor".
 *
 * The followings are the available columns in table 'ca_evaluacion_auditor':
 * @property integer $id
 * @property integer $id_plan_ev
 * @property string $fecha_evaluacion
 * @property integer $evaluacion_final
 * @property string $observaciones
 * @property integer $aceptado
 * @property integer $conforme
 * @property integer $auditor
 * @property string $area
 * @property string $nombre_auditor
 * @property string $auditoria_realizada

 
 */
class CaEvaluacionAuditor extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaEvaluacionAuditor the static model class
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
		return 'ca_evaluacion_auditor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_plan_ev, fecha_evaluacion, auditor, auditoria_realizada', 'required','message'=>$this->errorStyle("required")),
			array('id_plan_ev, evaluacion_final, aceptado, conforme, auditor', 'numerical', 'integerOnly'=>true,'message'=>$this->errorStyle("numeric")),
			array('observaciones, auditoria_realizada', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_plan_ev, fecha_evaluacion, evaluacion_final, observaciones, aceptado, conforme, nombre_auditor, auditor, area', 'safe', 'on'=>'search'),
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
			'audito' => array(self::BELONGS_TO, 'CaAuditor', 'auditor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_plan_ev' => 'Id Plan Ev',
			'fecha_evaluacion' => 'Fecha de Evaluación',
			'evaluacion_final' => 'Evaluación Final',
			'observaciones' => 'Observaciones',
			'aceptado' => 'Aceptado',
			'conforme' => 'Conforme',
			'auditor' => 'Auditor',
			'area' => 'Área',
			'nombre_auditor' => 'Nombre del Auditor',
			'auditoria_realizada' => 'Auditoría realizada'
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
		$criteria->compare('id_plan_ev',$this->id_plan_ev);
		$criteria->compare('fecha_evaluacion',$this->fecha_evaluacion,true);
		$criteria->compare('evaluacion_final',$this->evaluacion_final);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('aceptado',$this->aceptado);
		$criteria->compare('conforme',$this->conforme);
		$criteria->compare('auditor',$this->auditor);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('nombre_auditor',$this->nombre_auditor,true);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function search1($id_plan_ev)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_plan_ev',$id_plan_ev);
		$criteria->compare('fecha_evaluacion',$this->fecha_evaluacion,true);
		$criteria->compare('evaluacion_final',$this->evaluacion_final);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('aceptado',$this->aceptado);
		$criteria->compare('conforme',$this->conforme);
		$criteria->compare('auditor',$this->auditor);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('nombre_auditor',$this->nombre_auditor,true);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}