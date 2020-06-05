<?php

namespace App;

abstract class AbstractModel
{
    protected $db;
    function __construct()
    {
        $hostname = "db";
        $dbname = "semana5";
        $username = "root";
        $password = "1234";
        try {
            $this->db = new \PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
        } catch (\PDOException $pe) {
            die("Could not connect to the database $dbname :" . $pe->getMessage());
        }
    }
    abstract protected function save();

    static function connection()
    {
        $hostname = "db";
        $dbname = "semana5";
        $username = "root";
        $password = "1234";
        try {
            $pdo = new \PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
        } catch (\PDOException $pe) {
            die("Could not connect to the database $dbname :" . $pe->getMessage());
        }
        return $pdo;
    }

    static function allEntities($table, $class)
    {
        $pdo = AbstractModel::connection();
        $stmt = $pdo->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    static function deleteEntity($table, $id)
    {
        $pdo = AbstractModel::connection();
        $stmt = $pdo->prepare("DELETE FROM $table WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }

    static function findEntity($table, $id, $class)
    {
        $pdo = AbstractModel::connection();
        $stmt = $pdo->prepare("SELECT * FROM $table WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $row = $stmt->execute();
        return $stmt->fetchObject($class);
    }

    static function customFind($sql, $class)
    {
        $pdo = AbstractModel::connection();
        $stmt = $pdo->prepare($sql);
        $row = $stmt->execute();
        return $stmt->fetchObject($class);
    }
}
