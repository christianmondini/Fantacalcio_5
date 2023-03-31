<?php

require("../COMMON/connect.php");
require("../CONTROLLER/Controller.php");

$database = new Database();

$conn = $database->connect();

$controller = new Controller($conn);

$result = $controller->Get_Calciatori_Utente($_SESSION["id"], $_SESSION["id_lega"]);

$giocatori = array();

while ($row = $result->fetch_assoc()) {
  array_push($giocatori, $row);
}




?>

<div class="row text-center">
  <h1>Ecco i tuoi giocatori</h1>
</div>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Ruolo</th>
      <th scope="col">Squadra</th>
      <th scope="col">Valore</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($giocatori as $giocatore) : ?>
      <tr>
        <td><?php echo ($giocatore["nome"]) ?></td>
        <td><?php if ($giocatore["ruolo"] == "P") : ?>
            <h2 style="color:blue;"><?php echo ($giocatore["ruolo"]) ?></h2>
          <?php elseif ($giocatore["ruolo"] == "D") : ?>
            <h2 style="color:green;"><?php echo ($giocatore["ruolo"]) ?></h2>
          <?php elseif ($giocatore["ruolo"] == "C") : ?>
            <h2 style="color:orange;"><?php echo ($giocatore["ruolo"]) ?></h2>
          <?php elseif ($giocatore["ruolo"] == "A") : ?>
            <h2 style="color:red;"><?php echo ($giocatore["ruolo"]) ?></h2>
          <?php endif; ?>
        </td>
        <td><?php echo ($giocatore["squadra"]) ?></td>
        <td><?php echo ($giocatore["valore"]) ?> crediti</td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>