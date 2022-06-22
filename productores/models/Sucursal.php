<?php
    class Sucursal extends Conectar{
        public function get_sucursal(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM core_sucursal";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_sucursal_x_id($idSucursal){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM core_sucursal WHERE idSucursal = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idSucursal);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_sucursal($nombre,$direccion){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO core_sucursal(idSucursal, nombre, direccion) VALUES (NULL,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $direccion);
            
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_sucursal($idSucursal,$nombre,$direccion){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE core_sucursal set
                nombre =?,
                direccion = ?,
                WHERE
                idSucursal = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $direccion);
            $sql->bindValue(3, $idSucursal);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_sucursal($idSucursal){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="Delete from core_sucursal
                WHERE
                idSucursal = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idSucursal);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>