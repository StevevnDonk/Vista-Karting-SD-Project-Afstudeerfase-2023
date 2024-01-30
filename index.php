<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <title>VISTA-Karting</title>
</head>
<body>
    <div class="navbar">
    <nav class="nav">
        <div class="logo"><a href="admin" ><img src="img/logo-vista-college.png" alt=""></a></div>

        <div class="hamburger">
          <span class="line"></span>
          <span class="line"></span>
          <span class="line"></span>
        </div>

        <div class="nav__link hide">
            <a href="#">Home</a>
            <a href="#welkom">Informatie</a>
            <a href="#poules">Poules</a>
            <a href="contact.php">Contact</a>
            <a class="inschrijven-btn" href="#inschrijven">Schrijf je nu in!</a>
        </div>
      </nav>
      </div>
      <script src="js/navbar.js"></script>

<!---------------------------------    LANDING   ---------------------------------------->

    
    <div class="landing">
        <div class="kart-title">
            <img src="img/vista-karting-kart-title.png" alt="">
        </div>
        <div class="mario-img">
            <img src="img/vista-karting-homepage-mario.png" alt="">
        </div>
        <div class="mario-img-mobile">
            <img src="img/vista-karting-homepage-mario-mobile.png" alt="">
        </div>
    </div>

<!---------------------------------    WELKOM INTRO   ---------------------------------------->
    
    <section class="welkom" id="welkom">
        <div class="intro-tekst">
            <h2>Welkom</h2>
            <p>Welkom bij ons grootschalige VISTA-karting evenement! We zijn verheugd om je te verwelkomen in deze opwindende kartingwereld. Dit toernooi is met één doel voor ogen georganiseerd: jou een onvergetelijke race-ervaring bezorgen, gevuld met adrenalinepompende wedstrijden en een competitieve sfeer. Bereid je voor op dit epische karting evenement!</p>
        </div>
        <div class="containers">
            <div class="container-1">
                <h2>Toernooi</h2>
                <p>Ons VISTA-karting toernooi brengt karters vanuit heel Vista college samen voor intense racewedstrijden. Doe mee en laat je racevaardigheden zien, daag andere spelers uit en strijd om de titel VISTA-karting kampioen!</p>
            </div>
            <div class="container-2">
                <h2>Regels</h2>
                <p>Ons VISTA-karting toernooi heeft duidelijke regels voor eerlijke concurrentie. Deze omvatten toernooistructuur, speltijd, teamselectie en fair play. Lees de regels zorgvuldig voordat je deelneemt om ervoor te zorgen dat je goed voorbereid bent.</p>
            </div>
            <div class="container-3">
                <h2>Prijzen</h2>
                <p>Bij ons VISTA-karting toernooi wacht een beloning op de winnaar: de prachtige gouden trofee! De tweede plaats verdient de schitterende zilveren trofee, terwijl de derde plaats de bronzen trofee in ontvangst mag nemen. De vierde plek krijgt een mooie medaille.</p>
            </div>
        </div>
    </section>

<!---------------------------------    POULE INDELING   ---------------------------------------->

