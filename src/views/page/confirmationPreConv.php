<?php
// Démarrer une session
session_name("main");
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include '../component/head.php'; ?>

    <title>Confirmation de Pré-convention</title>
</head>

<body class="d-flex justify-content-center align-items-center" style="height: 100vh;">

    <div class="container text-center">
        <?php
        // Afficher le message si présent
        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            echo '<div class="alert alert-' . $message['type'] . '" role="alert">';
            echo $message['content'];
            echo '</div>';

            // Supprimer le message après l'affichage
            unset($_SESSION['message']);
        }
        ?>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0XPxPg6fyJLmBo4glzrd8iQxK93PQY7FhHfFjC8fqQFbcKje" crossorigin="anonymous"></script>
</body>

</html>