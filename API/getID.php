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


$id=$result->fetch_assoc();

print_r($id);

if($id['id']==1){
    header('Location: http://localhost/Fantacalcio_5/Pages/navbar.php');
}

/*
session_start();
$SESSION["id"]=$id;

echo($SESSION["id"]);*/

?>