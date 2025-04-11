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

    public function isStudent($id) {
        $bdd = connectBDD::getConnexion();
        $recupUser = $bdd->prepare('SELECT * FROM student WHERE user_id = ?');
        $recupUser->execute([$id]);
        $resultat = $recupUser->fetch();
        return !empty($resultat);
    }

    public function isTeacher($id) {
        $bdd = connectBDD::getConnexion();
        $recupUser = $bdd->prepare('SELECT * FROM teacher WHERE user_id = ?');
        $recupUser->execute([$id]);
        $resultat = $recupUser->fetch();
        return !empty($resultat);
    }

    public function isTutor($id) {
        $bdd = connectBDD::getConnexion();
        $recupUser = $bdd->prepare('SELECT * FROM tutor WHERE user_id = ?');
        $recupUser->execute([$id]);
        $resultat = $recupUser->fetch();
        return !empty($resultat);
    }

    public function isDirection($id) {
        $bdd = connectBDD::getConnexion();
        $recupUser = $bdd->prepare('SELECT * FROM direction WHERE user_id = ?');
        $recupUser->execute([$id]);
        $resultat = $recupUser->fetch();
        return !empty($resultat);
    }

    public function isAdmin($id) {
        $bdd = connectBDD::getConnexion();
        $recupUser = $bdd->prepare('SELECT * FROM administrator WHERE user_id = ?');
        $recupUser->execute([$id]);
        $resultat = $recupUser->fetch();
        return !empty($resultat);
    }

    public function getRoleUser($id) {
        if ($this->isStudent($id)) {
            return "student";
        }
        elseif ($this->isDirection($id)) {
            return "direction";
        }
        elseif ($this->isTutor($id)) {
            return "tutor";
        }
        elseif ($this->isTeacher($id)) {
            return "teacher";
        }
        elseif ($this->isAdmin($id)) {
            return "admin";
        }
        else {
            return null;
        }
    }
}
