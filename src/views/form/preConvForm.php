<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include '../component/head.php'; ?>
    <title>Formulaire Pré-convention</title>
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-4">Formulaire de Pré-convention</h2>
        <form action="../../controller/preconvController/preConvInsert.php" method="POST">

            <hr>
            <h4>Informations générales</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="student_class" class="form-label">Classe de l'étudiant</label>
                    <input type="text" class="form-control" id="student_class" name="student_class" required>
                </div>
                <div class="col-md-6">
                    <label for="program_referent" class="form-label">Référent pédagogique</label>
                    <input type="text" class="form-control" id="program_referent" name="program_referent" required>
                </div>
            </div>

            <hr>
            <h4>Étudiant</h4>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="student_civility" class="form-label">Civilité</label>
                    <select class="form-select" id="student_civility" name="student_civility" required>
                        <option value="M">M</option>
                        <option value="Mme">Mme</option>
                        <option value="Mlle">Mlle</option>
                    </select>
                </div>
                <div class="col-md-8">
                    <label for="student_name" class="form-label">Nom de l'étudiant</label>
                    <input type="text" class="form-control" id="student_name" name="student_name" required>
                </div>
            </div>

            <hr>
            <h4>Entreprise</h4>
            <div class="mb-3">
                <label for="company_name" class="form-label">Nom de l'entreprise</label>
                <input type="text" class="form-control" id="company_name" name="company_name" required>
            </div>
            <div class="mb-3">
                <label for="company_address" class="form-label">Adresse de l'entreprise</label>
                <textarea class="form-control" id="company_address" name="company_address" required></textarea>
            </div>
            <div class="mb-3">
                <label for="internship_location" class="form-label">Lieu de stage</label>
                <textarea class="form-control" id="internship_location" name="internship_location" required></textarea>
            </div>

            <hr>
            <h4>Encadrement</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>Directeur</h5>
                    <label for="director_civility" class="form-label">Civilité</label>
                    <select class="form-select" id="director_civility" name="director_civility" required>
                        <option value="M">M</option>
                        <option value="Mme">Mme</option>
                        <option value="Mlle">Mlle</option>
                    </select>
                    <label for="director_name" class="form-label mt-2">Nom</label>
                    <input type="text" class="form-control" id="director_name" name="director_name" required>
                    <label for="director_phone" class="form-label mt-2">Téléphone</label>
                    <input type="text" class="form-control" id="director_phone" name="director_phone" required>
                    <label for="director_email" class="form-label mt-2">Email</label>
                    <input type="email" class="form-control" id="director_email" name="director_email" required>
                </div>
                <div class="col-md-6">
                    <h5>Tuteur (si différent)</h5>
                    <label for="tutor_civility" class="form-label">Civilité</label>
                    <select class="form-select" id="tutor_civility" name="tutor_civility">
                        <option value="">Non applicable</option>
                        <option value="M">M</option>
                        <option value="Mme">Mme</option>
                        <option value="Mlle">Mlle</option>
                    </select>
                    <label for="tutor_name" class="form-label mt-2">Nom</label>
                    <input type="text" class="form-control" id="tutor_name" name="tutor_name">
                    <label for="tutor_phone" class="form-label mt-2">Téléphone</label>
                    <input type="text" class="form-control" id="tutor_phone" name="tutor_phone">
                    <label for="tutor_email" class="form-label mt-2">Email</label>
                    <input type="email" class="form-control" id="tutor_email" name="tutor_email">
                    <label for="tutor_function" class="form-label mt-2">Fonction</label>
                    <input type="text" class="form-control" id="tutor_function" name="tutor_function">
                </div>
            </div>

            <hr>
            <h4>Informations sur le stage</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="start_date" class="form-label">Date de début</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>
                <div class="col-md-6">
                    <label for="end_date" class="form-label">Date de fin</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="mission_description" class="form-label">Description de la mission</label>
                <textarea class="form-control" id="mission_description" name="mission_description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="working_hours" class="form-label">Horaires de travail</label>
                <textarea class="form-control" id="working_hours" name="working_hours" required></textarea>
            </div>
            <div class="mb-3">
                <label for="additional_remarks" class="form-label">Remarques supplémentaires</label>
                <textarea class="form-control" id="additional_remarks" name="additional_remarks"></textarea>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="variable_schedule" name="variable_schedule">
                <label class="form-check-label" for="variable_schedule">Horaires variables</label>
            </div>
            <button type="submit" class="btn btn-primary mb-4">Valider les Informations</button>
        </form>
    </div>
</body>

</html>