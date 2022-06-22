<?php
    class Producto extends Conectar{
        public function get_producto(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT p.idProducto,p.nombreProducto,p.marca,p.stock,p.subCategoria,p.descripcion,p.imagen, c.nombreCategoria,p.precios FROM core_producto p left join core_categoria c on p.idCategoria_id = c.idCategoria;";
            $sql = $conectar->prepare($sql);
            $sql->execute();

            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_producto_x_id($idProducto){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM core_producto WHERE idProducto = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $idProducto);
            $sql->execute();

            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_producto($nombreProducto, $marca, $stock, $subCategoria, $descripcion, $imagen, $idCategoria_id,$precios){
            $conectar= parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO core_producto(idProducto, nombreProducto, marca, stock, subCategoria, descripcion, imagen, idCategoria_id,precios) VALUES (NULL,?, ?, ?, ?, ?, ?, ?,?);";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $nombreProducto);
            $sql->bindValue(2, $marca);
            $sql->bindValue(3, $stock);
            $sql->bindValue(4, $subCategoria);
            $sql->bindValue(5, $descripcion);
            $sql->bindValue(6, $imagen);
            $sql->bindValue(7, $idCategoria_id);
            $sql->bindValue(8,$precios);
            $sql->execute();

            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }


        public function update_producto($idProducto, $nombreProducto, $marca, $stock, $subCategoria, $descripcion, $imagen, $idCategoria_id,$precios){
            $conectar = PARENT::conexion();
            PARENT::set_names();
            $sql = "UPDATE core_producto SET
                nombreProducto = ?,
                marca = ?,
                stock = ?,
                subCategoria = ?,
                descripcion = ?,
                imagen = ?,
                idCategoria_id = ?,
                precios = ?,
                WHERE
                idProducto = ?;";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $nombreProducto);
            $sql->bindValue(2, $marca);
            $sql->bindValue(3, $stock);
            $sql->bindValue(4, $subCategoria);
            $sql->bindValue(5, $descripcion);
            $sql->bindValue(6, $imagen);
            $sql->bindValue(7, $idCategoria_id);
            $sql->bindValue(8, $precios);
            $sql->bindValue(9, $idProducto);
            $sql->execute();
            
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_producto($idProducto){
            $conectar = PARENT::conexion();
            PARENT::set_names();
            $sql = "DELETE FROM core_producto
                WHERE
                idProducto = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $idProducto);
            $sql->execute();

            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>