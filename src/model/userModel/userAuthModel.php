<?php

// Inclusion de fichier nécessaire
require_once './src/controller/bddController/connectBDD.php';

// Classe pour gérer les opérations de connexion
class UserAuthModel
{

    // Cette fonction récupère le pseudo des utilisateurs
    public function getAuthUser(PDO $bdd, $pseudo, $password)
    {
        $recupUser = $bdd->prepare('SELECT * FROM user WHERE pseudo = ? AND password = SHA2(?, 256)');
        $recupUser->execute([$pseudo, $password]);
        return $recupUser->fetch(PDO::FETCH_ASSOC);
    }
}
