<?php 
namespace App;
use App\AbstractModel;

class Correo extends AbstractModel {
    public function save(){
        $sql = "INSERT INTO correos (email, persona_id) VALUES (:email, :persona_id)";
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':email', $this->email);
        $statement->bindValue(':persona_id', $this->persona_id);
        $result = $statement->execute();
        return $result;
    }

    static function all() {
        return parent::allEntities('correos', "App\Correo");
    }

    static function delete($id) {
        return parent::deleteEntity('correos', $id);
    }

    static function find($id) {
        return parent::findEntity('correos', $id, "App\Correo");
    }

    public function update() {
        $sql = "UPDATE correos SET email=:email , persona_id=:persona_id WHERE id = :id";
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':id', $this->id);
        $statement->bindValue(':email', $this->email);
        $statement->bindValue(':persona_id', $this->persona_id);
        $statement->execute();
        return $statement->rowCount();
    }
}