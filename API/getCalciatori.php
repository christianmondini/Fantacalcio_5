<?php 

require("../COMMON/connect.php");
require("../CONTROLLER/Controller.php");

$database=new Database();

$conn=$database->connect();

$controller=new Controller($conn);

$result=$controller->Get_calciatori();

//$controller->ShowData($result);
$calciatori=$controller->ReturnData($result);

print_r($calciatori[0]);

?>