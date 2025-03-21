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
                <?php 
                if($current_page == 'loginForm.php') { ?>
                    <li class="nav-item">
                        <a class="nav-link" <?php echo ($current_page == 'home.php') ? 'active text-primary' : ''; ?> href="../page/home.php">Accueil</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" <?php echo ($current_page == 'home.php') ? 'active text-primary' : ''; ?> href="home.php">Accueil</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="">FAQ</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" <?php echo ($current_page == 'loginForm.php') ? 'active text-primary' : ''; ?> href="../form/loginForm.php">Connexion</a>
                </li>
                <?php if (!empty($_SESSION['id'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="../../controller/userController/userStop.php" title="Déconnexion">Déconnexion</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>