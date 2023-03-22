<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" id="navbar-text" href="#">FantaCalciotto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if ($_SESSION["id_lega"] == null) : ?>
          <li class="nav-item">
            <a class="nav-link active" id="navbar-text" aria-current="page" href="?page=0">Leghe</a>
          </li>
        <?php endif; ?>
        <?php if (isset($_SESSION["id_lega"])) : ?>
          <li class="nav-item">
            <a class="nav-link active" id="navbar-text" href="?page=2">I tuoi calciatori</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" id="navbar-text" href="?page=1">Tutti i calciatori</a>
          </li>

        <?php endif; ?>
        <?php if ($_SESSION["creatore"] == 1) : ?>
          <li class="nav-item">
            <a class="nav-link active" id="navbar-text" href="?page=5">Assegna i calciatori ai giocatori</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" id="navbar-text" href="?page=6">Togli i calciatori ai giocatori</a>
          </li>
        <?php endif; ?>

        <?php if ($_SESSION["id_lega"]) : ?>

          <li class="nav-item">
            <a class="nav-link active" id="navbar-text" href="?page=7">Giornata</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" id="navbar-text" href="?page=9">Risultati</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" id="navbar-text" href="?page=8">Giocatori lega</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" id="navbar-text" href="?page=10">Classifica</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" id="navbar-text" href="?page=4">Esci</a>
          </li>
        <?php endif; ?>

        <li class="nav-item">
          <a class="nav-link active" id="navbar-text" href="?page=3">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>