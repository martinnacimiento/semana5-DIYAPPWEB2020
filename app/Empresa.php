<?php 
namespace App;
use App\AbstractModel;

class Empresa extends AbstractModel {
    public function save(){
        $sql = "INSERT INTO empresas (nombre) VALUES (:nombre)";
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':nombre', $this->nombre);
        $result = $statement->execute();
        return $result;
    }

    static function all() {
        return parent::allEntities('empresas', "App\Empresa");
    }

    static function delete($id) {
        return parent::deleteEntity('empresas', $id);
    }

    static function find($id) {
        return parent::findEntity('empresas', $id, "App\Empresa");
    }

    public function update() {
        $sql = "UPDATE empresas SET nombre=:nombre WHERE id = :id";
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':id', $this->id);
        $statement->bindValue(':nombre', $this->nombre);
        $statement->execute();
        return $statement->rowCount();
    }
}