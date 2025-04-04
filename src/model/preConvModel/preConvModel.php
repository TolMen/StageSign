<?php

// Inclusion de fichier nécessaire
require_once '../../controller/bddController/connectBDD.php';

// Classe pour gérer les opérations de connexion
class PreConvModel
{

    public function insertPreConv(PDO $bdd, $start_date, $end_date, $student_civility, $student_name, $student_class, $program_referent, $company_name, $company_address, $internship_location, $director_civility, $director_name, $director_phone, $director_email, $tutor_civility, $tutor_name, $tutor_phone, $tutor_email, $tutor_function, $mission_description, $working_hours, $additional_remarks, $variable_schedule)
    {
        $insertPreConv = $bdd-> prepare('INSERT INTO preconv (start_date, end_date, student_civility, student_name, student_class, program_referent, company_name, company_address, internship_location, director_civility, director_name, director_phone, director_email, tutor_civility, tutor_name, tutor_phone, tutor_email, tutor_function, mission_description, working_hours, additional_remarks, variable_schedule) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

        return $insertPreConv->execute([$start_date, $end_date, $student_civility, $student_name, $student_class, $program_referent, $company_name, $company_address, $internship_location, $director_civility, $director_name, $director_phone, $director_email, $tutor_civility, $tutor_name, $tutor_phone, $tutor_email, $tutor_function, $mission_description, $working_hours, $additional_remarks, $variable_schedule]);
    }
}

