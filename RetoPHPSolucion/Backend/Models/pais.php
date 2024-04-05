<?php

class Pais extends Conexion{

    public function get_pais(){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT idPais, nombrePais FROM pais");
            $stm ->execute();
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        } 
    }

    public function get_pais_id($pais){
        try {
            
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM pais WHERE idPais = ?");
            $stm -> bindValue(1,$pais);
            $stm-> execute();
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        } 
    }

    public function update_pais($pais,$nombre){
        try {
            $pais = $_POST["id"];
            $nombre = $_POST["nombre"];
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("UPDATE pais SET nombrePais = ? WHERE idPais = ?");
            $stm->bindValue(1,$nombre);
            $stm->bindValue(2,$pais);
            $stm -> execute();
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        }
    }

    public function insert_pais($pais,$nombre){
        try {
            $departamento = $_POST['id'];
            $nombre = $_POST['nombre'];

            $conectar = parent::Conexion();
            parent::set_name();
            $stm="INSERT INTO pais(idPais,nombreReg) VALUES(?,?)";
            $stm=$conectar->prepare($stm);
            $stm->bindValue(1,$pais);
            $stm->bindValue(2,$nombre);
            $stm->bindValue(3);
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        } 
        
    }

    public function delete_pais($pais){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("DELETE FROM pais WHERE idPais = ?");
            $stm->bindValue(1,$pais);
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        } 
    }


}

?>