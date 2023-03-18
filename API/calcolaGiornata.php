<?php 
require "../CONTROLLER/Controller.php";
require "../COMMON/connect.php";

session_start();

$id_giornata=null;

if(isset($_POST["id"])){
    $id_giornata=$_POST["id"];
}

echo($id_giornata);

$db=new Database();

$conn=$db->connect();

$controller=new Controller($conn);

$numero=$controller->Calcola_Giornata($id_giornata);


header("Location: http://localhost/Fantacalcio_5/Pages/Index.php?page=7");


?>