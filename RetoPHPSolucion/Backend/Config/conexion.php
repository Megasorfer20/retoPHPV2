<?php

abstract class Conexion{

    protected $db;
    private $host = "localhost";
    private $dbName = "campuslands";
    private $user = "root";
    private $password = "";

    public function Conexion(){
        try {
            $conection = $this->db = new PDO("mysql:local=".$this->host.";dbname=".$this->dbName,$this->user,$this->password,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
            return $conection;
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
            die();
        } 
    }

    public function set_name(){
        return $this->db->query("SET NAMES 'utf8'");
    }

}

?>