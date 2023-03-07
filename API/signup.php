
<?php
require("../COMMON/connect.php");
require("../CONTROLLER/Controller.php");

$database=new Database();

$conn=$database->connect();

$nome=$_GET["nome"];
$email=$_GET["email"];
$password=$_GET["password"];


$controller=new Controller($conn);

$result=$controller->NewGiocatore($nome,$email,$password);

$oki=$result->fetch_assoc();

print_r($result);

?>

