<?php

class Departamento extends Conexion{

    public function get_departamento(){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT departamento.idDep, departamento.nombreDep, pais.nombrePais FROM departamento
            INNER JOIN departamento ON departamento.idPais = pais.idPais");
            $stm ->execute();
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        } 
    }

    public function get_departamento_id($departamento){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM departamento WHERE idDep = ?");
            $stm -> bindValue(1,$departamento);
            $stm-> execute();
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        } 
    }

    public function update_departamento($departamento,$nombre,$pais){
        try {
            $departamento = $_POST['id'];
            $nombre = $_POST['nombre'];
            $pais = $_POST['pais'];
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("UPDATE departamento SET nombreDep = ?, idDep = ? WHERE idDep = ?");
            $stm->bindValue(1,$nombre);
            $stm->bindValue(2,$pais);
            $stm->bindValue(3,$departamento);
            $stm -> execute();
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        }
    }

    public function insert_departamento($departamento,$nombre,$pais){
        try {
            $departamento = $_POST['id'];
            $nombre = $_POST['nombre'];
            $pais = $_POST['pais'];
            $conectar = parent::Conexion();
            parent::set_name();
            $stm="INSERT INTO departamento(idDep,nombreDep,idDep) VALUES(?,?,?)";
            $stm=$conectar->prepare($stm);
            $stm->bindValue(1,$departamento);
            $stm->bindValue(2,$nombre);
            $stm->bindValue(3,$pais);
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        } 
        
    }

    public function delete_departamento($departamento){
        try {
            $conectar = parent::Conexion();
            parent::set_name();
            $stm = $conectar->prepare("DELETE FROM departamento WHERE idDep = ?");
            $stm->bindValue(1,$departamento);
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        } 
    }


}

?>