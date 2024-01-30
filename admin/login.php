<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

// Inclusie van databaseverbinding
require_once "../connection.php";

// Initialisatie van variabelen
$email = $password = "";
$email_err = $password_err = "";

// Verwerking van het formulier bij indienen
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valideren van ingevoerde gegevens
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // SQL-query voor het ophalen van gebruikersgegevens
    $sql = "SELECT UserID, Voornaam, Achternaam, Wachtwoord, Rol FROM gebruiker WHERE Email = ?";
    
    // Voorbereiden en uitvoeren van de query
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $param_email);
        $param_email = $email;
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            
            // Controleren of het e-mailadres bestaat
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $userID, $voornaam, $achternaam, $hashed_password, $rol);
                
                if (mysqli_stmt_fetch($stmt)) {
                    // Controleer of het ingevoerde wachtwoord overeenkomt met de opgeslagen hash
                    if (hash('sha512', $password) === $hashed_password) {
                        // Controleer of de rol gelijk is aan "1"
                        if ($rol == 1) {
                            // Sessie starten en gebruikersgegevens opslaan
                            $_SESSION["loggedin"] = true;
                            $_SESSION["userID"] = $userID;
                            $_SESSION["email"] = $email;
                            $_SESSION["voornaam"] = $voornaam;
                            $_SESSION["achternaam"] = $achternaam;

                            // Doorsturen naar welkomstpagina
                            header("location: index.php");
                            exit;
                        } else {
                            echo "Toegang geweigerd. ";
                        }
                    } else {
                        echo "Ongeldige combinatie van e-mailadres en wachtwoord.";
                    }
                }
            } else {
                $email_err = "Geen account gevonden met dit e-mailadres.";
            }
        } else {
            echo "Er is iets misgegaan bij de uitvoering van de query. Probeer het later opnieuw.";
        }
        
        // Sluiten van de voorbereide verklaring
        mysqli_stmt_close($stmt);
    }
    
    // Sluiten van de databaseverbinding
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" />

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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2>Inloggen</h2>
            <label for="email"></label>
            <input type="text" id="email" name="email" placeholder="E-mailadres" required>
            <span><?php echo $email_err; ?></span>

            <input type="password" name="password" placeholder="Wachtwoord">
            <span><?php echo $password_err; ?></span>

             <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>