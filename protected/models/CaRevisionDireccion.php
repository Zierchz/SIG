<?php

/**
 * This is the model class for table "ca_revision_direccion".
 *
 * The followings are the available columns in table 'ca_revision_direccion':
 * @property integer $id
 * @property string $fecha_emision
 * @property integer $proceso
 * @property string $fecha_aprobado
 * @property string $revision_elaborado_por
 * @property string $revision_aprobado_por
 * @property string $observaciones
 * @property string $fecha_elaborado
 * @property integer $uo
 *
 * The followings are the available model relations:
 * @property Usuario $revisionAprobadoPor
 * @property Usuario $revisionElaboradoPor
 * @property CaProceso $proceso0
 */
class CaRevisionDireccion extends Model{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaRevisionDireccion the static model class
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
		return 'ca_revision_direccion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_emision, fecha_aprobado, revision_aprobado_por, uo', 'required','message'=>$this->errorStyle("required")),
			array('proceso,', 'numerical', 'integerOnly'=>true,'message'=>$this->errorStyle("numeric")),
			array('revision_elaborado_por, revision_aprobado_por,', 'length', 'max'=>1000),
			array('observaciones', 'length', 'max'=>1000),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fecha_emision, proceso, fecha_aprobado, revision_elaborado_por, revision_aprobado_por, observaciones, fecha_elaborado, uo', 'safe', 'on'=>'search'),
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
			'revisionAprobadoPor' => array(self::BELONGS_TO, 'Usuario', 'revision_aprobado_por'),
			'revisionElaboradoPor' => array(self::BELONGS_TO, 'Usuario', 'revision_elaborado_por'),
			'proceso0' => array(self::BELONGS_TO, 'CaProceso', 'proceso'),
			'Unidades1' => array(self::BELONGS_TO, 'UnidadOrganizativa', 'uo'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fecha_emision' => 'Fecha de Emisión',
			'proceso' => 'Proceso',
			'fecha_aprobado' => 'Fecha de Aprobación',
			'revision_elaborado_por' => ' Elaborado Por:',
			'revision_aprobado_por' => 'Aprobado Por:',
			'observaciones' => 'Observaciones',
			'fecha_elaborado' => 'Fecha de Elaboración',
			'uo' => 'Unidad',

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
		$criteria->compare('fecha_emision',$this->fecha_emision,true);
		$criteria->compare('proceso',$this->proceso);
		$criteria->compare('fecha_aprobado',$this->fecha_aprobado,true);
		$criteria->compare('revision_elaborado_por',$this->revision_elaborado_por,true);
		$criteria->compare('revision_aprobado_por',$this->revision_aprobado_por,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('fecha_elaborado',$this->fecha_elaborado,true);
		if($uo!=7){
			$criteria->compare('uo',$uo);
		}
		else{
			if (!empty($this->uo)) {
				$criteria->with = array('Unidades1');
				$criteria->compare('Unidades1.siglas', $this->uo, true);
			}
		}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}