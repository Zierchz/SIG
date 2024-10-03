<?php

/**
 * This is the model class for table "ca_actividad".
 *
 * The followings are the available columns in table 'ca_actividad':
 * @property integer $id
 * @property string $fecha
 * @property string $actividad
 * @property string $objetivo
 * @property integer $plan
 * @property string $hora
 * @property string $dia
 * @property string $hora_fin
 * @property string $dia_fin
 *
 * The followings are the available model relations:
 * @property CaPlanAuditoria[] $caPlanAuditorias
 */
class CaActividad extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaActividad the static model class
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
		return 'ca_actividad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha, actividad, objetivo, plan, hora, hora_fin', 'required','message'=>$this->errorStyle("required")),
			array('plan', 'numerical', 'integerOnly'=>true,'message'=>$this->errorStyle("numeric")),
			array('actividad, objetivo, dia, dia_fin', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fecha, actividad, objetivo, plan, hora, dia, hora_fin, dia_fin', 'safe', 'on'=>'search'),
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
			'caPlanAuditorias' => array(self::HAS_MANY, 'CaPlanAuditoria', 'actividad_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fecha' => 'Fecha',
			'actividad' => 'Actividad',
			'objetivo' => 'Objetivo',
			'plan' => 'Plan',
			'hora' => 'Horario de Inicio',
			'hora_fin' => 'Horario Final',
			'dia' => '',
			'dia_fin' => '',
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
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('actividad',$this->actividad,true);
		$criteria->compare('objetivo',$this->objetivo,true);
		$criteria->compare('plan',$this->plan);
		$criteria->compare('hora',$this->hora);
		$criteria->compare('dia',$this->dia);
		$criteria->compare('hora_fin',$this->hora_fin);



		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function search1($plan)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('actividad',$this->actividad,true);
		$criteria->compare('objetivo',$this->objetivo,true);
		$criteria->compare('plan',$plan);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('dia',$this->dia,true);
		$criteria->compare('hora_fin',$this->hora_fin,true);



		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}