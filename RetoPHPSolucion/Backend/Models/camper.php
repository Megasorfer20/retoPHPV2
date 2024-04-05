<?php

class Camper extends Conexion{

    public function get_camper(){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT campers.idCamper, campers.nombreCamper, campers.apellidoCamper,campers.fechaNac, region.nombreReg FROM campers
            INNER JOIN region ON campers.idReg = region.idReg");
            $stm ->execute();
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        } 
    }

    public function get_camper_id($id){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM campers WHERE idCamper = ?");
            $stm -> bindValue(1,$id);
            $stm-> execute();
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        } 
    }

    public function update_camper($id,$nombre,$apellido,$nacimiento,$region){
        try {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $nacimiento = $_POST['nacimiento'];
            $region = $_POST['region'];
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("UPDATE campers SET nombreCamper = ?, apellidoCamper = ?, fechaNac = ?, idReg = ? WHERE idCamper = ?");
            $stm->bindValue(1,$nombre);
            $stm->bindValue(2,$apellido);
            $stm->bindValue(3,$nacimiento);
            $stm->bindValue(4,$region);
            $stm->bindValue(5,$id);
            $stm -> execute();
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        }
    }

    public function insert_camper($id,$nombre,$apellido,$nacimiento,$region){
        try {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $nacimiento = $_POST['nacimiento'];
            $region = $_POST['region'];
            $conectar = parent::Conexion();
            parent::set_name();
            $stm="INSERT INTO campers(idCamper,nombreCamper,apellidoCamper,fechaNac,idReg) VALUES(?,?,?,?,?)";
            $stm=$conectar->prepare($stm);
            $stm->bindValue(1,$id);
            $stm->bindValue(2,$nombre);
            $stm->bindValue(3,$apellido);
            $stm->bindValue(4,$nacimiento);
            $stm->bindValue(5,$region);
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        } 
        
    }

    public function delete_camper($id){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("DELETE FROM campers WHERE idCamper = ?");
            $stm->bindValue(1,$id);
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        } 
    }


}

?>