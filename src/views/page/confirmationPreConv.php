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

<body class="d-flex justify-content-center align-items-center bg-light" style="height: 100vh;">

    <div class="container text-center">
        <div class="card p-4 shadow-lg rounded-4" style="max-width: 600px; margin: 0 auto;">
            <?php
            // Afficher le message si présent
            if (isset($_SESSION['message'])) {
                $message = $_SESSION['message'];
                $icon = $message['type'] === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
                echo '<div class="alert alert-' . $message['type'] . ' d-flex align-items-center alert-dismissible fade show" role="alert">';
                echo '<i class="fas ' . $icon . ' me-2"></i>';
                echo '<div>' . $message['content'] . '</div>';
                echo '</div>';

                // Supprimer le message après l'affichage
                unset($_SESSION['message']);
            }
            ?>
            <div role="status" aria-live="polite">
                <p class="mt-3 text-muted">
                    Vous pouvez fermer cette fenétre en toute sécurité.
                </p>
            </div>
        </div>
    </div>

</body>

</html>