<?php

namespace App;

use App\AbstractModel;

class Usuario extends AbstractModel
{
    public function save()
    {
        $sql = "INSERT INTO usuarios (username, password, empresa_id) VALUES (:username, :password, :empresa_id)";
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':username', $this->username);
        $statement->bindValue(':password', $this->password);
        $statement->bindValue(':empresa_id', $this->empresa_id);
        $result = $statement->execute();
        $this->saveIntermediate($this->db->lastInsertId(), $this->permisos);
        return $result;
    }

    function saveIntermediate($usuario_id, $permisos)
    {
        foreach ($permisos as $permiso) { // Si selecciona muchos permisos para un usuario
            $sql = "INSERT INTO usuarios_permisos (usuario_id, permiso_id) VALUES (:usuario_id, :permiso_id)";
            $statement = $this->db->prepare($sql);
            $statement->bindValue(':usuario_id', $usuario_id);
            $statement->bindValue(':permiso_id', $permiso);
            $statement->execute();
        }
        return;
    }

    //El actualizar consiste en eliminar el grupo existente y guardar el nuevo
    function updateIntermediate($usuario_id, $permisos)
    {
        $this->db->exec("DELETE FROM usuarios_permisos WHERE usuario_id=$usuario_id");
        $this->saveIntermediate($usuario_id, $permisos);
        return;
    }

    public function update()
    {
        $sql = "UPDATE usuarios SET username=:username , password=:password, empresa_id=:empresa_id WHERE id = :id";
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':id', $this->id);
        $statement->bindValue(':username', $this->username);
        $statement->bindValue(':password', $this->password);
        $statement->bindValue(':empresa_id', $this->empresa_id);
        $statement->execute();
        $this->updateIntermediate($this->id, $this->permisos);
        return $statement->rowCount();
    }

    static function all()
    {
        return parent::allEntities('usuarios', "App\Usuario");
    }

    static function delete($id)
    {
        $pdo = parent::connection();
        $pdo->exec("DELETE FROM usuarios_permisos WHERE usuario_id=$id");
        return parent::deleteEntity('usuarios', $id);
    }

    static function find($id)
    {
        return parent::findEntity('usuarios', $id, "App\Usuario");
    }

    static function findByUsername($username)
    {
        $sql = "SELECT * FROM usuarios WHERE username='$username'";
        return parent::customFind($sql, 'App\Usuario');
    }
}
