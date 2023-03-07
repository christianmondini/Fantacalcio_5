
<?php

include '../COMMON/connect.php';
require("../CONTROLLER/Controller.php");



//$data = json_decode(file_get_contents("php://input"));
$nome=$_GET["nome"];
$email=$_GET["email"];
$password=$_GET["password"];

$database = new Database();

$db = $database->connect();

/*
if (empty($data) || empty($data->nome_giocatore)) {
    http_response_code(400);
    die(json_encode(array("Message" => "Bad request")));
}*/

$controller = new Controller($db);

$result=$controller->NewGiocatore($nome,$email,$password);

$oki=$result->fetch_assoc();

print_r($oki);

/*
if ($allergen->NewGiocatore($data->name) > 0) {
    http_response_code(201);
    echo json_encode(array("Message" => "Created"));
}*/
?>