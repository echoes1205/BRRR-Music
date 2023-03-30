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
        $message = 'Usuario creado exitosamente';
    } else {
        $message = 'Hubo un problema';
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
    </nav>
</header>

<body>
    <h1 class="tituloPag"> Registro</h1>
    <br> 
    
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