<?php 
require("../COMMON/connect.php");
require("../CONTROLLER/Controller.php");


$email=$_POST["email"];
$password=$_POST["password"];

/*
echo($email);
echo($password);*/

$database=new Database();

$conn=$database->connect();

$controller=new Controller($conn);

$result=$controller->getID($email,$password);

echo($result);

$id=$result->fetch_assoc();




session_start();
$SESSION["id"]=$id;

echo($SESSION["id"]);

?>