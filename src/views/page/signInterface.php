<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signature de la Convention</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.umd.min.js"></script>

</head>

<body>
    <!-- Inclusion de la barre de navigation -->
    <?php include '../component/navbar.php' ?>
    <div class="container mt-3" style="display: flex; align-items:center; flex-direction:column">
        <h2 class="text-center">Signature de la Convention de Stage</h2>
        <div class="card mt-4 p-4  text-center" style="width: 50%;">
            <p><strong>Document :</strong> Convention_de_stage.pdf</p>
            <p><strong>Statut :</strong> <span id="signature-status" class="text-danger">Non signé</span></p>
            <div class="print">
                <div class="">
                    <h4>Veuillez dessiner votre signature</h4>
                    <canvas id="signature-canvas" style="border: 1px solid #000;border-radius:5px; width: 80%; height: 200px;"></canvas>
                </div>

                <div class="mt-3">
                    <button id="clear-button" class="btn btn-warning">Effacer</button>
                    <button id="save-button" class="btn  btn-primary">Sauvegarder la signature</button>
                </div>

                <!-- Formulaire pour soumettre la signature -->
                <form id="signature-form" action="save_signature.php" method="POST">
                    <input type="hidden" name="signature" id="signature-input">
                    <button type="submit" class="btn btn-success mt-3">Soumettre la signature</button>
                </form>
            </div>
        </div>



    </div>

    <script>
        const canvas = document.getElementById("signature-canvas");
        const signaturePad = new SignaturePad(canvas);

        // Bouton pour effacer la signature
        document.getElementById("clear-button").addEventListener("click", function() {
            signaturePad.clear();
            document.getElementById("signature-status").innerText = "Non signé";
            document.getElementById("signature-status").classList.remove("text-success");
            document.getElementById("signature-status").classList.add("text-danger");
        });

        // Bouton pour sauvegarder la signature
        document.getElementById("save-button").addEventListener("click", function() {
            if (signaturePad.isEmpty()) {
                alert("Veuillez dessiner votre signature !");
            } else {
                const dataUrl = signaturePad.toDataURL(); // Capture de la signature sous forme de data URL
                document.getElementById("signature-input").value = dataUrl; // Ajoute la signature au champ caché du formulaire
                document.getElementById("signature-status").innerText = "Signé";
                document.getElementById("signature-status").classList.remove("text-danger");
                document.getElementById("signature-status").classList.add("text-success");
            }
        });
    </script>

</body>

</html>