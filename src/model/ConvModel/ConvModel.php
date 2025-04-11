<?php

// Inclusion de fichier nécessaire
require_once '../../controller/bddController/connectBDD.php';


// Classe pour gérer les opérations de connexion
class ConvModel {

    public static function getConvByEtat($etat="attente" || "signe" || "archive") {
        $bdd = connectBDD::getConnexion();
        $query = $bdd->prepare("SELECT COUNT(*) FROM convention WHERE etat = ?");
        $query->execute([$etat]);
        $resultat = $query->fetchColumn();
        return $resultat;
    }
}

