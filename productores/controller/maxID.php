<?php 
    header('Content-Type: application/json');
    require_once("../config/conexion.php");
    require_once("../models/MaxID.php");
    $maxID = new MaxID();
    $body = json_decode(file_get_contents("php://input"), true);

    switch($_SERVER["REQUEST_METHOD"]){

        case "GET":
            $datos = $maxID->maxID();
            echo json_encode($datos);
        break;    
    }
?>