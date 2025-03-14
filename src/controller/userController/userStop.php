<?php

// Reprend une session existante
session_name("main");
session_start();

// Inclusion du fichier nécessaire
require_once '../BDDController/connectBDD.php';

// Réinitialise les variables, puis détruit la session
$_SESSION = array();
session_destroy();

// Redirection vers la page de connexion
header('Location: ../../views/form/loginForm.php');
throw new Exception("Redirection vers la page de connexion");
