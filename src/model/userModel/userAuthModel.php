<?php

// Inclusion de fichier nécessaire
require_once '../../controller/bddController/connectBDD.php';

// Classe pour gérer les opérations de connexion
class UserAuthModel {

    // Cette fonction récupère le pseudo des utilisateurs
    public function getAuthUser($pseudo, $password) {
        $bdd = connectBDD::getConnexion();
        $recupUser = $bdd->prepare('SELECT * FROM user WHERE pseudo = ? AND password = SHA2(?, 256)');
        $recupUser->execute([$pseudo, $password]);
        return $recupUser->fetch(PDO::FETCH_ASSOC);
    }
}
