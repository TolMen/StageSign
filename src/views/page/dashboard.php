<?php

session_name("main");
session_start();

require_once '../../model/ConvModel/ConvModel.php';

$attente = ConvModel::getCountConvByEtat("attente");
$signees = ConvModel::getCountConvByEtat("signee");;
$archivees = ConvModel::getCountConvByEtat("archivee");;

connectBDD::redirectNonAdminUser();

?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <?php include '../component/head.php'; ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">
        <link rel="stylesheet" href="../../../assets/css/dashboardStyle.css" />

        <title>StageSign - Tableau de bord</title>
    </head>

    <body>
        <!-- Inclusion de la barre de navigation -->
        <?php include '../component/navbar.php' ?>

        <main>
            <div class="container">
                <section class="row gx-5 m-3 mt-5 mb-5">
                    <article class="col-4">
                        <div class="pt-2">Conventions annuelles en attente<br>
                            <h1><?php echo $attente ?></h1>
                        </div>
                    </article>
                    <article class="col-4">
                        <div class="pt-2">Conventions annuelles signées<br>
                            <h1><?php echo $signees ?></h1>
                        </div>
                    </article>
                    <article class="col-4">
                        <div class="pt-2">Conventions annuelles archivées<br>
                            <h1><?php echo $archivees ?></h1>
                        </div>
                    </article>
                </section>
            </div>

            <div class="container recherche">
                <form action="dashboard.php">
                    <input type="search" name="nom" placeholder="Rechercher par nom" />

                    <select name="year">
                        <?php
                        $currentYear = date("Y");
                        for ($year = $currentYear; $year >= 2024; $year--) {
                            echo "<option value='$year'>$year</option>";
                        } ?>
                    </select>

                    <select name="etat">
                        <option value="attente">En attente</option>
                        <option value="signee">Signée</option>
                        <option value="archivee">Archivée</option>
                    </select>

                    <input type="submit" value="Rechercher" />
                </form>

                <div class="row">
                    A venir
                </div>
            </div>
        </main>

        <!-- Inclusion du pied de page -->
        <?php include '../component/footer.php' ?>

        <!-- Liens vers les scripts JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

    </body>

</html>