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

$usuario = new usuario($db);

$data = json_decode(file_get_contents("php://input"));

$usuario->id_user = $data->id;
$usuario->telephone = $data->telephone;

$usuario->addTelephone();
echo json_encode(array("telefonoCreado"=>true));