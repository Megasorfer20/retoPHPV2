<?php
header('Content-Type: application/json');
require_once('../Config/conexion.php');
require_once("../Models/camper.php");

$accionCamper = new Camper();

$body = json_decode(file_get_contents("php://input"),true);

switch ($_GET['op']){
    case 'GetAll':
        $datos = $accionCamper->get_camper();
        echo json_encode($datos);
        break;

    case 'GetId':
        $datos = $accionCamper->get_camper_id($body["id"]);
        echo json_encode($datos);
        
        break;
    
    case "insert":

        $datos=$accionCamper->insert_camper($body["id"], $body["nombre"], $body["apellido"], $body["nacimiento"], $body["region"]);
        echo json_encode("insertado correctamente");
        break;

    case "delete":
        $datos = $accionCamper->delete_camper($body["id"]);
        echo json_encode($datos);
        header("Location: http://localhost/PruebaPHP/retoPHPV2/RetoPHPSolucion/Frontend/campers");
        break;
    
}

?>