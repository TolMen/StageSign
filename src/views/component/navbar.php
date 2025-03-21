<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom: 1px solid black;">
    <div class="container-fluid">
        <strong><span class="navbar-brand">StageSign</span></strong>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">FAQ</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Connexion</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="">Inscription</a>
                </li>
                <?php if (!empty($_SESSION['id'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="../../controller/userController/userStop.php" title="Déconnexion">Déconnexion</a>
                    </li>
            </ul>
        </div>
    <?php } ?>
    </div>
</nav>