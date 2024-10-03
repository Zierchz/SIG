<?php

/**
 * This is the model class for table "ca_notificaciones".
 *
 * The followings are the available columns in table 'ca_notificaciones':
 * @property string $id
 * @property string $nombre
 * @property string $tipo
 * @property string $autor
 * @property string $receptor
 * @property string $fecha
 * @property string $contenido
 * @property string $evento
 * @property string $resumen
 * @property string $hora
 * @property string $icono
 * @property string $estado
 */
class CaNotificaciones extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaNotificaciones the static model class
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
		return 'ca_notificaciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, tipo, autor, receptor, fecha, contenido, hora, icono, estado', 'required'),
			array('nombre, tipo, autor, receptor, evento, resumen, icono, estado', 'length', 'max'=>100),
			array('contenido', 'length', 'max'=>5000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, tipo, autor, receptor, fecha, contenido, evento, resumen, hora, icono, estado', 'safe', 'on'=>'search'),
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
			'nombre' => 'Nombre',
			'tipo' => 'Tipo',
			'autor' => 'Autor',
			'receptor' => 'Receptor',
			'fecha' => 'Fecha',
			'contenido' => 'Contenido',
			'evento' => 'Evento',
			'resumen' => 'Resumen',
			'hora' => 'Hora',
			'icono' => 'Icono',
			'estado' => 'Estado',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('autor',$this->autor,true);
		$criteria->compare('receptor',$this->receptor,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('contenido',$this->contenido,true);
		$criteria->compare('evento',$this->evento,true);
		$criteria->compare('resumen',$this->resumen,true);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('icono',$this->icono,true);
		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}