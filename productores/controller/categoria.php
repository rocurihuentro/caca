<?php
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Categoria.php");
    $categoria = new Categoria();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_SERVER["REQUEST_METHOD"]){
        
        case "GET":
            if (isset($_GET["id"])) {
                $datos=$categoria->get_categoria_x_id($_GET["id"]);
                echo json_encode($datos); 
                  
              }else{
                   $datos=$categoria->get_categoria();
            	  echo json_encode($datos);
              }         
        break;


        case "POST":
            $datos=$categoria->insert_categoria($body["nombreCategoria"]);
            echo json_encode('Insercion Correcta');
        break;


        case "PUT":
            $datos=$categoria->update_categoria($body["idCategoria"],$body["nombreCategoria"]);
            echo json_encode("Update Correcto");
        break;


        case "DELETE":
            $datos=$categoria->delete_categoria($body["idCategoria"]);
            echo json_encode("Delete Correcto");
        break;
    }
?>
