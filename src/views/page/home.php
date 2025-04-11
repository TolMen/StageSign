<?php 

session_name("main");
session_start();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include '../component/head.php'; ?>
    <link rel="stylesheet" href="../../../assets/css/homeStyle.css" />

    <title>StageSign </title>
</head>

<body>
    <!-- Inclusion de la barre de navigation -->
    <?php include '../component/navbar.php' ?>

    <section id="presentation_section">
        <div class="container presentation_content">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h1>Simplifiez la gestion de vos conventions de stage</h1>
                </div>
            </div>
            <p class="lead text-center">Une solution collaborative pour l'entreprise, l'école et les étudiants</p>
            <a href="../../views/form/loginForm.php" class="explore-btn">Commencer</a>
            <a href="../../views/page/signInterface.php" class="explore-btn">Signer</a>
            </div>
    </section>

    <!-- Inclusion du pied de page -->
    <?php include '../component/footer.php' ?>

    <!-- Liens vers les scripts JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>