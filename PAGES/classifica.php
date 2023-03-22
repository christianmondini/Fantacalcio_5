<?php
require "../COMMON/connect.php";
require "../CONTROLLER/Controller.php";

$db = new Database();

$conn = $db->connect();

$controller = new Controller($conn);

$result = $controller->Prendi_Classifica($_SESSION["id_lega"]);

$giocatori = array();

while ($row = $result->fetch_assoc()) {
  array_push($giocatori, $row);
}

unset($result);

$result=$controller->Get_Inizio_Campionato($_SESSION["id_lega"]);

$inizio=$result->fetch_assoc();

//print_r($inizio["campionato_iniziato"]);

?>

<div class="row justify-content-center text-center">
  <h1>Classifica</h1>
</div>




<?php if ($inizio["campionato_iniziato"] !=1) : ?>

  <div class="row justify-content-center text-center">
    <h1>Non  c'e una classifica perchè il campionato deve ancora iniziare</h1>
  </div>

<?php endif; ?>


<?php if ($giocatori != null) : ?>


  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Punti</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($giocatori as $giocatore) : ?>
        <tr>
          <td><?php echo ($giocatore["giocatore"]); ?></td>
          <td><?php echo($giocatore["punti"]);?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

<?php endif; ?>