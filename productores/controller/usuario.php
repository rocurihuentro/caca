<?php

    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Usuario.php");
    $usuario = new Usuario();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_SERVER["REQUEST_METHOD"]){

        case "GET":
            if (isset($_GET["id"])){

                $datos = $usuario->get_usuario_x_id($_GET["id"]);
                echo json_encode($datos);

            }else{
                $datos = $usuario->get_usuario();
                echo json_encode($datos);
            }
        break;

        case "POST":
            $datos = $usuario->insert_usuario($body["nombre"], $body["correo"], $body["password"], $body["tipoUsuario"]);
            echo json_encode('Inserción Correcta');
        break;

        case "PUT":
            $datos = $usuario->update_usuario($body["nombre"], $body["correo"], $body["password"], $body["tipoUsuario"]);
            echo json_encode('Update Correcto');

        case "DELETE":
            $datos = $usuario->delete_usuario($body["idUsuario"]);
            echo json_encode("Delete Correcto");
        break;
    }
?>