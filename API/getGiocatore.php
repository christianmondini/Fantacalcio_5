<?php 
require("../COMMON/connect.php");
require("../CONTROLLER/Controller.php");

$database=new Database();

$conn=$database->connect();

$id=$_GET["id"];

$controller=new Controller($conn);

$result=$controller->Get_giocatore($id);

$giocatore=$result->fetch_assoc();

print_r($giocatore["nome"]);


?>