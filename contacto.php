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
    <title>Contacto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.4/dist/js/bulma-carousel.min.js"></script>
    <script defer src="script.js"></script>
    <link rel="stylesheet" href="estilos.css">

</head>

<header>
    <nav class="navbar is-black" role="navigation" aria-label="main navigation">
        <div class="navbar-brand ">
            <a class="navbar-item" href="index.php">
                <img src="logobrrr.png" width="35px" height="140px">
                <p class="tituloB"> BRRR Music</p>
            </a>
            <?php if (!empty($user)): ?>
                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
                    data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="inicio.html">
                        Reproductor
                    </a>
                    <a class="navbar-item" href="nosotros.php">
                        Nosotros
                    </a>

                    <a class="navbar-item" href="contacto.php">
                        Contacto
                    </a>
                    <a class="navbar-item" href="noticias.html">
                        Noticias
                    </a>

                </div>

                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <a class="button is-dark" href="logout.php">
                                Cerrar sesión
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <body>
        <h1 class="tituloPag">Contacto</h1>

        <p class="nosotrosTexto"> Siguenos en nuestras redes sociales para noticias y más informacion acerca de BRRR Music. 
            <br> Dentro de nuestras redes, encontrarás nuevos lanzamientos, dinámicas, historias, y todo acerca de tu música favorita y de nuestro sitio web.   
        </p>
        <div class="redes" style="
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            padding-top:30px;
        ">
            <a href=" facebook.com">
                <img src="https://cdn-icons-png.flaticon.com/512/733/733549.png" width="70px" height="280px"> </a>
            <a href="instagram.com">
                <img src="https://cdn-icons-png.flaticon.com/128/1384/1384063.png" width="70px" height="280px"> </a>
            <a href="twitter.com">
                <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" width="70px" height="280px"> </a>
        </div>

        <footer class="footerM" style="background-color: rgb(28, 30, 31);
  font-size: 20px;
  display: flex;
  padding-bottom: 40px;
  padding-top: 40px;
  margin-top: 210px;
  align-content: flex-end;
  justify-content: center;
  align-items: center; 
">
    <div class="content has-text-centered">
      <p>
        <strong style="color:white; ">BRRR Music.</strong> Todos los derechos reservados. © 
    </div>
  </footer>

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


        <h1 class="tituloPag">Contacto</h1>

        <p class="nosotrosTexto"> Siguenos en nuestras redes sociales para noticias y más informacion acerca de BRRR
            Music.
            <br> Dentro de nuestras redes, encontrarás nuevos lanzamientos, dinámicas, historias, y todo acerca de tu música favorita y de nuestro sitio web.   

        </p>
        <div class="redes" style="
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            padding-top:30px;
        ">
            <a href="facebook.com">
                <img src="https://cdn-icons-png.flaticon.com/512/733/733549.png" width="70px" height="280px"> </a>
            <a href="instagram.com">
                <img src="https://cdn-icons-png.flaticon.com/128/1384/1384063.png" width="70px" height="280px"> </a>
            <a href="twitter.com">
                <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" width="70px" height="280px"> </a>
        </div>

        <footer class="footerM" style="background-color: rgb(28, 30, 31);
  font-size: 20px;
  display: flex;
  padding-bottom: 40px;
  padding-top: 40px;
  margin-top: 210px;
  align-content: flex-end;
  justify-content: center;
  align-items: center; 
">
    <div class="content has-text-centered">
      <p>
        <strong style="color:white; ">BRRR Music.</strong> Todos los derechos reservados. © 
    </div>
  </footer>
    </body>
<?php endif; ?>
</body>

</html>