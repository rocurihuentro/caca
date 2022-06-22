<?php
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Sucursal.php");
    $sucursal = new Sucursal();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_SERVER["REQUEST_METHOD"]){
        
        case "GET":
            if (isset($_GET["id"])) {
                $datos=$sucursal->get_sucursal_x_id($_GET["id"]);
                echo json_encode($datos);
                  
              }else{
                   $datos=$sucursal->get_sucursal();
            	   echo json_encode($datos);
              }
        break;


        case "POST":
            $datos=$sucursal->insert_sucursal($body["nombre"],$body["direccion"]);
            echo json_encode('Insercion Correcta');
        break;


        case "PUT":
            $datos=$sucursal->update_sucursal($body["idSucursal"],$body["nombre"],$body["direccion"]);
            echo json_encode("Update Correcto");
        break;


        case "DELETE":
            $datos=$sucursal->delete_sucursal($body["idSucursal"]);
            echo json_encode("Delete Correcto");
        break;
    }
?>