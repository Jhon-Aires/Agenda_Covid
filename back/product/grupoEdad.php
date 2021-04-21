<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
error_reporting(0);
include_once '../config/database.php';
include_once '../objects/usuario.php';
include_once '../objects/agenda.php';

$database = new Database();
$db = $database->getConnection();

$groupCount = new usuario($db);
$groupCount->contarEdad();

$groupCount_arr = array(
  "primerEdad" => $groupCount->group1,
  "segundaEdad" => $groupCount->group2,
  "tercerEdad" => $groupCount->group3
);

http_response_code(200);
echo json_encode($groupCount_arr);
