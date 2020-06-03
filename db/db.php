<?php

$hostname="db";
$dbname="semana5";
$username="root";
$password="1234";
 
try {
    $db = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}