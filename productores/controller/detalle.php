<?php 

    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Detalle.php");
    $detalle = new Detalle();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_SERVER["REQUEST_METHOD"]){

        case "GET":
            if (isset($_GET ["id"])) {

                $datos = $detalle->get_detalle_x_id($_GET["id"]);
                echo json_encode($datos);

            }else{
                $datos = $detalle->get_detalle();
                echo json_encode($datos);
            }

        break;
        

        case "POST":
            $datos = $detalle->insert_detalle($body["idProducto_id"], $body["idVenta_id"], $body["cantidad"], $body["precio"]);
            echo json_encode('Inserción Correcto');
        break;

        case "PUT":
            $datos = $detalle->update_detalle($body["idDetalle"],$body["idProducto_id"], $body["idVenta_id"], $body["cantidad"], $body["precio"]);
            echo json_encode('Update Correcto');
        break;

        case "DELETE":
            $datos = $detalle->delete_detalle($body["idDetalle"]);
            echo json_encode('Delete Correcto');
        break;
    }
?>