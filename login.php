<?php

session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: login.php');
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
        header("Location: inicio.html");
    } else {
        $message = 'Las credenciales son inválidas';
    }
}



include('config.php');

$login_button = '';

if (isset($_GET["code"])) {

    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
    if (!isset($token['error'])) {

        $google_client->setAccessToken($token['access_token']);

        $_SESSION['access_token'] = $token['access_token'];

        $google_service = new Google_Service_Oauth2($google_client);

        $data = $google_service->userinfo->get();

        if (!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        }

        if (!empty($data['family_name'])) {
            $_SESSION['user_last_name'] = $data['family_name'];
        }

        if (!empty($data['email'])) {
            $_SESSION['user_email_address'] = $data['email'];
        }

        if (!empty($data['gender'])) {
            $_SESSION['user_gender'] = $data['gender'];
        }

        if (!empty($data['picture'])) {
            $_SESSION['user_image'] = $data['picture'];
        }
    }
}

//Ancla para iniciar sesión
if (!isset($_SESSION['access_token'])) {
    $login_button = '<a href="' . $google_client->createAuthUrl() . '" style=" background: #dd4b39; border-radius: 5px; color: white; display: block; font-weight: bold; padding: 20px; text-align: center; text-decoration: none; width: 200px;">Iniciar con Google</a>';
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
    <br>
    <form class="hero is-fullheight" action="login.php" method="POST">
        <div class="hero is-fullheight">
            <div class="hero-body is-justify-content-center is-align-items-center">
                <div class="columns is-flex is-flex-direction-column box">
                    <div class="column">
                        <form action="login.php" method="POST" for="email"> </form>
                        <input class="input is-primary" name="email" type="text" placeholder="Correo">
                    </div>

                    <div class="column">
                        <form action="login.php" method="POST" for="Name"> </form>
                        <input class="input is-primary" name="password" type="password" placeholder="Contraseña">

                        <a href="recuperarContra.html" class="is-size-7" style="color: black;"> ¿No recuerdas tu
                            contraseña?</a>
                    </div>

                    <div class="column">
                        <input type="submit" value="Entrar" class="button is-primary is-fullwidth is-danger">
                    </div>
                    <div class="has-text-centered">
                        <p class="is-size-7"> ¿No tienes una cuenta? <a href="signup.php"
                                class="has-text-primary">Regístrate.

                            </a>
                        </p>

                    </div>

                    <br>
                    <div class="container">
                        <div>
                            <div class="col-lg-4 offset-4">
                                <div class="card">
                                    <?php
                                    if ($login_button == '') {
                                        echo '<div class="card-header">Welcome User</div><div class="card-body">';
                                        echo '<img src="' . $_SESSION["user_image"] . '" class="rounded-circle container"/>';
                                        echo '<h3><b>Name :</b> ' . $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'] . '</h3>';
                                        echo '<h3><b>Email :</b> ' . $_SESSION['user_email_address'] . '</h3>';
                                        echo '<h3><a href="logout.php">Logout</h3></div>';
                                    } else {
                                        echo '<div align="center">' . $login_button . '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>



    <footer class="footerM" style="background-color: rgb(28, 30, 31);
  font-size: 20px;
  display: flex;
  padding-bottom: 40px;
  padding-top: 40px;
  margin-top: -100px;
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



</html>