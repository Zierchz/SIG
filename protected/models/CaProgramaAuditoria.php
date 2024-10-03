<?php

/**
 * This is the model class for table "ca_programa_auditoria".
 *
 * The followings are the available columns in table 'ca_programa_auditoria':
 * @property integer $id
 * @property string $unidad_rectora
 * @property string $unidad_a_auditar
 * @property integer $anno
 * @property string $objetivos_programa
 * @property string $riesgos_programa
 * @property string $Enero
 * @property string $Febrero
 * @property string $Marzo
 * @property string $Abril
 * @property string $Mayo
 * @property string $Junio
 * @property string $Julio
 * @property string $Agosto
 * @property string $Septiembre
 * @property string $Octubre
 * @property string $Noviembre
 * @property string $Diciembre
 * @property integer $id_unidad
 * @property string $f_Enero
 * @property string $f_Febrero
 * @property string $f_Marzo
 * @property string $f_Abril
 * @property string $f_Mayo
 * @property string $f_Junio
 * @property string $f_Julio
 * @property string $f_Agosto
 * @property string $f_Septiembre
 * @property string $f_Octubre
 * @property string $f_Noviembre
 * @property string $f_Diciembre
 * @property string $fin_Enero
 * @property string $fin_Febrero
 * @property string $fin_Marzo
 * @property string $fin_Abril
 * @property string $fin_Mayo
 * @property string $fin_Junio
 * @property string $fin_Julio
 * @property string $fin_Agosto
 * @property string $fin_Septiembre
 * @property string $fin_Octubre
 * @property string $fin_Noviembre
 * @property string $fin_Diciembre
 * @property string $aprobado_por
 *
 * The followings are the available model relations:
 * @property CaAuditoria[] $caAuditorias
 * @property CaPlanAuditoria[] $caPlanAuditorias
 * @property UnidadOrganizativaBdut[] $idUnidad
 */
