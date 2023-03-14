


<?php

require("../COMMON/connect.php");
require("../CONTROLLER/Controller.php");

$database=new Database();

$conn=$database->connect();

$controller=new Controller($conn);

$result=$controller->Get_giocatore($_SESSION["id"]);

$giocatore=$result->fetch_assoc();


?>

<div class="container">
    <div class="row justify-content-center">
        <div class="card text-center" style="width: 18rem; margin-top:100px;">
            <img class="card-img-top" src="../IMAGES/User.png" width="80">
            <div class="card-body">
                <h5 class="card-title"><?php echo ($giocatore["nome"])?></h5>
                <h5 class="card-title"><?php echo ($giocatore["email"])?></h5>
                <hr>
                <a href="../API/logout.php" class="btn btn-danger">ESCI</a>
            </div>
        </div>
    </div>
</div>
