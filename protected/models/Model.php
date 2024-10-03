<?php

/**
 * This is the generic model class.
 */
class Model extends CActiveRecord
{
	public function errorStyle($errorType, $lenght=""){
		if($errorType=="required")
			return '<span style="color: darkred;"><i class="fa fa-warning"></i> <b>El campo no puede estar vacío.</b><span>';
		if($errorType=="numeric")
			return '<span style="color: darkred;"><i class="fa fa-warning"></i> <b>El campo debe ser numérico.</b><span>';
		if($errorType=="lenght"){
			return '<span style="color: darkred;"><i class="fa fa-warning"></i> <b>El campo no debe sobrepasar los '.$lenght.' caracteres.</b><span>';
		}
		if($errorType=="wrongpass"){
			return '<span style="color: darkred;"><i class="fa fa-warning"></i> <b>El password actual no es correcto.</b><span>';
		}
		if($errorType=="wrongconfirm"){
			return '<span style="color: darkred;"><i class="fa fa-warning"></i> <b>El nuevo password y la confirmación no coinciden.</b><span>';
		}
	}

	public function obtProductos($id, $table, $campo, $temp=""){
		$ing_final="";
		if($temp=="")
			$sql = "select p.nombre, pp.cantidad, um.abreviatura
					 from producto p, ".$table." pp, unidad_medida um
					 where p.id=pp.id_producto
					 and um.id = pp.id_unimed
					 and pp.".$campo."=".$id."";
		else
			$sql = "select p.nombre
				 from producto p, ".$table." pp
				 where p.id=pp.id_producto
				 and pp.".$campo."=".$id."";
		$ing = Yii::app()->db->createCommand($sql)->queryAll();
		foreach($ing as &$ingrediente){
			if($temp=="")
				$ing_final.=$ingrediente['nombre']." ".$ingrediente['cantidad']." ".$ingrediente['abreviatura']."<br/>";
			else
				$ing_final.=$ingrediente['nombre']."<br/>";
		}
		return $ing_final;
	}

	public function obtElementoProd($id,$id_producto, $table, $campo, $temp=""){
		if($temp=="")
			$sql = "select pp.id, cantidad, id_unimed
					 from ".$table." pp
					 where pp.id_producto=".$id_producto."
					 and pp.".$campo."=".$id."";
		else
			$sql = "select pp.id
					 from ".$table." pp
					 where pp.id_producto=".$id_producto."
					 and pp.".$campo."=".$id."";
		$ing = Yii::app()->db->createCommand($sql)->queryAll();
		if(count($ing)>0)
			return $ing;
		else
			return false;
	}

	public function getManytoMany($id,$sql,$fields,$model,$separador, $temp=""){		
		$text="";
		if($temp!=""){ // ---- Relacion con  otra bd
			$ing = Yii::app()->db->createCommand($sql)->queryAll();
			if(count($ing)>0){				
							
				foreach($ing as &$row)
				{
					$id_area = $row[$temp];
					$sql4="select s.nombre, s.siglas from area s where s.sap_code=".$id_area;
					$ing1 = Yii::app()->db_bdut->createCommand($sql4)->queryAll();
					if(count($ing1)>0){
						
						$array_fields = explode(",", $fields);
						foreach($ing1 as &$row1)
						{
							$text .="- ";
							for($i=0;$i<count($array_fields);$i++) {
								if($array_fields[$i]!="id"){						
										$text .= $row1["".$array_fields[$i].""] . $separador;
								}

							}
								$text .="<br/>";


						}
						
						
					}
					else
						return "Sin Asignar<br/><a href='index.php?r=".$model."/Admin1&id_app=".$id."'><i class='fa fa-pencil'></i> Editar</a><br/>";
				}
				
			}
			else
				return "Sin Asignar<br/><a href='index.php?r=".$model."/Admin1&id_app=".$id."'><i class='fa fa-pencil'></i> Editar</a><br/>";
		}
		 else
		 {
		 	$ing = Yii::app()->db->createCommand($sql)->queryAll();
			 if(count($ing)>0){
				$text="";
				$array_fields = explode(",", $fields);
				foreach($ing as &$row)
				{
					$text .="- ";
					for($i=0;$i<count($array_fields);$i++) {
						if($array_fields[$i]!="id"){						
								$text .= $row["".$array_fields[$i].""] . $separador;
						}

					}
					//if($i<count($array_fields))
						$text .="<br/>";


				}
				$text .= "<br/><a href='index.php?r=".$model."/Admin1&id_app=".$id."'><i class='fa fa-pencil'></i> Editar</a><br/>";
				return $text;
			}
			else
				return "Sin Asignar<br/><a href='index.php?r=".$model."/Admin1&id_app=".$id."'><i class='fa fa-pencil'></i> Editar</a><br/>";
		 }
		 $text .= "<br/><a href='index.php?r=".$model."/Admin1&id_app=".$id."'><i class='fa fa-pencil'></i> Editar</a><br/>";
		 return $text;
		 

	}

	public function getChilds($fields, $table, $compareField, $idField, $model, $temp=""){
		$sql = " select ".$fields."
				 from ".$table."
				 where ".$compareField."=".$idField."";
		$ing = Yii::app()->db->createCommand($sql)->queryAll();
		if(count($ing)>0){
			$text="";
			$array_fields = explode(",", $fields);
			foreach($ing as &$row)
			{
				for($i=0;$i<count($array_fields);$i++) {
					if($array_fields[$i]!="id"){
						if($temp!="" && $i==1)
							$text .= $row["".$array_fields[$i].""] . ": ";
						else
							$text .= $row["".$array_fields[$i].""] . " ";
					}

				}
				$text .= "<a href='index.php?r=".$model."/view&id=".$row[$array_fields[0]]."'><i class='fa fa-search'></i> Detalles</a><br/>";


			}
			return $text;
		}
		else
			return "Sin Asignar";
	}

	public function getArea($id_area){
        $area = Area::model()->findByPk($id_area);
		if($area==NULL)
            return "Sin asignar";
        else
            return $area->nombre;
	}
}