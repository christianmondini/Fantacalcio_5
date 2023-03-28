<?php
require "../COMMON/connect.php";
require "../CONTROLLER/Controller.php";


$db = new Database();
$conn = $db->connect();

$controller = new Controller($conn);

$result = $controller->getLeghe($_SESSION["id"]);

$leghe = array();

while ($row = $result->fetch_assoc()) {
  array_push($leghe, $row);
}


?>


<?php if($_SESSION["vuoto"]==1):?>
<div class="row text-center">
    <h1 style="color:red;">Devi dare un nome alla tua lega</h1>
</div>

<?php endif;?>



<div class="row text-center">
  <h1>Le tue Leghe</h1>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($leghe as $row) : ?>
      <tr>
        <td><?php echo ($row["nome"]); ?></td>
        <td>
          <form action="../API/enter.php" method="post">
            <input type="hidden" name="id_lega" value="<?php echo ($row["id"]) ?>" />
            <button type="submit" class="btn btn-danger">Entra</button>
          </form>
        </td>
        <td>
          <form action="../API/exit_lega.php" method="post">
            <input type="hidden" name="id_lega" value="<?php echo ($row["id"]) ?>" />
            <button type="submit" class="btn btn-danger"><img src="../IMAGES/exit_icona.png" width="30" /></button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>



<div class="container">
  <div class="row justify-content-center">
  <div class="col-4">
  <form action="../API/entryLega.php" method="post">
      <input type="text" name="nome_lega" class="form-control form-control-sm" />
      <button class="btn btn-danger" type="submit">UNISCITI AD UNA LEGA GIA' ESISTENTE</button>
    </form>
  </div>
  <div class="col-4">

  </div>
  <div class="col-4">
    <form action="../API/addLega.php" method="post">
      <input type="text" name="nome_lega" class="form-control form-control-sm" />
      <button class="btn btn-danger" type="submit">CREA UNA NUOVA LEGA</button>
    </form>
  </div>
    </div>


</div>