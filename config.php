<?php

session_start();

// config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID | Copiar "ID DE CLIENTE"
$google_client->setClientId('582687378828-de7och26d7m9jsdk2lm4a2ldvrlelcm5.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI | URL AUTORIZADO
$google_client->setRedirectUri('http://localhost/musicb/BRRR-Music-main/inicio.html');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');


?>