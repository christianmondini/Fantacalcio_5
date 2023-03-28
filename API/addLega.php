<?php
require "../COMMON/connect.php";
require "../CONTROLLER/Controller.php";

session_start();

$nome_lega = null;

if ($_POST["nome_lega"]) {

    $nome_lega = $_POST["nome_lega"];
    
    $_SESSION["vuoto"] = 0;

    $db = new Database();

    $conn = $db->connect();

    $controller = new Controller($conn);

    $controller->Add_Lega($_SESSION["id"], $nome_lega);

    header("Location: http://localhost/Fantacalcio_5/Pages/");

} else {

    $_SESSION["vuoto"] = 1;
    header("Location: http://localhost/Fantacalcio_5/Pages/");
}
