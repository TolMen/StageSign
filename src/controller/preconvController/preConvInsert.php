<?php

// Démarrer une session
session_name("main");
session_start();

// Inclusion du modèle
require_once '../../model/preconvModel/preConvModel.php';

// Vérifie si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupération et sécurisation des données
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $student_civility = htmlspecialchars($_POST['student_civility']);
    $student_name = htmlspecialchars($_POST['student_name']);
    $student_class = htmlspecialchars($_POST['student_class']);

    $program_referent = htmlspecialchars($_POST['program_referent']);

    $company_name = htmlspecialchars($_POST['company_name']);
    $company_address = htmlspecialchars($_POST['company_address']);
    $internship_location = htmlspecialchars($_POST['internship_location']);

    $director_civility = htmlspecialchars($_POST['director_civility']);
    $director_name = htmlspecialchars($_POST['director_name']);
    $director_phone = htmlspecialchars($_POST['director_phone']);
    $director_email = htmlspecialchars($_POST['director_email']);

    $tutor_civility = htmlspecialchars($_POST['tutor_civility']) ?? '';
    $tutor_name = htmlspecialchars($_POST['tutor_name']) ?? '';
    $tutor_phone = htmlspecialchars($_POST['tutor_phone']) ?? '';
    $tutor_email = htmlspecialchars($_POST['tutor_email']) ?? '';
    $tutor_function = htmlspecialchars($_POST['tutor_function']) ?? '';

    $mission_description = htmlspecialchars($_POST['mission_description']);
    $working_hours = htmlspecialchars($_POST['working_hours']);
    $additional_remarks = htmlspecialchars($_POST['additional_remarks']) ?? '';

    $variable_schedule = isset($_POST['variable_schedule']) ? 1 : 0;

    // Connexion à la BDD
    $connectBDD = new connectBDD;
    $bdd = $connectBDD->getConnexion();

    // Instance du modèle
    $preConvModel = new PreConvModel();
    $isInserted = $preConvModel->insertPreConv($bdd, $start_date, $end_date, $student_civility, $student_name, $student_class, $program_referent, $company_name, $company_address, $internship_location, $director_civility, $director_name, $director_phone, $director_email, $tutor_civility, $tutor_name, $tutor_phone, $tutor_email, $tutor_function, $mission_description, $working_hours, $additional_remarks, $variable_schedule);

    // Message de succès ou d'échec
    if ($isInserted) {
        $_SESSION['message'] = ['type' => 'success', 'content' => 'Votre pré-convention a été validée avec succès. Vous recevrez un mail pour signer la convention.'];
    } else {
        $_SESSION['message'] = ['type' => 'danger', 'content' => 'Une erreur est survenue lors de l\'insertion de la pré-convention.'];
    }

    // Rediriger vers la page de confirmation
    header('Location: ../../views/page/confirmationPreConv.php');
    exit;
}
