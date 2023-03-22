<?php 
require "../CONTROLLER/Controller.php";
require "../COMMON/connect.php";

session_start();

$id_giornata=null;
$id_avversario=null;

if(isset($_POST["id"])&&isset($_POST["id_avversario"])){
    $id_giornata=$_POST["id"];
    $id_avversario=$_POST["id_avversario"];
}

echo($id_giornata);

$db=new Database();

$conn=$db->connect();

$controller=new Controller($conn);

$numero=$controller->Calcola_Giornata($id_giornata,$_SESSION["id"],$id_avversario,$_SESSION["id_lega"]);


header("Location: http://localhost/Fantacalcio_5/Pages/Index.php?page=7");


?>