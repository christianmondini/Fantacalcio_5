<?php 

session_start();
unset($_SESSION["id"]);
unset($_SESSION["creatore"]);

header("Location: http://localhost/Fantacalcio_5/Pages/Index.php");
?>