<?php

/**
 * This is the model class for table "ca_auditor".
 *
 * The followings are the available columns in table 'ca_auditor':
 * @property integer $id
 * @property string $nombre
 * @property string $unidad
 * @property string $correo
 * @property string $cargo
 * @property string $area
 * @property string $region
 * @property string $telf_movil
 * @property string $telf_fijo
 * @property string $competencia
 * @property string $observaciones
 * @property string $expediente
 * @property integer $disponibilidad
 * @property integer $equipo_de_auditores
 * @property integer $es_jefe
 * @property integer $es_papelera
 * @property string $evaluacion
 * @property string $nombre_apellido
 * @property string $alcance
 * @property integer $id_quien_lo_crea
 *
 * The followings are the available model relations:
 * @property Bdut.trabajador $nombre0
 * @property CaEvaluacionAuditor[] $caEvaluacionAuditors
 * @property CaListaVerificacion[] $caListaVerificacions
 * @property CaPlanAuditoria[] $caPlanAuditorias
 */
class CaAuditor extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaAuditor the static model class
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
		return 'ca_auditor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, area, region, nombre_apellido, alcance, unidad', 'required','message'=>$this->errorStyle("required")),
			array('disponibilidad, equipo_de_auditores, es_jefe, es_papelera, id_quien_lo_crea', 'numerical', 'integerOnly'=>true,'message'=>$this->errorStyle("numeric")),
			array('nombre', 'length', 'max'=>11),
			array('unidad, correo, cargo, area, region, telf_movil, telf_fijo, expediente, evaluacion, nombre_apellido, alcance', 'length', 'max'=>1000),
			array('competencia, observaciones', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, unidad, correo, cargo, area, region, telf_movil, telf_fijo, competencia, observaciones, expediente, disponibilidad, equipo_de_auditores, es_jefe, es_papelera, evaluacion, nombre_apellido, alcance, id_quien_lo_crea', 'safe', 'on'=>'search'),
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
			'nombre0' => array(self::BELONGS_TO, 'Trabajador', 'nombre'),
			'caEvaluacionAuditors' => array(self::HAS_MANY, 'CaEvaluacionAuditor', 'id_auditor_evaluacion'),
			'caListaVerificacions' => array(self::HAS_MANY, 'CaListaVerificacion', 'id_auditor_lista'),
			'caPlanAuditorias' => array(self::HAS_MANY, 'CaPlanAuditoria', 'id_auditor_plan'),
			'Unidades' => array(self::BELONGS_TO, 'UnidadOrganizativa', 'unidad'),
			'Dis' => array(self::BELONGS_TO, 'Disponibilidad', 'disponibilidad'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'unidad' => 'Unidad',
			'correo' => 'Correo',
			'cargo' => 'Cargo',
			'area' => 'Área',
			'region' => 'Región',
			'telf_movil' => 'Teléfono Móvil',
			'telf_fijo' => 'Teléfono Fijo',
			'competencia' => 'Competencia',
			'observaciones' => 'Observaciones',
			'expediente' => 'Expediente',
			'disponibilidad' => 'Disponibilidad',
			'equipo_de_auditores' => 'Equipo De Auditores',
			'es_jefe' => 'Es Jefe',
			'es_papelera' => 'Es Papelera',
			'evaluacion' => 'Cantidad de Evaluaciones',
			'nombre_apellido' => 'Nombre Completo',
			'Alcance' => 'Alcance',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($temp="", $uo)
	{
		
		$criteria = new CDbCriteria;
	
	
		// Comparaciones estándar
		$criteria->compare('id', $this->id);
		$criteria->compare('nombre', $this->nombre, true);
		$criteria->compare('correo', $this->correo, true);
		$criteria->compare('cargo', $this->cargo, true);
		$criteria->compare('area', $this->area, true);
		$criteria->compare('region', $this->region, true);
		$criteria->compare('telf_movil', $this->telf_movil);
		$criteria->compare('telf_fijo', $this->telf_fijo);
		$criteria->compare('competencia', $this->competencia, true);
		$criteria->compare('observaciones', $this->observaciones, true);
		$criteria->compare('expediente', $this->expediente, true);
		if (!empty($this->disponibilidad)) {
			$criteria->with = array('Dis');
			$criteria->compare('Dis.disponibilidad', $this->disponibilidad, true);
		}
		$criteria->compare('equipo_de_auditores', $this->equipo_de_auditores);
		$criteria->compare('es_jefe', $this->es_jefe);
		$criteria->compare('evaluacion', $this->evaluacion);
		$criteria->compare('nombre_apellido', $this->nombre_apellido,true);
		$criteria->compare('alcance', $this->alcance,true);
		$criteria->compare('es_papelera', $temp,true);
		if($uo!=7){
			$criteria->compare('unidad', $uo);
		}
		else{
		// Filtrado por siglas de la unidad utilizando la relación
		if (!empty($this->unidad)) {
			$criteria->with = array('Unidades');
			$criteria->compare('Unidades.siglas', $this->unidad, true);
		}}
	
		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	
}