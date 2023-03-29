<?php
require("../COMMON/connect.php");
require("../CONTROLLER/Controller.php");


session_start();

$database = new Database();

$conn = $database->connect();

$controller = new Controller($conn);

$result = $controller->Get_Partecipanti($_SESSION["id_lega"]);

$giocatori = array();

while ($row = $result->fetch_assoc()) {
    array_push($giocatori, $row);
}


$giocatori_insufficenti = 0;

//CONTROLLO CHI NON HA ABBASTANZA CALCIATORI
foreach ($giocatori as $giocatore) {

    $result=$controller->Get_Attaccanti($giocatore["id_giocatore"],$_SESSION["id_lega"]);

    $result = $controller->ControllaNumeroCalciatori($giocatore["id_giocatore"], $_SESSION["id_lega"]);

    if($result==0){
        $giocatori_insufficenti++;
    }

}


unset($result);



if ($giocatori_insufficenti == 0) {

    $result = $controller->Inizia_Campionato($_SESSION["id_lega"]);

    $lega = $result->fetch_assoc();


    $_SESSION["inizio_campionato"] = $lega["campionato_iniziato"];

    header("Location: http://localhost/Fantacalcio_5/Pages/Index.php?page=7");
} else {
    $_SESSION["calciatori_insufficienti"] = 1;
    header("Location: http://localhost/Fantacalcio_5/Pages/Index.php?page=7");
}


?>
