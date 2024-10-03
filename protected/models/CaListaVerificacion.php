<?php

/**
 * This is the model class for table "ca_lista_verificacion".
 *
 * The followings are the available columns in table 'ca_lista_verificacion':
 * @property integer $id
 * @property integer $id_plan_lista
 * @property string $fecha
 * @property integer $lider
 * @property integer $auditoria_id
 * @property string $area_audit
 *
 * The followings are the available model relations:
 * @property CaAuditoria $auditoria
 * @property CaPlanAuditoria $idPlanLista
 */
class CaListaVerificacion extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaListaVerificacion the static model class
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
		return 'ca_lista_verificacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' id_plan_lista, fecha, lider, auditoria_id, area_audit', 'required','message'=>$this->errorStyle("required")),
			array(' id_plan_lista, lider, auditoria_id', 'numerical', 'integerOnly'=>true,'message'=>$this->errorStyle("numeric")),
			array('area_audit', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_plan_lista, fecha, lider, auditoria_id, area_audit', 'safe', 'on'=>'search'),
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
			'auditoria' => array(self::BELONGS_TO, 'CaAuditoria', 'auditoria_id'),
			'idPlanLista' => array(self::BELONGS_TO, 'CaPlanAuditoria', 'id_plan_lista'),
			'audi' => array(self::BELONGS_TO, 'CaAuditor', 'lider'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_plan_lista' => 'Id Plan Lista',
			'fecha' => 'Fecha',
			'lider' => 'Líder Auditor',
			'auditoria_id' => 'Auditoría',
			'area_audit' => 'Area Audit',
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
		$criteria->compare('id_plan_lista',$this->id_plan_lista);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('lider',$this->lider);
		$criteria->compare('auditoria_id',$this->auditoria_id);
		$criteria->compare('area_audit',$this->area_audit,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function search1($lista)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_plan_lista',$this->id_plan_lista);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('lider',$this->lider);
		$criteria->compare('auditoria_id',$lista);
		$criteria->compare('area_audit',$this->area_audit,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}