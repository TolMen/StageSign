<?php

class SecurityAccount
{

    public function checkSecurityAccount($pseudo, $password)
    {

        $errorsSecurAccount = [];

        if (strlen($pseudo) > 26) {
            $errorsSecurAccount[] = 'Le pseudo ne doit pas dépasser 26 caractères.';
        }
        if (strlen($password) > 15) {
            $errorsSecurAccount[] = 'Le mot de passe ne doit pas dépasser 15 caractères.';
        }

        if (!preg_match('/^[a-z]+$/', $pseudo)) {
            $errorsSecurAccount[] = 'Votre pseudo = Première lettre de votre prénom + votre nom.';
        }
        if (!preg_match('/^[A-Za-zÀ-ÿ0-9.]+$/', $password)) {
            $errorsSecurAccount[] = 'Le mot de passe doit contenir des lettres, des chiffres et uniquement le symboles POINT.';
        }

        return $errorsSecurAccount;
    }
}
