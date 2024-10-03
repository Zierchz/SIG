<?php

/**
 * This is the model class for table "ca_documento_informe".
 *
 * The followings are the available columns in table 'ca_documento_informe':
 * @property integer $id
 * @property string $url
 * @property string $descripcion
 * @property integer $id_informe
 * @property string $fecha_informe
 */
class CaDocumentoInforme extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaDocumentoInforme the static model class
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
		return 'ca_documento_informe';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('url, id_informe', 'required'),
			array('id_informe', 'numerical', 'integerOnly'=>true),
			array('url, fecha_informe', 'length', 'max'=>255),
			array('descripcion', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, url, descripcion, id_informe, fecha_informe', 'safe', 'on'=>'search'),
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
			'url' => 'Documento',
			'descripcion' => 'Descripción',
			'id_informe' => 'Id Informe',
			'fecha_informe' => 'Fecha del Informe'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($id_informe)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('id_informe',$id_informe);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}