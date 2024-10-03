<?php

/**
 * This is the model class for table "ca_informe_auditoria".
 *
 * The followings are the available columns in table 'ca_informe_auditoria':
 * @property integer $id
 * @property string $fecha_informe
 * @property string $objetivo_auditoria
 * @property string $alcance
 * @property string $representantes
 * @property string $rutas
 * @property string $hallazgos
 * @property string $evaluacion
 * @property string $conclusiones
 * @property integer $audit_id
 * @property integer $aprobado
 * @property integer $revisado
 *
 * The followings are the available model relations:
 * @property CaInformeAuditoria $audit
 * @property CaInformeAuditoria[] $caInformeAuditorias
 */
class CaInformeAuditoria extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaInformeAuditoria the static model class
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
		return 'ca_informe_auditoria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_informe, objetivo_auditoria, alcance, representantes, rutas, hallazgos, evaluacion , audit_id', 'required','message'=>$this->errorStyle("required")),
			array('audit_id, aprobado, revisado', 'numerical', 'integerOnly'=>true,'message'=>$this->errorStyle("numeric")),
			array('objetivo_auditoria, alcance, representantes, rutas, hallazgos, evaluacion, conclusiones, representantes1', 'length', 'max'=>5000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fecha_informe, objetivo_auditoria, alcance, representantes, representantes1, rutas, hallazgos, evaluacion, conclusiones, audit_id, aprobado, revisado', 'safe', 'on'=>'search'),
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
			'fecha_informe' => 'Fecha del Informe',
			'objetivo_auditoria' => 'Objetivo de la Auditoría',
			'alcance' => 'Alcance',
			'representantes' => 'Representante',
			'representantes1' => 'Representante',
			'rutas' => 'Rutas',
			'hallazgos' => 'Hallazgos',
			'evaluacion' => 'Evaluación y Conclusiones',
			'conclusiones' => 'Conclusiones',
			'audit_id' => 'Audit',
			'aprobado' => 'Aprobado',
			'revisado' => 'Revisado',
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
		$criteria->compare('fecha_informe',$this->fecha_informe,true);
		$criteria->compare('objetivo_auditoria',$this->objetivo_auditoria,true);
		$criteria->compare('alcance',$this->alcance,true);
		$criteria->compare('representantes',$this->representantes,true);
		$criteria->compare('rutas',$this->rutas,true);
		$criteria->compare('hallazgos',$this->hallazgos,true);
		$criteria->compare('evaluacion',$this->evaluacion,true);
		$criteria->compare('conclusiones',$this->conclusiones,true);
		$criteria->compare('audit_id',$this->audit_id,true);
		$criteria->compare('aprobado',$this->aprobado,true);
		$criteria->compare('revisado',$this->revisado,true);

		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function search1($audit_id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('fecha_informe',$this->fecha_informe,true);
		$criteria->compare('objetivo_auditoria',$this->objetivo_auditoria,true);
		$criteria->compare('alcance',$this->alcance,true);
		$criteria->compare('representantes',$this->representantes,true);
		$criteria->compare('rutas',$this->rutas,true);
		$criteria->compare('hallazgos',$this->hallazgos,true);
		$criteria->compare('evaluacion',$this->evaluacion,true);
		$criteria->compare('conclusiones',$this->conclusiones,true);
		$criteria->compare('audit_id',$audit_id);
		$criteria->compare('aprobado',$this->aprobado);
		$criteria->compare('revisado',$this->revisado);



		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}