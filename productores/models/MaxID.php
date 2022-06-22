<?php
class MaxID extends Conectar{
        public function maxID(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT MAX(idVenta) as idVentaD FROM core_venta ;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
       
       

    }
    ?>