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

$result=$controller->Delete_lega($_SESSION["id"],$id_lega);
/*
echo($_POST["id_lega"]);
echo($_SESSION["id"]);*/

    //header("Location: http://localhost/Fantacalcio_5/Pages/Index.php");


?>