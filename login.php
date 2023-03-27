<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /php-login');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /php-login");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.4/dist/js/bulma-carousel.min.js"></script>
    <script defer src="script.js"></script>
    <link href="estilos.css" rel="stylesheet">

</head>

<header>
    <nav class="navbar is-black" role="navigation" aria-label="main navigation">
        <div class="navbar-brand ">
            <a class="navbar-item" href="index.php">
                <img src="logobrrr.png" width="35px" height="140px">
                <p class="tituloB"> BRRR Music</p>
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
                data-target="navbarBasicExample">
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
    <h1 class="tituloPag"> Inicia sesión</h1>
    <div class="hero is-fullheight">
        <div class="hero-body is-justify-content-center is-align-items-center">
            <div class="columns is-flex is-flex-direction-column box">
                <div class="column">
                    <label for="email">   </label>
                    <input class="input is-primary" name="email" type="text" placeholder="Correo">
                </div>
                
                <div class="column">
                    <label for="Name">  </label>
                    <input class="input is-primary" name="password" type="password" placeholder="Contraseña">
                    
                    <a href="recuperarContra.html" class="is-size-7 has-text-primary">¿No recuerdas tu contraseña?</a>
                </div>
                
                <div class="column">
                    <input class="button is-primary is-fullwidth is-danger" type="submit" value = "Submit">Iniciar</button>
                </div>
                <div class="has-text-centered">
                    <p class="is-size-7"> ¿No tienes una cuenta? <a href="signup.php" class="has-text-primary">Regístrate.

                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div> 

  
    

</body>

</html>