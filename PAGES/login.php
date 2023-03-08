



<?php 
/*
require("../API/getID.php");
session_start();

$SESSION["id"]=$id;

print_r($SESSION["id"]);
echo($SESSION["id"]);
*/
?>


<form method="post" action="../API/getID.php">

    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card text-black" id="card" style="border-radius: 1rem;">
                <div class="card-body text-center">

                    <div class="mb-md-5 mt-md-4 pb-5">
                        <div class="fadeIn first logo">
                            <img id="icona" src="../IMAGES/icona-pallone.png" />
                        </div>

                        <div class="form-outline form-white mb-4">
                            <label class="form-label" type="text">Email</label>
                            <input  id="email" name="email" class="form-control form-control-lg" />

                        </div>

                        <div class="form-outline form-white mb-4">
                            <label class="form-label"  type="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg" />
                            <input type="checkbox" onclick="myFunction()">Show Password

                        </div>

                        <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

                        <button class="btn btn-outline-light btn-lg px-5" id="login" type="submit">Login</button>


                    </div>

                </div>
            </div>
        </div>
    </div>
</form>