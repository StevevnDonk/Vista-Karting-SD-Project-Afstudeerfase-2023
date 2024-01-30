<?php
session_start();

// Vernietig alle sessievariabelen
$_SESSION = array();

// Vernietig de sessie zelf
session_destroy();

// Stuur de gebruiker naar de loginpagina
header("location: login.php");
exit;
?>
