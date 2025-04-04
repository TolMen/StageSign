<?php
$current_page = basename($_SERVER['PHP_SELF']); // Récupère uniquement le nom du fichier actuel
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom: 1px solid black;">
    <div class="container-fluid">
    <div>
    <img src="../../../assets/img/logo_la_salle.png" alt="Logo" style="color:blue;  width:50px; margin-right:14px">
    </div>
    <strong><span class="navbar-brand">StageSign</span></strong>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == '../../views/page/home.php') ? 'active text-primary' : ''; ?>" href="../../views/page/home.php">Accueil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="../../views/form/loginForm.php">Connexion</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="">Inscription</a>
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