<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
error_reporting(0);
include_once '../config/database.php';
include_once '../objects/grupo.php';

$database = new Database();
$db = $database->getConnection();

$grupo = new grupo($db);

$grupo->cantidadGrupos();

$responsearr = array(
  "PersonalCTI" => $grupo->personalCti,
  "Hisopadores" => $grupo->hisopadores,
  "PersonalSaludGeneral" => $grupo->personalSalud,
  "PersonalEducacion" => $grupo->personalEducacion,
  "Bomberos" => $grupo->bomberos,
  "Policia" => $grupo->policia,
  "PersonalResidencia" => $grupo->personalResidencia
);
http_response_code(200);
echo json_encode($responsearr);
