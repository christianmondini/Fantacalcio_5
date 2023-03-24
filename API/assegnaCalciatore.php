
<?php
require "../COMMON/connect.php";
require "../CONTROLLER/Controller.php";

session_start();

$_SESSION["possessore"]=null;

$nome_giocatore = null;
$nome_calciatore = null;
if (isset($_POST["nome_giocatore"]) && isset($_POST["nome_calciatore"])) {
    $nome_giocatore = $_POST["nome_giocatore"];
    $nome_calciatore = $_POST["nome_calciatore"];
}

$db = new Database();

$conn = $db->connect();

$controller = new Controller($conn);

$result = $controller->Get_ID_ByName_Calciatore($nome_calciatore);

$id_calciatore = $result;

unset($result);

$result = $controller->GetRicorrenzeCalciatore($_SESSION["id_lega"], $id_calciatore["id"]);

$giocatore = $result->fetch_assoc();

if ($giocatore != null) {
    $_SESSION["possessore"] = $giocatore["nome"];
    header("Location: http://localhost/Fantacalcio_5/Pages/Index.php?page=2");
} else {
    $controller->AssegnaCalciatore($nome_giocatore, $nome_calciatore, $_SESSION["id_lega"]);

    header("Location: http://localhost/Fantacalcio_5/Pages/Index.php?page=2");
}




?>