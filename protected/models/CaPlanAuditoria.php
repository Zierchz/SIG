<?php

/**
 * This is the model class for table "ca_plan_auditoria".
 *
 * The followings are the available columns in table 'ca_plan_auditoria':
 * @property integer $id
 * @property string $area
 * @property string $fecha_plan
 * @property string $objetivo_plan
 * @property string $alcance
 * @property string $plan_elaborado_por
 * @property string $plan_revisado_por
 * @property string $plan_aprobado_por
 * @property integer $auditoria
 * @property string $periodo
 *
 * The followings are the available model relations:
 * @property CaEvaluacionAuditor[] $caEvaluacionAuditors
 * @property CaInformeAuditoria[] $caInformeAuditorias
 * @property CaListaVerificacion[] $caListaVerificacions
 * @property CaAuditoria $auditoria0
 */
class CaPlanAuditoria extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaPlanAuditoria the static model class
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
		return 'ca_plan_auditoria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
{
    return array(
        array('area, fecha_plan, objetivo_plan, alcance, plan_elaborado_por, plan_revisado_por, plan_aprobado_por, auditoria', 'required','message'=>$this->errorStyle("required")),
        array('auditoria  ', 'numerical', 'integerOnly' => true,'message'=>$this->errorStyle("numeric")),
        array('area, plan_elaborado_por, plan_revisado_por, plan_aprobado_por, periodo', 'length', 'max' => 1000),
		array('objetivo_plan, alcance', 'length', 'max' => 5000),

       
        // The following rule is used by search().
        // Please remove those attributes that should not be searched.
        array('id, area, fecha_plan, objetivo_plan, alcance, plan_elaborado_por, plan_revisado_por, plan_aprobado_por, auditoria, periodo', 'safe', 'on' => 'search'),
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
			'caEvaluacionAuditors' => array(self::HAS_MANY, 'CaEvaluacionAuditor', 'id_plan_evaluacion'),
			'caInformeAuditorias' => array(self::HAS_MANY, 'CaInformeAuditoria', 'id_plan_informe'),
			'caListaVerificacions' => array(self::HAS_MANY, 'CaListaVerificacion', 'id_plan_lista'),
			'auditoria0' => array(self::BELONGS_TO, 'CaAuditoria', 'auditoria'),
			'Trabaj1' => array(self::BELONGS_TO, 'Trabajador', 'plan_aprobado_por'),
			'Trabaj2' => array(self::BELONGS_TO, 'Trabajador', 'plan_revisado_por'),
			'Unidad' => array(self::BELONGS_TO, 'UnidadOrganizativa', 'area'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'area' => 'Area',
			'fecha_plan' => 'Fecha del Plan',
			'objetivo_plan' => 'Objetivo del Plan',
			'alcance' => 'Alcance',
			'plan_elaborado_por' => 'Elaborado Por:',
			'plan_revisado_por' => 'Revisado Por:',
			'plan_aprobado_por' => 'Aprobado Por:',
			'auditoria' => 'Auditoría',
			'periodo' => 'Período a Evaluar',

			
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
		$criteria->compare('area',$this->area,true);
		$criteria->compare('fecha_plan',$this->fecha_plan,true);
		$criteria->compare('objetivo_plan',$this->objetivo_plan,true);
		$criteria->compare('alcance',$this->alcance,true);
		$criteria->compare('plan_elaborado_por',$this->plan_elaborado_por,true);
		$criteria->compare('plan_revisado_por',$this->plan_revisado_por,true);
		$criteria->compare('plan_aprobado_por',$this->plan_aprobado_por,true);
		$criteria->compare('auditoria',$this->auditoria);
		$criteria->compare('periodo',$this->periodo);


		

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
		$criteria->compare('area',$this->area,true);
		$criteria->compare('fecha_plan',$this->fecha_plan,true);
		$criteria->compare('objetivo_plan',$this->objetivo_plan,true);
		$criteria->compare('alcance',$this->alcance,true);
		$criteria->compare('plan_elaborado_por',$this->plan_elaborado_por,true);
		$criteria->compare('plan_revisado_por',$this->plan_revisado_por,true);
		$criteria->compare('plan_aprobado_por',$this->plan_aprobado_por,true);
		$criteria->compare('auditoria',$plan);
		$criteria->compare('periodo',$this->periodo);

	

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}