<?php 
require("../COMMON/connect.php");
require("../CONTROLLER/Controller.php");

session_start();



$email=null;
$password=null;

if(isset($_POST["email"]) && isset($_POST["password"])){
$email=$_POST["email"];
$password=$_POST["password"];
}



$database=new Database();

$conn=$database->connect();

$controller=new Controller($conn);

$result=$controller->getID($email,$password);

/*
$prova=$result->fetch_assoc();

print_r($prova["id"]);*/

if($result){
    
$id=$result->fetch_assoc();

$_SESSION["id"]=$id["id"];
}

if($_SESSION["id"]!=null){  
    echo($_SESSION["id"]);
    header("Location: http://localhost/Fantacalcio_5/Pages/Index.php");
}else{
    $_SESSION["prova"]=1;
    header("Location: http://localhost/Fantacalcio_5/Pages/login.php");
}


?>