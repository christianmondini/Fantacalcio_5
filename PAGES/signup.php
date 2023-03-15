

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fantacalcio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

  <!--CSS-->
  <link rel="stylesheet" href="../CSS/style.css">

  <!--JS-->
  <script src="../JS/password.js"></script>
</head>

<body>
<?php

session_start();


?>


<form method="post" action="../API/signup.php">

    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card text-black" id="card" style="border-radius: 1rem;">
                <div class="card-body text-center">

                <div class="row text-center"><h1>Registrati</h1></div>

                    <div class="mb-md-5 mt-md-4 pb-5">
                        <div class="fadeIn first logo">
                            <img id="icona" src="../IMAGES/icona-pallone.png" />
                        </div>

                        <div class="form-outline form-white mb-4">
                            <label class="form-label" type="text">Nome</label>
                            <input  id="text" name="nome" class="form-control form-control-lg" />

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
                        <button class="btn btn-outline-light btn-lg px-5" id="login" type="submit">Registrati</button>
                        <br>
                        <a href="http://localhost/Fantacalcio_5/Pages">Torna al Login</a>


                    </div>

                </div>
            </div>
        </div>
    </div>
</form>

</body>

</html>