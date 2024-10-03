<?php
Yii::autoload('Tarea');
Yii::autoload('Usuario');
Yii::autoload('UserIdentity');


class functionalTest extends CTestCase
{
    public function testTareaIndInsert()
    {
        $id_tarea = Tarea::model()->add("ultima1", "Individual", "2015-04-08", "dops", "08:00", 1, 1, "motivo");
        //TareaIndividual::model()->add($id_tarea, null, 1, "kjfsdflsdf", 1, 1, 1, "yo");
        $this->assertEquals('ultima1', $this->getTareaNombre("ultima1"));
        //$this->assertEquals('tarea1', $this->getTareaNombre("tarea3"));
    }

    private function getTareaNombre($nombre)
    {
        $tarea=Tarea::model()->findByAttributes(array('nombre'=>$nombre,));
        return $tarea->nombre;//. ' '.$trabajador->segundo_nombre. ' '.$trabajador->primer_apellido. ' '.$trabajador->segundo_apellido;
    }

    public function testLogin1()
    {
        $identity=new UserIdentity('admin','123456');
        $this->assertEquals(true,$identity->authenticate());
    }


}
