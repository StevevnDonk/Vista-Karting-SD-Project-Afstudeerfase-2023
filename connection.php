<?php
// Databasegegevens
$servername = "srv042105.webreus.net";
$username = "c49048vistakart";
$password = "!@KaasKop";
$database = "c49048vistakartingdb";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $database);

// Controleer de verbinding
if ($conn->connect_error) {
    die("Fout bij het maken van een verbinding: " . $conn->connect_error);
}
?>