<?php
require "../COMMON/connect.php";
require "../CONTROLLER/Controller.php";


$db=new Database();
$conn=$db->connect();

$controller=new Controller($conn);

$result=$controller->getLeghe($_SESSION["id"]);

$leghe=array();

while($row=$result->fetch_assoc()){
    array_push($leghe,$row);
}   
?>
<div class="row text-center"><h1>Le tue Leghe</h1></div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($leghe as $row):?>
    <tr>
      <td><?php echo($row["nome"]);?></td>
      <td>
        <form action="../API/exit_lega.php" method="post">
        <input type="hidden" name="id_lega" value="<?php echo ($row["id"])?>"/>
          <button type="submit" class="btn btn-danger"><img src="../IMAGES/exit_icona.png" width="30" /></button>
        </form>
      </td>
      <!--<td><h2><?php echo($row["id"]);?></h2></td>-->
    </tr>
        <?php endforeach;?>
  </tbody>
</table>