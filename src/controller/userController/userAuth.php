<?php

// Reprend une session existante
session_name("main");
session_start();

// Inclusion des fichiers nécessaire
include_once '../../model/userModel/userAuthModel.php';
require_once '../../model/userModel/userSecurityModel.php';

// Vérifie si le formulaire est soumis, puis si les champs sont vides
if (isset($_POST['connexion'])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {

        // Sécurisation et récupération des données
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $password = $_POST['password'];

        // Nouvelle instance de la classe de sécurité
        $securityAccount = new SecurityAccount;

        // Appel de la fonction de vérification
        $errorsSecurAccount = $securityAccount->checkSecurityAccount($pseudo, $password);

        // Si variables errors vide, on crée une instance du modèle de la classe
        if (empty($errorsSecurAccount)) {
            // Connexion à la BDD
            $connectBDD = new connectBDD;
            $bdd = $connectBDD->getConnexion();
            
            $userAuthModel = new UserAuthModel();

            // Récupère les informations nécessaires
            $dataAuthUser = $userAuthModel->getAuthUser($pseudo, $password);
            $role = $userAuthModel->getRoleUser($dataAuthUser["id"]);

            // Regarder dans chaque table où se situe l'ID de l'utilisateur et définir son rôle


            // Vérifie la présence du pseudo, puis si le MDP correspond au MDP haché dans la BDD
            if ($dataAuthUser) {

                // Stock les informations dans des variables de session
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['id'] = $dataAuthUser['id'];
                $_SESSION['role'] = $role;

                header('Location: ../../views/page/home.php');
                exit;
            } else {
                header("Location: ./../../views/form/loginForm.php?invalid=True");
            }
        } else {
            header("Location: ./../../views/form/loginForm.php?invalid=True");
        }
    }
} else {
    /*
        - Si échecs, retourne au formulaire
        - If failures, return to the form
        */
    header('Location: ../../views/form/loginForm.php');
    throw new Exception("Retourne au formulaire");
}
