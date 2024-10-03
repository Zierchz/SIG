<?php

/**
 * This is the model class for table "ca_documento".
 *
 * The followings are the available columns in table 'ca_documento':
 * @property integer $id
 * @property string $url
 * @property integer $auditor
 * @property string $auditor_nombre
 * @property string $fecha_creacion
 * @property string $autor
 * @property string $unidad_o
 * @property string $observaciones
 * @property string $categoria
 *
 * The followings are the available model relations:
 * @property CaAuditor $auditor0
 */
class CaDocumento extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaDocumento the static model class
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
		return 'ca_documento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('url, auditor, categoria', 'required','message'=>$this->errorStyle("required")),
			array('auditor', 'numerical', 'integerOnly'=>true,'message'=>$this->errorStyle("numeric")),
			array('autor, unidad_o, observaciones, categoria, auditor_nombre', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, url, auditor, fecha_creacion, autor, unidad_o, observaciones, categoria, auditor_nombre', 'safe', 'on'=>'search'),
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
			'auditor0' => array(self::BELONGS_TO, 'CaAuditor', 'auditor'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'url' => 'Nombre',
			'auditor' => 'Auditor',
			'fecha_creacion' => 'Fecha de Creación',
			'autor' => 'Autor',
			'unidad_o' => 'Unidad',
			'observaciones' => 'Observaciones',
			'categoria' => 'Categoría',
			'auditor_nombre' => 'Auditor'
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
		$criteria->compare('url',$this->url,true);
		$criteria->compare('auditor',$this->auditor,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('autor',$this->autor,true);
		$criteria->compare('unidad_o',$this->unidad_o,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('categoria',$this->categoria,true);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function search1($audit)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('auditor',$audit);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('autor',$this->autor,true);
		$criteria->compare('unidad_o',$this->unidad_o,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('categoria',$this->categoria,true);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}