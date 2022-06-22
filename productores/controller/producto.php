<?php 

    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Producto.php");
    $producto = new Producto();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_SERVER["REQUEST_METHOD"]){

        case "GET":
            if (isset($_GET ["id"])) {

                $datos = $producto->get_producto_x_id($_GET["id"]);
                echo json_encode($datos);

            }else{
                $datos = $producto->get_producto();
                echo json_encode($datos);
            }

        break;

        case "POST":
            $datos = $producto->insert_producto($body["nombreProducto"], $body["marca"], $body["stock"], $body["subCategoria"], $body["descripcion"], $body["imagen"], $body["idCategoria_id"],$body["precios"]);
            echo json_encode('Inserción Correcta');
        break;

        case "PUT":
            $datos = $producto->update_producto($body["nombreProducto"], $body["marca"], $body["stock"], $body["subCategoria"], $body["descripcion"], $body["imagen"], $body["idCategoria_id"],$body["precios"]);
            echo json_encode('Update Correcto');
        break;

        case "DELETE":
            $datos = $producto->delete_producto($body["idProducto"]);
            echo json_encode('Delete Correcto');
        break;
    }
?>