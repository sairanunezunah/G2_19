<?php
    /*if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS'){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        die();
    }
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');*/
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        //header('Access-Control-Allow-Origin: http://127.0.0.1:5500');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
      }
    //header('Access-Control-Allow-Origin: *');  
    header('Content-Type: application/json');



     /*   header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Allow: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS") {
            die();
        }*/
        /*header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    */

    require_once("../config/conexionLocal.php");
    require_once("../models/SociosLocal.php");
    $socios = new Socios();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){
        case "GetSocios":
            $datos=$socios->get_socios();
            echo json_encode($datos);
        break;

        case "GetUno":
            $datos=$socios->get_socio($body["ID"]);
            echo json_encode($datos);
        break;

        case "InsertSocio":
            $datos=$socios->insert_socio($body["NOMBRE"],$body["RAZON_SOCIAL"],$body["DIRECCION"],$body["TIPO_SOCIO"],$body["CONTACTO"],$body["EMAIL"],$body["FECHA_CREADO"],$body["ESTADO"],$body["TELEFONO"]);
            echo json_encode("Socio agregado");
        break;

        case "DeleteSocio":
            $datos=$socios->deletesocio($body["ID"]);
            echo json_encode("Socio Eliminado");
        break;

        case "UpdateSocio":
            //$datos=$socios->update_socio($body["ID"],$body["NOMBRE"]);
            //$datos=$socios->update_socio($body["ID"],$body["NOMBRE"]);
            $datos=$socios->update_socio($body["NOMBRE"],$body["RAZON_SOCIAL"],$body["DIRECCION"],$body["TIPO_SOCIO"],$body["CONTACTO"],$body["EMAIL"],$body["FECHA_CREADO"],$body["ESTADO"],$body["TELEFONO"],$body["ID"]);
            echo json_encode("Socio Actualizado");
        break;
    }
?>