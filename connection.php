<?php
// Databasegegevens
$servername = "localhost";
$username = "root";
$password = "";
$database = "vistakarting";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $database);

// Controleer de verbinding
if ($conn->connect_error) {
    die("Fout bij het maken van een verbinding: " . $conn->connect_error);
}
?>