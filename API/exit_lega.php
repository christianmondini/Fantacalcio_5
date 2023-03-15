<?php 
require "../CONTROLLER/Controller.php";
require "../COMMON/connect.php";

$id_lega=null;

if(isset($_POST["id_lega"])){
$id_lega=$_POST["id_lega"];
}

session_start();

$db=new Database();
$conn=$db->connect();

$controller=new Controller($conn);

$result=$controller->Exit_lega($_SESSION["id"],$id_lega);

header("Location: http://localhost/Fantacalcio_5/Pages/Index.php");


?>