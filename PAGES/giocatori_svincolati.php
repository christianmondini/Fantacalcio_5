<?php 

require("../COMMON/connect.php");
require("../CONTROLLER/Controller.php");

$database=new Database();

$conn=$database->connect();

$controller=new Controller($conn);

$result=$controller->Get_Calciatori();

$giocatori=array();

while($row=$result->fetch_assoc()){
    array_push($giocatori,$row);
}

?>

<div class="row text-center"><h1>Tutti i giocatori</h1></div>

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
    <?php foreach($giocatori as $giocatore):?>
    <tr>
      <td><?php echo($giocatore["nome"])?></td>
      <td><?php echo($giocatore["ruolo"])?></td>
      <td><?php echo($giocatore["squadra"])?></td>
      <td><?php echo($giocatore["valore"])?> crediti</td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
