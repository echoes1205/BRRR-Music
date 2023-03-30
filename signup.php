<?php

require 'database.php';

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        $message = 'Successfully created new user';
    } else {
        $message = 'Sorry there must have been an issue creating your account';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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

        


        <!-- The JS SDK Login Button -->

        <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
        </fb:login-button>

        <div id="status">
        </div>

        <!-- Load the JS SDK asynchronously -->
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>



    </nav>
</header>

<body>
    <h1 class="tituloPag"> Registro</h1>
    <form class="hero is-fullheight" action="signup.php" method="POST">
        <div class="hero is-fullheight">
            <div class="hero-body is-justify-content-center is-align-items-center">
                <div class="columns is-flex is-flex-direction-column box">
                    <div class="column pb-2">
                        <form action="signup.php" method="POST" for="email"> </form>
                        <input name="email" class="input is-primary" type="text" placeholder="Correo">
                    </div>

                    <div class="column pb-2">
                        <form action="signup.php" method="POST" for="Name"> </form>
                        <input name="password" class="input is-primary" type="password" placeholder="Contraseña">
                    </div>

                    <div class="column">
                        <form action="signup.php" method="POST" for="Name"> </form>
                        <input name="confirm_password" class="input is-primary" type="password"
                            placeholder="Confirmar contraseña">
                        <a href="recuperarContra.html" class="is-size-7" style="color: black;"> ¿No recuerdas tu
                            contraseña?</a>
                    </div>

                    <div class="column">
                        <a href="login.php"><input type="submit" value="Registrar"
                                class="button is-primary is-fullwidth is-danger"> </a>
                    </div>
                    <div class="has-text-centered">
                        <p class="is-size-7"> ¿Ya tienes una cuenta? <a href="login.php" class="has-text-primary">Inicia
                                sesión. </a>
                        </p>
                    </div>


                    <script>
                        window.fbAsyncInit = function () {
                            FB.init({
                                appId: '250447637549123',
                                cookie: true,
                                xfbml: true,
                                version: 'v16.0'
                            });

                            FB.AppEvents.logPageView();

                        };

                        (function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) { return; }
                            js = d.createElement(s); js.id = id;
                            js.src = "https://connect.facebook.net/en_US/sdk.js";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));

                        function onLogin() {
                            if (response.authResponse) {
                                FB.api('/me?fields=email,name,picture', (response) => {
                                    console.log(response)
                                    window.location.href = "http://localhost/brrr/BRRR-Music-main/inicio.html";

                                })
                            }
                        }
                    </script>


                    <button action="login.php" onclick="onLogin();"> Iniciar con facebook </button>

                    



                </div>
            </div>
    </form>
</body>

</html>