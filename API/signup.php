
<?php
require("../COMMON/connect.php");
require("../CONTROLLER/Controller.php");

$database=new Database();

$conn=$database->connect();

$nome=null;
$cognome=null;
$email=null;
$password=null;

if(isset($_POST["nome"])&&$_POST["email"]&&$_POST["password"]){

    $nome=$_POST["nome"];
    $email=$_POST["email"];
    $password=$_POST["password"];
}


$controller=new Controller($conn);

$result=$controller->NewGiocatore($nome,$email,$password);


 header("Location: http://localhost/Fantacalcio_5/Pages/login.php");


?>