<style>
    .poules {
        /* display: flex; */
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .poule-table {
        /* width: 20%; */
        margin-bottom: 20px;
    }
</style>

<div class="poules" id="poules">
    <?php
    require 'connection.php';

    $pouleIDs = $conn->query("SELECT DISTINCT PouleID FROM poule ORDER BY PouleID ASC");

    if ($pouleIDs->num_rows > 0) {
        $count = 0;
        while ($pouleID = $pouleIDs->fetch_assoc()) {
            $currentPouleID = $pouleID['PouleID'];

            echo '<div class="poule-table">';
            echo '<h1>Poule ' . $currentPouleID . '</h1>';
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Naam</th>';
            echo '<th>P</th>';
            '</tr>';
            echo '</thead>';
            echo '<tbody>';

            $sql = "SELECT Speler1, Speler2, Speler3, Speler4 FROM poule WHERE PouleID = $currentPouleID";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($team = $result->fetch_assoc()) {
                    for ($i = 1; $i <= 4; $i++) {
                        echo '<tr>';
                        $spelerID = $team['Speler' . $i];
                        
                        if ($spelerID != null) {
                            // Voeg de query toe om de voornaam van de speler op te halen
                            $voornaamQuery = $conn->query("SELECT Voornaam FROM gebruiker WHERE UserID = $spelerID");
                            
                            if ($voornaamQuery->num_rows > 0) {
                                $voornaam = $voornaamQuery->fetch_assoc()['Voornaam'];
                                echo '<td>' . $spelerID . '</td>';
                                echo '<td>' . $voornaam . '</td>';
                                echo '<td>-</td>';
                            } else {
                                echo '<td>' . $spelerID . '</td>';
                                echo '<td>Onbekend</td>';
                                echo '<td>-</td>';
                            }
                        } else {
                            // Toon een middenstreep als de plek in de poule vrij is
                            echo '<td>-</td>';
                            echo '<td>-</td>';
                            echo '<td>-</td>';
                        }
                        
                        echo '</tr>';
                    }
                }
            } else {
                echo "Geen resultaten gevonden";
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';

            $count++;

            // Als de eerste drie poules zijn afgedrukt, voeg een extra div toe voor de volgende rij
            if ($count % 3 === 0) {
                echo '</div><div class="poules">';
            }
        }
        echo '</div>'; // Sluit de laatste div voor de poules
    } else {
        echo "Geen poules gevonden";
    }

    $conn->close();
    ?>
</div>



      
<!-- Het inschrijfformulier -->
<form method="post" action="registration.php" id="inschrijven" class="inschrijf-formulier">
        <div class="inschrijven">
            <!-- Titel van het inschrijfformulier -->
            <h2 class="inschrijven-title">Inschrijven</h2>
            
            <!-- Instructietekst voor het invullen van informatie -->
            <p class="inschrijven-text">Voor het inschrijven, kunt u hieronder de informatie invullen.</p>
        </div>

        <!-- Invoervelden voor voornaam en tussenvoegsel -->
        <div class="row-inschrijven">
            <div class="input-container">
                <div class="voornaam">
                    <!-- Invoerveld voor voornaam -->
                    <input size="40" aria-required="true" aria-invalid="false" placeholder="Voornaam" value=""
                        type="text" name="voornaam">
                </div>
            </div>
            <div class="input-container">
                <div class="tussenvoegsel">
                    <!-- Invoerveld voor tussenvoegsel (optioneel) -->
                    <input size="40" placeholder="Tussenvoegsel (optioneel)" value="" type="text" name="tussenvoegsel">
                </div>
            </div>
        </div>

        <!-- Invoervelden voor achternaam en e-mail -->
        <div class="row-inschrijven">
            <div class="input-container">
                <div class="achternaam">
                    <!-- Invoerveld voor achternaam -->
                    <input size="40" aria-required="true" aria-invalid="false" placeholder="Achternaam" value=""
                        type="text" name="achternaam">
                </div>
            </div>
            <div class="input-container">
                <div class="email">
                    <!-- Invoerveld voor e-mail -->
                    <input size="40" aria-required="true" aria-invalid="false" placeholder="E-mail" value=""
                        type="email" name="email">
                </div>
            </div>
        </div>

        <!-- Privacybeleid checkbox -->
        <div class="privacy-policy">
            <label for="privacy-policy">
                <!-- Checkbox voor het accepteren van het privacybeleid -->
                <input type="checkbox" id="privacy-policy" name="privacy-policy" required>
                Ik heb het <a class="privacy" href="https://www.iubenda.com/privacy-policy/50445472"
                    target="_blank">privacybeleid</a> gelezen en ga ermee akkoord.
            </label>
        </div>

        <!-- Verzendknop -->
        <div class="submit">
            <!-- Knop om het inschrijfformulier te verzenden -->
            <input class="inschrijven-btn" type="submit" value="SCHRIJF JE NU IN" />
        </div>
    </form>

    

</div>

</body>

</html>
