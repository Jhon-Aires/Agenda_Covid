<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
error_reporting(0);
// include database and object files
include_once '../config/database.php';
include_once '../objects/usuario.php';
include_once '../objects/agenda.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$usuario = new usuario($db);

$data = json_decode(file_get_contents("php://input"));

$usuario->id_user = $data->id;
// read the details of product to be edited
$usuario->existenceVerify();

if ($usuario->id_user != null) {

  $usuario->telephoneExistence();

  if ($usuario->telephone != null) {
    $agenda = new agenda($db);
    $agenda->id_user = $data->id;
    $agenda->usuAgendVerify();

    if ($agenda->id_user == null) {
      $dateactual = date("Y-m-d");
      $date = date("Y-m-d", strtotime($dateactual . "+ 1 week"));
      $date1 = date("Y-m-d", strtotime($date . "+ 1 month"));

      $agenda = new agenda($db);
      $agenda->id_user = $usuario->id_user;
      $agenda->dateV1 = $date;
      $agenda->dateV2 = $date1;

      $agenda->agendar();
      http_response_code(200);

      echo json_encode(array("agendaCreada" => true));
    } else {
      echo json_encode(array("agendaCreada" => false));
    }
  } else {
    echo json_encode(array("agendaCreada" => "noTel"));
  }
} else {

  echo json_encode(array("agendaCreada" => "noUser"));
}
