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
        <div class="logo"><a href="admin/login.php" ><img src="img/logo-vista-college.png" alt=""></a></div>

        <div class="hamburger">
          <span class="line"></span>
          <span class="line"></span>
          <span class="line"></span>
        </div>

        <div class="nav__link hide">
            <a href="#">Home</a>
            <a href="#welkom">Informatie</a>
            <a href="#">Poules</a>
            <a href="#">Contact</a>
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
            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit facilisi ad, quis gravida faucibus posuere tincidunt curabitur mus netus, primis sodales accumsan interdum morbi dapibus aliquam viverra. Fames dignissim fusce lectus ullamcorper senectus mus porttitor suspendisse nostra proin, lobortis lacinia aptent duis fermentum vehicula accumsan viverra sociis.</p>
        </div>
        <div class="containers">
            <div class="container-1">
                <h2>Toernooi</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit facilisi ad, quis gravida faucibus posuere tincidunt curabitur mus netus, primis sodales accumsan interdum morbi dapibus aliquam viverra. Fames dignissim fusce lectus ullamcorper senectus mus porttitor suspendisse nostra proin, lobortis lacinia aptent duis fermentum vehicula accumsan viverra sociis.</p>
            </div>
            <div class="container-2">
                <h2>Regels</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit facilisi ad, quis gravida faucibus posuere tincidunt curabitur mus netus, primis sodales accumsan interdum morbi dapibus aliquam viverra. Fames dignissim fusce lectus ullamcorper senectus mus porttitor suspendisse nostra proin, lobortis lacinia aptent duis fermentum vehicula accumsan viverra sociis.</p>
            </div>
            <div class="container-3">
                <h2>Prijzen</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit facilisi ad, quis gravida faucibus posuere tincidunt curabitur mus netus, primis sodales accumsan interdum morbi dapibus aliquam viverra. Fames dignissim fusce lectus ullamcorper senectus mus porttitor suspendisse nostra proin, lobortis lacinia aptent duis fermentum vehicula accumsan viverra sociis.</p>
            </div>
        </div>
    </section>

<!---------------------------------    POULE INDELING   ---------------------------------------->

    <div class="poules">
        <div class="poule-table">
          <h1>Poule 1</h1>
          <table>
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Speler</th>
                      <th>P</th>
                  </tr>
              </thead>
              <tbody>
                 <?php
                //   require 'connection.php'; // Zorg ervoor dat de verbinding correct is opgezet in 'connection.php'

                //   // Voer de SQL-query uit om teamgegevens op te halen tot en met TeamID 12
                //   $sql = "SELECT SpelerID, Naam FROM team WHERE TeamID <= 12";  // Vervang dit door je eigen functie

                //   $result = $conn->query($sql); // $conn is de databaseverbinding die in 'connection.php' is ingesteld

                //   if ($result->num_rows > 0) {
                //       while ($team = $result->fetch_assoc()) {
                //           echo '<tr>';
                //           echo '<td>' . $team['TeamID'] . '</td>';
                //           echo '<td>' . $team['Naam'] . '</td>';
                //           echo '<td>-</td>';
                //           echo '<td>-</td>';
                //           echo '<td>-</td>';
                //           echo '<td>-</td>';
                //           echo '</tr>';
                //       }
                //   } else {
                //       echo "Geen resultaten gevonden";
                //   }

                //   // Verbinding met de database sluiten
                //   $conn->close();
                  ?>
              </tbody>
          </table>
      </div>

</body>
</html>