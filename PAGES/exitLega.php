
<?php

require("../COMMON/connect.php");
require("../CONTROLLER/Controller.php");

$database=new Database();

$conn=$database->connect();

$controller=new Controller($conn);

$result=$controller->Get_Nome_Lega($_SESSION["id_lega"]);

$lega=$result->fetch_assoc();


?>

<div class="container">
    <div class="row justify-content-center">
        <div class="card text-center" style="width: 18rem; margin-top:100px;">
            <img class="card-img-top" src="../IMAGES/lega.png" width="80">
            <div class="card-body">
                <h5 class="card-title"><?php echo ($lega["nome"])?></h5>
                <hr>
                <a href="../API/exit.php" class="btn btn-success">ESCI</a>
            </div>
        </div>
    </div>
</div>