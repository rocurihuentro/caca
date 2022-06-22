<?php
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Venta.php");
    $venta = new Venta();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_SERVER["REQUEST_METHOD"]){
        
        case "GET":
            if (isset($_GET["id"])){

                $datos = $venta->get_venta_x_id($_GET["id"]);
                echo json_encode($datos);

            }else{
                $datos = $venta->get_venta();
                echo json_encode($datos);
            }         
        break;


        case "POST":
            $datos = $venta->insert_venta($body["idUsuario_id"], $body["idSucursal_id"], $body["estado"],$body["montoTotal"], $body["direccion"]);
            echo json_encode('Inserción Correcta'); 
        break;


        case "PUT":
            $datos = $venta->update_venta($body["idVenta"],$body["idUsuario_id"], $body["idSucursal_id"], $body["estado"],$body["montoTotal"], $body["direccion"]);
            echo json_encode('Update Correcto');
        break;


        case "DELETE":
            $datos = $venta->delete_venta($body["idVenta"]);
            echo json_encode('Delete Correcto');
        break;
    }
?>