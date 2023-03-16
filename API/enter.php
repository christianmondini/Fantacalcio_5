<?php 
require "../COMMON/connect.php";
require "../CONTROLLER/Controller.php";

session_start();

$id_lega=null;
if(isset($_POST["id_lega"])){
$id_lega=$_POST["id_lega"];
}

$db=new Database();

$conn=$db->connect();

$controller=new Controller($conn);

$_SESSION["id_lega"]=$id_lega;



$creatore=$controller->Get_Creatore($_SESSION["id"],$_SESSION["id_lega"]);

$giocatore=$creatore->fetch_assoc();

$_SESSION["creatore"]=$giocatore["creatore"];


$result=$controller->Get_Inizio_Campionato($_SESSION["id_lega"]);

$lega=$result->fetch_assoc();

$_SESSION["inizio_campionato"]=$lega["campionato_iniziato"];


header("Location: http://localhost/Fantacalcio_5/Pages/Index.php?page=2");

?>