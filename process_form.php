<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST["naam"];
    $email = $_POST["email"];
    $onderwerp = $_POST["onderwerp"];
    $tekst = $_POST["tekst"];

    // Hier kun je verdere verwerking toevoegen, zoals het verzenden van een e-mail

    // Voorbeeld: E-mail verzenden
    $ontvanger_email = "mitchellkirschall@gmail.com";
    $onderwerp_email = "Nieuw contactformulier: " . $onderwerp;
    $bericht_email = "Naam: $naam\n";
    $bericht_email .= "E-mail: $email\n";
    $bericht_email .= "Onderwerp: $onderwerp\n\n";
    $bericht_email .= "Bericht:\n$tekst";

    mail($ontvanger_email, $onderwerp_email, $bericht_email);

    // Stuur de gebruiker door naar een bedankpagina of toon een bedankbericht
    header("Location: contact.php");
    exit();
}
?>
