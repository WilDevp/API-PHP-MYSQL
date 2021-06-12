<?php

require_once '../Test/API/api.php';
require_once '../Test/API/getUserId.php';
//echo "informacion: ".file_get_contents('php://input');
header("Content-Type: JSON");

switch ($_SERVER['REQUEST_METHOD']) {

    case 'POST': //SAVE
        $_POST = json_decode(file_get_contents('php://input'), true);
        $client  = new Usuario($_POST["nombre"], $_POST["apellido"], $_POST["correo"], $_POST["empresa"]);
        $client->saveClient();
        /* $resultado["mensaje"] = "Guardar usuario, informacion" . json_encode($_POST);
        echo json_encode($resultado); */
        http_response_code(201);
        break;

    case 'GET':
        if(!isset($_GET['id'])){
            $respuesta = new getUserId($_GET['id'] = null);
            $conexion = new conexion();
            $resultado = mysqli_query($conexion->ConexionDB(), $respuesta->query());
            while ($rows = mysqli_fetch_assoc($resultado)) {
                header("Content-Type: JSON");
                $userData = $rows;
                echo json_encode($userData, JSON_PRETTY_PRINT);
            }
        }else{
            $respuesta = new getUserId($_GET['id']);
            $conexion = new conexion();
            $resultado = mysqli_query($conexion->ConexionDB(), $respuesta->queryId());
            while ($rows = mysqli_fetch_assoc($resultado)) {
                header("Content-Type: JSON");
                $userData = $rows;
                echo json_encode($userData, JSON_PRETTY_PRINT);
            }
        }
        break;

    case 'PUT':
        $_PUT = json_decode(file_get_contents('php://input'), true);
        $resultado["mensaje"] = "Actualizar user con el id: " . $_GET['id'] .
            ", info a actualizar: " . json_encode($_PUT);
        echo json_encode($resultado);
        break;

    case 'DELETE':
        $resultado["mensaje"] = "ELiminar un usuario con el id: " . $_GET['id'];
        break;
    default:
        echo "Metodo no permitido";
}
