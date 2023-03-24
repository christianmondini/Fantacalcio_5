<?php
require "../COMMON/connect.php";
require "../CONTROLLER/Controller.php";


$db = new Database();

$conn = $db->connect();

$controller = new Controller($conn);

$result = $controller->Prendi_Avversari($_SESSION["id"], $_SESSION["id_lega"]);


$avversari = array();

while ($row = $result->fetch_assoc()) {
    array_push($avversari, $row);
}


unset($result);

$result = $controller->PrendiGiornateMancanti($_SESSION["id_lega"]);

$giornate = array();

while ($row = $result->fetch_assoc()) {
    array_push($giornate, $row);
}

unset($result);

$result = $controller->PrendiVincitore($_SESSION["id_lega"]);

$vincitore = $result->fetch_assoc();

$nome_vincitore = $vincitore["nome"];



?>


<?php if ($_SESSION["inizio_campionato"] == 1 && $giornate == null && $_SESSION["creatore"] == 0) : ?>
    <div class="row justify-content-center text-center">
        <h1>Il campionato è terminato il vincitore è</h1>
    </div>

    <div class="row justify-content-center text-center">
        <h1><b><?php echo ($nome_vincitore); ?></b></h1>
    </div>

    <div class="row justify-content-center text-center">
        <h1>Per rigiocare aspetta che il creatore della lega restrarti il campionato</h1>
    </div>

<?php elseif ($_SESSION["inizio_campionato"] == 1 && $giornate == null && $_SESSION["creatore"] == 1) : ?>
    <div class="row justify-content-center text-center">
        <h1>Il campionato è terminato il vincitore è</h1>
    </div>

    <div class="row justify-content-center text-center">
        <h1><b><?php echo ($nome_vincitore); ?></b></h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="card text-center" style="width: 25rem; margin-top:100px;">
                <div class="card-body">
                    <h5 class="card-title"><b>Vuoi restartare il campionato?</b></h5>
                    <h5 class="card-title">La tua prossima giornata è contro</h5>
                    <hr>
                    <a href="../API/restartaCampionato.php" class="btn btn-danger">Ricomincia</a>

                </div>
            </div>
        </div>
    </div>


<?php endif; ?>



<?php if ($_SESSION["inizio_campionato"] == 1 && $giornate != null) : ?>


    <div class="row justify-content-center text-center">
        <h1>Giornata</h1>
    </div>

    <hr>


    <?php if ($avversari == null) : ?>
        <div class="row justify-content-center text-center">
            <h1>Hai concluso le tue giornate</h1>
        </div>
    <?php elseif ($avversari != null) : ?>

        <div class="container">
            <div class="row justify-content-center">
                <div class="card text-center" style="width: 25rem; margin-top:100px;">
                    <div class="card-body">
                        <h5 class="card-title"><b>Vuoi calcolare la giornata?</b></h5>
                        <h5 class="card-title">La tua prossima giornata è contro</h5>
                        <h1><?php echo ($avversari[0]["nome_avversario"]); ?></h1>
                        <hr>
                        <form action="../API/calcolaGiornata.php" method="post">
                            <input type="hidden" name="id_avversario" value="<?php echo ($avversari[0]["id_avversario"]); ?>" />
                            <input type="hidden" name="id" value="<?php echo ($avversari[0]["id"]); ?>" />
                            <button class="btn btn-danger" type="submit">Calcola</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>


<?php elseif ($_SESSION["inizio_campionato"] == 0 && $_SESSION["creatore"] == 1&&$giornate==null) : ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="card text-center" style="width: 25rem; margin-top:100px;">
                <div class="card-body">
                    <h5 class="card-title"><b>Fai iniziare il campionato</b></h5>
                    <hr>
                    <a href="../API/inizioCampionato.php" class="btn btn-danger">Inizia</a>
                </div>
            </div>
        </div>
    </div>

<?php elseif ($_SESSION["inizio_campionato"] == 0 && $_SESSION["creatore"] == 0) : ?>

    <div class="row justify-content-center text-center">
        <h1>Il campionato non è ancora iniziato!</h1>
    </div>

    <br>

    <div class="row justify-content-center text-center">
        <h4>Questo inizierà solo quando il capolega deciderà di iniziarlo.</h4>
    </div>

<?php endif; ?>