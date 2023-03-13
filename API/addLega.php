<?php 
require "../COMMON/connect.php";
require "../CONTROLLER/Controller.php";

session_start();

$nome_lega=null;
if(isset($_POST["nome_lega"])){
$nome_lega=$_POST["nome_lega"];
}

$db=new Database();

$conn=$db->connect();

$controller=new Controller($conn);

$controller->Add_Lega($_SESSION["id"],$nome_lega);

header("Location: http://localhost/Fantacalcio_5/Pages/");

?>