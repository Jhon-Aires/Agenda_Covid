<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
error_reporting(0);
include_once '../config/database.php';
include_once '../objects/agenda.php';

$database = new Database();
$db = $database->getConnection();

$agenda = new agenda($db);

$data = json_decode(file_get_contents("php://input"));

$agenda->id_user = $data->id;
$agenda->consultar();

if ($agenda->id_user != null) {
  $eliminated = $agenda->borrar();
  echo json_encode(array("eliminado" => $eliminated));
}else {
  echo json_encode(array("eliminado" => false));
}
