<?php

namespace App;

use App\AbstractModel;

class Permiso extends AbstractModel
{
    public function save()
    {
        $sql = "INSERT INTO permisos (slug, description, empresa_id) VALUES (:slug, :description, :empresa_id)";
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':slug', $this->slug);
        $statement->bindValue(':description', $this->description);
        $statement->bindValue(':empresa_id', $this->empresa_id);
        $result = $statement->execute();
        return $result;
    }

    static function all()
    {
        return parent::allEntities('permisos', "App\Permiso");
    }

    static function delete($id)
    {
        return parent::deleteEntity('permisos', $id);
    }

    static function find($id)
    {
        return parent::findEntity('permisos', $id, "App\Permiso");
    }

    public function update()
    {
        $sql = "UPDATE permisos SET slug=:slug , description=:description ,empresa_id=:empresa_id WHERE id = :id";
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':id', $this->id);
        $statement->bindValue(':slug', $this->slug);
        $statement->bindValue(':description', $this->description);
        $statement->bindValue(':empresa_id', $this->empresa_id);
        $statement->execute();
        return $statement->rowCount();
    }
}
