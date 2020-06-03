<?php 
namespace App;
use App\AbstractModel;

class Empleado extends AbstractModel {
    public function save(){
        $sql = "INSERT INTO empleados (nro_legajo, dependencia, fecha_ingreso, persona_id) VALUES (:nro_legajo, :dependencia, :fecha_ingreso, :persona_id)";
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':nro_legajo', $this->nro_legajo);
        $statement->bindValue(':dependencia', $this->dependencia);
        $statement->bindValue(':fecha_ingreso', $this->fecha_ingreso);
        $statement->bindValue(':persona_id', $this->persona_id);
        $result = $statement->execute();
        return $result;
    }

    static function all() {
        return parent::allEntities('empleados', "App\Empleado");
    }

    static function delete($id) {
        return parent::deleteEntity('empleados', $id);
    }

    static function find($id) {
        return parent::findEntity('empleados', $id, "App\Empleado");
    }

    public function update() {
        $sql = "UPDATE empleados SET nro_legajo=:nro_legajo , dependencia=:dependencia, fecha_ingreso=:fecha_ingreso, persona_id=:persona_id WHERE id = :id";
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':id', $this->id);
        $statement->bindValue(':nro_legajo', $this->nro_legajo);
        $statement->bindValue(':dependencia', $this->dependencia);
        $statement->bindValue(':fecha_ingreso', $this->fecha_ingreso);
        $statement->bindValue(':persona_id', $this->persona_id);
        $statement->execute();
        return $statement->rowCount();
    }
}