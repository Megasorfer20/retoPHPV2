<?php

class Region extends Conexion{

    public function get_Region(){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT region.idReg, region.nombreReg, departamento.nombreDep FROM region
            INNER JOIN region ON region.idReg = departamento.idDep");
            $stm ->execute();
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        } 
    }

    public function get_Region_id($region){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM region WHERE idReg = ?");
            $stm -> bindValue(1,$region);
            $stm-> execute();
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        } 
    }

    public function update_Region($region,$nombre,$departamento){
        try {
            $region = $_POST['id'];
            $nombre = $_POST['nombre'];
            $departamento = $_POST['dep'];
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("UPDATE region SET nombreReg = ?, idDep = ? WHERE idReg = ?");
            $stm->bindValue(1,$nombre);
            $stm->bindValue(2,$departamento);
            $stm->bindValue(3,$region);
            $stm -> execute();
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        }
    }

    public function insert_Region($region,$nombre,$departamento){
        try {
            $region = $_POST['id'];
            $nombre = $_POST['nombre'];
            $departamento = $_POST['dep'];
            $conectar = parent::Conexion();
            parent::set_name();
            $stm="INSERT INTO region(idReg,nombreReg,idDep) VALUES(?,?,?)";
            $stm=$conectar->prepare($stm);
            $stm->bindValue(1,$region);
            $stm->bindValue(2,$nombre);
            $stm->bindValue(3,$departamento);
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        }    
    }

    public function delete_Region($region){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("DELETE FROM region WHERE idReg = ?");
            $stm->bindValue(1,$region);
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        } 
    }

}

?>