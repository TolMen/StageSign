<?php
session_name("main");
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Inclusion of meta tags -->
    <?php include '../component/head.php'; ?>

    <!-- CSS -->
    <link rel="stylesheet" href="../../../assets/css/styleAccount/loginFormStyle.css" />
    <title>Connexion</title>
</head>

<body>
    <!-- Including the navigation bar -->
    <?php include '../component/navbar.php' ?>

    <div class="main-container">
        <!-- Form box -->
        <div class="box">
            <span class="borderLine"></span>
            <!-- Form -->
            <form method="POST" action="../../controller/userController/userAuth.php">
                <h2>Connexion</h2>
                <!-- Input fields -->
                <div class="inputBox inputBoxOther">
                    <input type="text" name="pseudo" pattern="[a-z]+" maxlength="26" title="Votre pseudo = Première lettre de votre prénom + votre nom." autocomplete="off" required>
                    <span>Pseudo</span>
                    <i></i>
                </div>
                <div class="inputBox inputBoxOther">
                    <input type="password" name="password" pattern="[A-Za-zÀ-ÿ0-9.]+" maxlength="15" title="Le mot de passe doit contenir des lettres, des chiffres et uniquement le symboles POINT" autocomplete="off" required>
                    <span>Mot de passe</span>
                    <i></i>
                </div>
                <!-- End of Input fields -->
                <div class="links">
                    <a href="#">Password oublié</a>
                </div>
                <input type="submit" name="connexion" value="Se connecter">
            </form>
            <!-- End of Form -->
        </div>
        <!-- End of Form box -->
    </div>

    <!-- Footer inclusion -->
    <?php include '../component/footer.php' ?>

    <!-- Links to JavaScript scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>