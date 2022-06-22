<?php
    class Categoria extends Conectar{
        public function get_categoria(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM core_categoria";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_categoria_x_id($idCategoria){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM core_categoria WHERE  idCategoria = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idCategoria);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_categoria($nombreCategoria){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO core_categoria(idCategoria,nombreCategoria) VALUES (NULL,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombreCategoria);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_categoria($idCategoria,$nombreCategoria){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE core_categoria set
                nombreCategoria = ?
                WHERE
                idCategoria = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombreCategoria);
            $sql->bindValue(2, $idCategoria);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_categoria($idCategoria){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="Delete from core_categoria WHERE idCategoria = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idCategoria);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>