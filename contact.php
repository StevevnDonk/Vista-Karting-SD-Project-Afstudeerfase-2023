<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />

    <title>VISTA-Karting</title>
</head>
<body class="contact-page">
    <div class="navbar">
    <nav class="nav">
        <div class="logo"><a href="admin/login.php" ><img src="img/logo-vista-college.png" alt=""></a></div>

        <div class="hamburger">
          <span class="line"></span>
          <span class="line"></span>
          <span class="line"></span>
        </div>

        <div class="nav__link hide">
            <a href="index.php">Home</a>
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
        <div class="mario-img">
            <img src="img/vista-karting-homepage-mario.png" alt="">
        </div>
        <div class="mario-img-mobile">
            <img src="img/vista-karting-homepage-mario-mobile.png" alt="">
        </div>
    </div>

    <!---------------------------------    CONTACT   ---------------------------------------->

    <div class="contactform">
        <form action="process_form.php" method="post">
            <h2>Contact</h2>
            <label for="naam"></label>
            <input type="text" id="naam" name="naam" placeholder="Naam" required>

            <label for="email"></label>
            <input type="email" id="email" name="email" placeholder="E-mail" required>

            <label for="onderwerp"></label>
            <input type="text" id="onderwerp" name="onderwerp" placeholder="Onderwerp" required>

            <label for="tekst"></label>
            <textarea id="tekst" name="tekst" rows="4" placeholder="Tekst"required></textarea>

            <button type="submit">Verstuur</button>
        </form>
    </div>




</body>
</html>