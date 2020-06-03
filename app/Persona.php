<?php

namespace App;

use App\AbstractModel;

class Persona extends AbstractModel
{
    public function getEmpresa()
    {
        $sql = "SELECT * FROM empresas WHERE id=:empresa_id";
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':empresa_id', $this->empresa_id);
        $statement->execute();
        return $statement->fetchObject('App\Empresa');
    }

    public function save()
    {
        $sql = "INSERT INTO personas (cuil, apellido, nombre, empresa_id) VALUES (:cuil, :apellido, :nombre, :empresa_id)";
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':cuil', $this->cuil);
        $statement->bindValue(':nombre', $this->nombre);
        $statement->bindValue(':apellido', $this->apellido);
        $statement->bindValue(':empresa_id', $this->empresa_id);
        $result = $statement->execute();
        return $result;
    }

    static function all()
    {
        return parent::allEntities('personas', "App\Persona");
    }

    static function delete($id)
    {
        return parent::deleteEntity('personas', $id);
    }

    static function find($id)
    {
        return parent::findEntity('personas', $id, "App\Persona");
    }

    public function update()
    {
        $sql = "UPDATE personas SET cuil=:cuil , apellido=:apellido, nombre=:nombre, empresa_id=:empresa_id WHERE id = :id";
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':id', $this->id);
        $statement->bindValue(':cuil', $this->cuil);
        $statement->bindValue(':nombre', $this->nombre);
        $statement->bindValue(':apellido', $this->apellido);
        $statement->bindValue(':empresa_id', $this->empresa_id);
        $statement->execute();
        return $statement->rowCount();
    }
}
