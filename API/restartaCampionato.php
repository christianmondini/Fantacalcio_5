<?php 
require "../CONTROLLER/Controller.php";
require "..//COMMON/connect.php";

session_start();

$db=new Database();
$conn=$db->connect();

$controller=new Controller($conn);

$controller->RestartCampionato($_SESSION["id_lega"]);

$_SESSION["id_lega"]=null;

header("Location: http://localhost/Fantacalcio_5/Pages/Index.php");

?>