<?php
    class Venta extends Conectar{
        public function get_venta(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT v.idVenta,v.montoTotal,v.estado, s.nombre FROM core_venta v left join core_sucursal s on v.idSucursal_id = s.idSucursal;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_venta_x_id($idVenta){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM core_venta WHERE  idVenta = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idVenta);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_venta($idUsuario_id,$idSucursal_id,$estado,$montoTotal,$direccion){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO core_venta(idVenta,idUsuario_id,idSucursal_id,estado,montoTotal,direccion) VALUES (NULL,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idUsuario_id);
            $sql->bindValue(2, $idSucursal_id);
            $sql->bindValue(3, $estado);
            $sql->bindValue(4, $montoTotal);
            $sql->bindValue(5, $direccion);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_venta($idVenta,$idUsuario_id,$idSucursal_id,$estado,$montoTotal,$direccion){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE core_venta set
                idUsuario_id=?,
                idSucursal_id=?,
                estado=?,
                montoTotal=?,
                direccion=?
                WHERE
                idVenta = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idUsuario_id);
            $sql->bindValue(2, $idSucursal_id);
            $sql->bindValue(3, $estado);
            $sql->bindValue(4, $montoTotal);
            $sql->bindValue(5, $direccion);
            $sql->bindValue(6, $idVenta);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_venta($idVenta){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="Delete from core_venta WHERE idVenta = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idVenta);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>