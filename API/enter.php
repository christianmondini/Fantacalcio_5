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

header("Location: http://localhost/Fantacalcio_5/Pages/");

?>