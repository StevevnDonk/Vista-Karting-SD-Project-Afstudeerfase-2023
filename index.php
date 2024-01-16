<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Inschrijfformulier</title>
</head>

<body>
    <!-- Het inschrijfformulier -->
    <form method="post" action="registration.php" id="inschrijven" class="inschrijf-formulier">
        <div class="inschrijven">
            <h2 class="inschrijven-title">Inschrijven</h2>
            <p class="inschrijven-text">Voor het inschrijven, kunt u hieronder de informatie invullen.</p>
        </div>

        <!-- Invoervelden voor voornaam en tussenvoegsel -->
        <div class="row-inschrijven">
            <div class="input-container">
                <div class="voornaam">
                    <input size="40" aria-required="true" aria-invalid="false" placeholder="Voornaam" value=""
                        type="text" name="voornaam">
                </div>
            </div>
            <div class="input-container">
                <div class="tussenvoegsel">
                    <input size="40" placeholder="Tussenvoegsel (optioneel)" value="" type="text" name="tussenvoegsel">
                </div>
            </div>
        </div>

        <!-- Invoervelden voor achternaam en e-mail -->
        <div class="row-inschrijven">
            <div class="input-container">
                <div class="achternaam">
                    <input size="40" aria-required="true" aria-invalid="false" placeholder="Achternaam" value=""
                        type="text" name="achternaam">
                </div>
            </div>
            <div class="input-container">
                <div class="email">
                    <input size="40" aria-required="true" aria-invalid="false" placeholder="E-mail" value=""
                        type="email" name="email">
                </div>
            </div>
        </div>
        <!-- Privacybeleid checkbox -->
        <div class="privacy-policy">
            <label for="privacy-policy">
                <input type="checkbox" id="privacy-policy" name="privacy-policy" required>
                Ik heb het <a class="privacy" href="https://www.iubenda.com/privacy-policy/50445472"
                    target="_blank">privacybeleid</a> gelezen en ga ermee akkoord.
            </label>
        </div>

        <!-- Verzendknop -->
        <div class="submit">
            <input class="inschrijven-btn" type="submit" value="SCHRIJF JE NU IN" />
        </div>
        </div>
    </form>
</body>

</html>