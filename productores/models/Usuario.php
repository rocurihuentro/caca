<?php
    class Usuario extends Conectar{

        public function get_usuario(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM core_usuario";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_usuario_x_id($idUsuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM core_usuario WHERE idUsuario = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idUsuario);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_usuario($nombre,$correo,$password,$tipoUsuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO core_usuario(idUsuario,nombre,correo,password,tipoUsuario) VALUES (NULL,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $correo);
            $sql->bindValue(3, $password);
            $sql->bindValue(4, $tipoUsuario);
            
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_usuario($idUsuario, $nombre, $correo, $password, $tipoUsuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE core_usuario set
                correo = ?,
                password = ?,
                tipoUsuario = ?,
                nombre =?
                WHERE
                idUsuario = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $correo);
            $sql->bindValue(3, $password);
            $sql->bindValue(4, $tipoUsuario);
            $sql->bindValue(5, $idUsuario);
            
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_usuario($idUsuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="Delete from core_usuario
                WHERE
                idUsuario = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idUsuario);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }






    }
?>