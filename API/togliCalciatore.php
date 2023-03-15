
<?php
require "../COMMON/connect.php";
require "../CONTROLLER/Controller.php";

session_start();

$nome_giocatore=null;
$nome_calciatore=null;
if(isset($_POST["nome_giocatore"])&&isset($_POST["nome_calciatore"])){
$nome_giocatore=$_POST["nome_giocatore"];
$nome_calciatore=$_POST["nome_calciatore"];
}

$db=new Database();

$conn=$db->connect();

$controller=new Controller($conn);

$controller->TogliCalciatore($nome_giocatore,$nome_calciatore,$_SESSION["id_lega"]);

header("Location: http://localhost/Fantacalcio_5/Pages/Index.php?page=2");


?>