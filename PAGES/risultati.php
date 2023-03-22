<?php
require "../COMMON/connect.php";
require "../CONTROLLER/Controller.php";

$db = new Database();

$conn = $db->connect();

$controller = new Controller($conn);

$result = $controller->Prendi_Risultati($_SESSION["id"], $_SESSION["id_lega"]);

$avversari = array();

while ($row = $result->fetch_assoc()) {
  array_push($avversari, $row);
}

?>

<div class="row justify-content-center text-center">
  <h1>Risultati</h1>
</div>


<?php if ($avversari == null) : ?>

  <div class="row justify-content-center text-center">
    <h1>Non hai ancora giocato delle partite</h1>
  </div>

<?php endif; ?>
<?php if ($avversari != null) : ?>


  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($avversari as $avversario) : ?>
        <tr>
          <td><?php echo ($avversario["nome_avversario"]); ?></td>
          <td><?php if ($avversario["risultato"] == 1) {
                echo ("Hai vinto");
              } elseif ($avversario["risultato"] == 2) {
                echo ("Hai pareggiato");
              } elseif ($avversario["risultato"] == 3) {
                echo ("Hai perso");
              } ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

<?php endif; ?>