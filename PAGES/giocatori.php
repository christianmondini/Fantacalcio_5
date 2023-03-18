<?php

require("../COMMON/connect.php");
require("../CONTROLLER/Controller.php");

$database = new Database();

$conn = $database->connect();

$controller = new Controller($conn);

$result = $controller->Get_Partecipanti($_SESSION["id_lega"]);

$giocatori = array();

while ($row = $result->fetch_assoc()) {
  array_push($giocatori, $row);
}

?>

<div class="row text-center">
  <h1>I Partecipanti della lega</h1>
</div>


<?php if ($giocatori[0] == null) : ?>
  <h1>Non hai ancora compagni</h1>
<?php endif; ?>


<?php if ($giocatori[0] != null) : ?>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($giocatori as $giocatore) : ?>
        <tr>
          <td><?php echo ($giocatore["id_giocatore"]) ?></td>
          <td><?php echo ($giocatore["nome_giocatore"]) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

<?php endif; ?>