<?php

$server = 'localhost';
$username = 'root';
$password = '2003183818';
$database = 'php_login_database';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}
$cone=mysqli_connect($cons_equipo,$cons_usuario,$cons_passw,$cons_base_datos);
if(isset($cone))
{
    echo "Conexion exitosa";
}
else
{
 echo "error en la conexion";
}
?>
