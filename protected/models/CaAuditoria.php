<?php

/**
 * This is the model class for table "ca_auditoria".
 *
 * The followings are the available columns in table 'ca_auditoria':
 * @property integer $id
 * @property integer $Anno
 * @property string $unidad_aud
 * @property string $unidad_rec
 * @property string $tipo
 * @property integer $programa
 * @property string $observaciones
 * @property string $mes
 * @property string $objetivo
 * @property string $fecha_A
 * @property string $terminada
 *
 * The followings are the available model relations:
 * @property CaProgramaAuditoria $programa0
 */
class CaAuditoria extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaAuditoria the static model class
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
		return 'ca_auditoria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('unidad_aud, unidad_rec,', 'required','message'=>$this->errorStyle("required")),
			array('programa', 'numerical', 'integerOnly'=>true,'message'=>$this->errorStyle("numeric")),
			array('unidad_aud, unidad_rec, tipo, observaciones, fecha_A', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, unidad_aud, unidad_rec, tipo, programa, observaciones, Anno, mes, fecha_A, terminada', 'safe', 'on'=>'search'),
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
			'programa0' => array(self::BELONGS_TO, 'CaProgramaAuditoria', 'programa'),
			'idUnidadRectora1' => array(self::BELONGS_TO, 'UnidadOrganizativa', 'unidad_rec'),
			'idUnidadAAuditar1' => array(self::BELONGS_TO, 'UnidadOrganizativa', 'unidad_aud'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'unidad_aud' => 'Unidad a Auditar',
			'unidad_rec' => 'Unidad Rectora',
			'tipo' => 'Tipo',
			'programa' => 'Programa',
			'observaciones' => 'Observaciones',
			'Anno'=>'Año',
			'mes'=>'Mes',
			'objetivo'=>'Objetivo',
			'fecha_A'=>'Fecha',
			'terminada'=>'Concluida'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($uo)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('Anno',$this->Anno,true);
		$criteria->compare('mes',$this->mes,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('programa',$this->programa,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('objetivo',$this->objetivo,true);
		$criteria->compare('fecha_A',$this->fecha_A,true);
		$criteria->compare('terminada',$this->terminada,true);
		if($uo!=7){
			$criteria->compare('unidad_rec', $uo);
		}
		else{
		// Filtrado por siglas de la unidad utilizando la relación
		if (!empty($this->unidad_rec)) {
			$criteria->with = array('idUnidadRectora1');
			$criteria->compare('idUnidadRectora1.siglas', $this->unidad_rec, true);
		}}

		if (!empty($this->unidad_aud)) {
			$criteria->with = array('idUnidadAAuditar1');
			$criteria->compare('idUnidadAAuditar1.siglas', $this->unidad_aud, true);
		}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}