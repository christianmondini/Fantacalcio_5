<?php 

session_start();
unset($_SESSION["id"]);

header("Location: http://localhost/Fantacalcio_5/Pages/Index.php");
?>