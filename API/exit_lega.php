<?php 
require "../CONTROLLER/Controller.php";
require "../COMMON/connect.php";

session_start();

$db=new Database();
$conn=$db->connect();

$controller=new Controller($conn);

echo($_POST["id_lega"]);

?>