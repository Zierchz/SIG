<?php

/**
 * This is the model class for table "ca_equipo_auditor".
 *
 * The followings are the available columns in table 'ca_equipo_auditor':
 * @property integer $id
 * @property integer $auditor
 * @property string $funcion
 * @property integer $plan_audit
 */
class CaEquipoAuditor extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaEquipoAuditor the static model class
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
		return 'ca_equipo_auditor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('auditor, funcion, plan_audit', 'required','message'=>$this->errorStyle("required")),
			array('plan_audit', 'numerical', 'integerOnly'=>true,'message'=>$this->errorStyle("required")),
			array('auditor, funcion', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('plan_audit', 'safe', 'on'=>'search'),
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
			'caAuditor' => array(self::BELONGS_TO, 'CaAuditor', 'auditor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'auditor' => 'Auditor',
			'funcion' => 'Funcion',
			'plan_audit' => 'Plan Audit',
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
		$criteria->compare('auditor',$this->auditor,true);
		$criteria->compare('funcion',$this->funcion,true);
		$criteria->compare('plan_audit',$this->plan_audit);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function search1($plan_id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('auditor',$this->auditor,true);
		$criteria->compare('funcion',$this->funcion,true);
		$criteria->compare('plan_audit',$plan_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}