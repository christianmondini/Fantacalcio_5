<?php 

session_start();

$_SESSION["id_lega"]=null;
$_SESSION["creatore"]=0;
$_SESSION["inizio_campionato"]=0;

header("Location:http://localhost/Fantacalcio_5/Pages/");

?>