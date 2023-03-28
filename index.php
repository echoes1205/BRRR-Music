<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.4/dist/css/bulma-carousel.min.css" />
  <script defer src="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.4/dist/js/bulma-carousel.min.js"></script>
  <script defer src="script.js"></script>
  <link href="estilos.css" rel="stylesheet">

  <title>BRRR Music</title>
</head>

<header>
  <nav class="navbar is-black" role="navigation" aria-label="main navigation">
    <div class="navbar-brand ">
      <a class="navbar-item" href="index.php">
        <img src="logobrrr.png" width="35px" height="140px">
        <p class="tituloB"> BRRR Music</p>
      </a>
    <?php if(!empty($user)): ?>
      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item" href="nosotros.php">
          Nosotros
        </a>

        <a class="navbar-item" href="contacto.php">
          Contacto
        </a>
		
        <a class="navbar-item" href="inicio.html">
          Inicio
        </a>
		
      </div>

      <div class="navbar-end">
        <div class="navbar-item">
          <div class="buttons">
            <a class="button is-dark" href="logout.php">
              Cerrar Sesion

          </div>
        </div>
      </div>
    </div>
  </nav>
</header>
    <?php else: ?>
      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item" href="nosotros.php">
          Nosotros
        </a>

        <a class="navbar-item" href="contacto.php">
          Contacto
        </a>
      </div>

      <div class="navbar-end">
        <div class="navbar-item">
          <div class="buttons">
            <a class="button is-dark" href="signup.php">
              Registro
            </a>
            <a class="button is-black" href="login.php">
              Inicio de sesión
            </a>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>

<body>

  <div class='column is-13'>
    <section class="hero is-danger  is-bold">
      <div class="hero-body">
        <div class="container">
          <h1 class="title">
            Escucha tu música favorita
          </h1>
          <h2 class="subtitle">
            Regístrate hoy a nuestra plataforma.
          </h2>
        </div>
      </div>
    </section>
  </div>

  <section class="section">
    <div class="container is-clipped">
      <div id="slider">
        <div class="card">
          <div class="card-image">
            <figure class="image is-16by9 is-covered">
              <img
                src="https://www.lahiguera.net/musicalia/artistas/anuel_aa/disco/12467/anuel_aa_las_leyendas_nunca_mueren_2-portada.jpg"
                alt="anuel_aa_las_leyendas_nunca_mueren_2-portada" />
            </figure>
          </div>
          <div class="card-content">
            <div class="item__title">
              Anuel AA
            </div>
            <div class="item__description">

            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-image">
            <figure class="image is-16by9 is-covered">
              <img src="https://lastfm.freetls.fastly.net/i/u/500x500/6dc889a54fec69a7c86e34c1f1bb18bb.jpg"
                alt="kaneko-ayano" />
            </figure>
          </div>
          <div class="card-content">
            <div class="item__title">
              Ryusenkei
            </div>
            <div class="item__description">

            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-image">
            <figure class="image is-16by9 is-covered">
              <img src="https://m.media-amazon.com/images/I/71VQFsqlPJL._AC_SL1425_.jpg" alt="" />
            </figure>
          </div>
          <div class="card-content">
            <div class="item__title">
              Dua Lipa
            </div>
            <div class="item__description">

            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-image">
            <figure class="image is-16by9 is-covered">
              <img src="https://e.snmc.io/i/1200/s/dbcd57678b38ba4cfbc273c726632012/10143111" alt="" />
            </figure>
          </div>
          <div class="card-content">
            <div class="item__title">
              New Jeans
            </div>
            <div class="item__description">

            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-image">
            <figure class="image is-16by9 is-covered">
              <img src="https://m.media-amazon.com/images/I/510AxfQQZSL._UF1000,1000_QL80_.jpg" alt="" />
            </figure>
          </div>
          <div class="card-content">
            <div class="item__title">
              Kaneko Ayano
            </div>
            <div class="item__description">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="content has-text-centered">
      <p>
        <strong>BRRR Music.</strong> Todos los derechos reservados. ©
      </p>
    </div>
  </footer>
      <?php endif; ?>
</body>
</html>