
<?php

include_once dirname(__FILE__) . '/../../COMMON/connect.php';
include_once dirname(__FILE__) . '/../../CONTROLLER/Fantacalcio.php';

$database = new Database();
$db = $database->connect();

$data = json_decode(file_get_contents("php://input"));

if (empty($data) || empty($data->nome_giocatore)) {
    http_response_code(400);
    die(json_encode(array("Message" => "Bad request")));
}

$allergen = new Fantacalcio($db);

if ($allergen->NewGiocatore($data->name) > 0) {
    http_response_code(201);
    echo json_encode(array("Message" => "Created"));
}
?>