<?php 
require("../COMMON/connect.php");
require("../CONTROLLER/Controller.php");


session_start();

$database=new Database();

$conn=$database->connect();

$controller=new Controller($conn);

$result=$controller->Inizia_Campionato($_SESSION["id_lega"]);

$lega=$result->fetch_assoc();

$inizio_campionato=$lega["campionato_iniziato"];


$_SESSION["inizio_campionato"]=$inizio_campionato;

header("Location: http://localhost/Fantacalcio_5/Pages/Index.php?page=7");

?>