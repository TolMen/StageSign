<?php

// Démarre une session
session_name("main");
session_start();

// Inclusion de fichier nécessaire 
require_once 'src/controller/bddController/connectBDD.php';

// Vérifie les paramètres après ? dans l'URL, si vide redirection vers la page d'accueil
if (empty($_SERVER['QUERY_STRING'])) {
    header("Location: src/views/page/home.php"); # .htaccess
    throw new Exception("Redirection vers la page d'accueil.");
}
