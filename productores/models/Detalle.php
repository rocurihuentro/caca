<?php
    class Detalle extends Conectar{
        public function get_detalle(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT d.idDetalle, p.nombreProducto, d.idVenta_id,d.cantidad,d.precio FROM core_detalle d left join core_producto p on d.idProducto_id = p.idProducto;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_detalle_x_id($idDetalle){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM core_detalle WHERE  idDetalle = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idDetalle);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_detalle($idProducto_id,$idVenta_id,$cantidad,$precio){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO core_detalle(idDetalle,idProducto_id,idVenta_id,cantidad,precio) VALUES (NULL,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idProducto_id);
            $sql->bindValue(2, $idVenta_id);
            $sql->bindValue(3, $cantidad);
            $sql->bindValue(4, $precio);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_detalle($idDetalle,$idProducto_id,$idVenta_id,$cantidad,$precio){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE core_detalle set
                idProducto_id=?,
                idVenta_id=?,
                cantidad=?,
                precio=?
                WHERE
                idDetalle = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idProducto_id);
            $sql->bindValue(2, $idVenta_id);
            $sql->bindValue(3, $cantidad);
            $sql->bindValue(4, $precio);
            $sql->bindValue(5, $idDetalle);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_detalle($idDetalle){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="Delete from core_usuario WHERE idDetalle = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idDetalle);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>