class CaProgramaAuditoria extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaProgramaAuditoria the static model class
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
		return 'ca_programa_auditoria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('unidad_rectora, unidad_a_auditar, anno, objetivos_programa, riesgos_programa, aprobado_por', 'required','message'=>$this->errorStyle("required")),
			array('id_unidad, anno', 'numerical', 'integerOnly'=>true,'message'=>$this->errorStyle("numeric")),
			array('observaciones, unidad_rectora, unidad_a_auditar, Enero, Febrero, Marzo, Abril, Mayo, Junio, Julio, Agosto, 
			Septiembre, Octubre, Noviembre, Diciembre, f_Enero, f_Febrero, f_Marzo, f_Abril, f_Mayo, f_Junio, f_Julio, f_Agosto, 
			f_Septiembre, f_Octubre, f_Noviembre, f_Diciembre, fin_Enero, fin_Febrero, fin_Marzo, fin_Abril, fin_Mayo, fin_Junio
			, fin_Julio, fin_Agosto, fin_Septiembre, fin_Octubre, fin_Noviembre, fin_Diciembre', 'length', 'max'=>1000),
			array(' objetivos_programa, riesgos_programa, aprobado_por', 'length', 'max'=>1000),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, unidad_rectora, unidad_a_auditar, anno, objetivos_programa, riesgos_programa, Enero, Febrero, Marzo,
			 Abril, Mayo, Junio, Julio, Agosto, Septiembre, Octubre, Noviembre, Diciembre, id_unidad, observaciones, f_Enero,
			  f_Febrero, f_Marzo, f_Abril, f_Mayo, f_Junio, f_Julio, f_Agosto, f_Septiembre, f_Octubre, f_Noviembre, f_Diciembre,
			  fin_Enero, fin_Febrero, fin_Marzo, fin_Abril, fin_Mayo, fin_Junio
			  , fin_Julio, fin_Agosto, fin_Septiembre, fin_Octubre, fin_Noviembre, fin_Diciembre,aprobado_por', 'safe', 'on'=>'search'),
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
			'caAuditorias' => array(self::HAS_MANY, 'CaAuditoria', 'programa'),
			'caPlanAuditorias' => array(self::HAS_MANY, 'CaPlanAuditoria', 'id_programa_plan'),
			'idUnidad' => array(self::BELONGS_TO, 'UnidadOrganizativa', 'unidad_rectora'),
			'idUnidadAAuditar' => array(self::BELONGS_TO, 'UnidadOrganizativa', 'unidad_a_auditar'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'unidad_rectora' => 'Unidad Rectora',
			'unidad_a_auditar' => 'Unidad a Auditar',
			'anno' => 'Año',
			'objetivos_programa' => 'Objetivos del Programa',
			'riesgos_programa' => 'Riesgos del Programa',
			'Enero' => 'ENERO ',
			'Febrero' => ' FEBRERO ',
			'Marzo' => ' MARZO ',
			'Abril' => ' ABRIL ',
			'Mayo' => ' MAYO ',
			'Junio' => ' JUNIO ',
			'Julio' => ' JULIO ',
			'Agosto' => ' AGOSTO ',
			'Septiembre' => ' SEPTIEMBRE ',
			'Octubre' => ' OCTUBRE ',
			'Noviembre' => ' NOVIEMBRE ',
			'Diciembre' => ' DICIEMBRE ',
			'id_unidad' => 'Id Unidad',
			'observaciones' => 'Observaciones',
			'f_Enero' => 'Fecha de Inicio',
			'f_Febrero' => 'Fecha de Inicio',
			'f_Marzo' => 'Fecha de Inicio',
			'f_Abril' => 'Fecha de Inicio',
			'f_Mayo' => 'Fecha de Inicio',
			'f_Junio' => 'Fecha de Inicio',
			'f_Julio' => 'Fecha de Inicio',
			'f_Agosto' => 'Fecha de Inicio',
			'f_Septiembre' => 'Fecha de Inicio',
			'f_Octubre' => 'Fecha de Inicio',
			'f_Noviembre' => 'Fecha de Inicio',
			'f_Diciembre' => 'Fecha de Inicio',
			'fin_Enero' => 'Fecha Límite',
			'fin_Febrero' => 'Fecha Límite',
			'fin_Marzo' => 'Fecha Límite',
			'fin_Abril' => 'Fecha Límite',
			'fin_Mayo' => 'Fecha Límite',
			'fin_Junio' => 'Fecha Límite',
			'fin_Julio' => 'Fecha Límite',
			'fin_Agosto' => 'Fecha Límite',
			'fin_Septiembre' => 'Fecha Límite',
			'fin_Octubre' => 'Fecha Límite',
			'fin_Noviembre' => 'Fecha Límite',
			'fin_Diciembre' => 'Fecha Límite',
			'aprobado_por' => 'Aprobado por'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	
	public function search1($unidad)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('anno',$this->anno,true);
		$criteria->compare('objetivos_programa',$this->objetivos_programa,true);
		$criteria->compare('riesgos_programa',$this->riesgos_programa,true);
		$criteria->compare('Enero',$this->Enero,true);
		$criteria->compare('Febrero',$this->Febrero,true);
		$criteria->compare('Marzo',$this->Marzo,true);
		$criteria->compare('Abril',$this->Abril,true);
		$criteria->compare('Mayo',$this->Mayo,true);
		$criteria->compare('Junio',$this->Junio,true);
		$criteria->compare('Julio',$this->Julio,true);
		$criteria->compare('Agosto',$this->Agosto,true);
		$criteria->compare('Septiembre',$this->Septiembre,true);
		$criteria->compare('Octubre',$this->Octubre,true);
		$criteria->compare('Noviembre',$this->Noviembre,true);
		$criteria->compare('Diciembre',$this->Diciembre,true);
		
		if($unidad!=7){
			$criteria->compare('unidad_rectora', $unidad);
		}
		else{
		// Filtrado por siglas de la unidad utilizando la relación
		if (!empty($this->unidad_rectora)) {
			$criteria->with = array('idUnidad');
			$criteria->compare('idUnidad.siglas', $this->unidad_rectora, true);
		}}
		if (!empty($this->unidad_a_auditar)) {
			$criteria->with = array('idUnidadAAuditar');
			$criteria->compare('idUnidadAAuditar.siglas', $this->unidad_a_auditar, true);
		}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}