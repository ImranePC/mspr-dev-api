<?php

namespace App\Dao;

abstract class MainDao
{
    public $conn;

    public function __construct() {
        try {
            $conn = new \PDO("mysql:host=mysql2.montpellier.epsi.fr:5306;dbname=msprdev", "compte", "password");
            $conn->exec("SET CHARACTER SET utf8");
            $this->conn = $conn;
        } catch (\PDOException $e) {
            echo "ERROR : " . $e->getMessage();
            return null;
        }
    }
}
