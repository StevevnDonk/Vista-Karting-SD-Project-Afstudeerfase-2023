<?php
// Inclusie van de databaseverbinding
include "connection.php";

// Controleer de databaseverbinding
if ($conn->connect_error) {
    die("Kan geen verbinding maken met de database: " . $conn->connect_error);
}

// Verwerk het registratieformulier als het een POST-verzoek is
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ontvang gegevens van het formulier
    $voornaam = $_POST["voornaam"];
    $achternaam = $_POST["achternaam"];
    $tussenvoegsel = $_POST["tussenvoegsel"];
    $email = $_POST["email"];
    $rol = 0; // Rol toewijzen (kan aangepast worden)

    // Valideer de invoer
    if (empty($voornaam) || empty($achternaam) || empty($email)) {
        echo "Vul alle verplichte velden in.";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Ongeldig e-mailformaat. Voer een geldig e-mailadres in.";
        } else {
            // Controleer of het e-mailadres al in de database bestaat
            $email = $conn->real_escape_string($email); // Sanitize invoer
            $sql = "SELECT * FROM gebruiker WHERE email = ?";

            $stmtEmailCheck = $conn->prepare($sql);
            $stmtEmailCheck->bind_param("s", $email);
            $stmtEmailCheck->execute();
            $resultEmailCheck = $stmtEmailCheck->get_result();

            if ($resultEmailCheck->num_rows > 0) {
                echo "E-mailadres bestaat al. Gebruik een ander e-mailadres.";
            } else {
                // Wijs de gebruiker toe aan een poule
                $pouleID = rand(1, 6); // Kies een willekeurige poule
                $spelerKolommen = ["Speler1", "Speler2", "Speler3", "Speler4"];
                shuffle($spelerKolommen);

                $foundPoule = false;

                foreach ($spelerKolommen as $kolom) {
                    $checkSql = "SELECT $kolom FROM poule WHERE pouleID = ?";
                    $stmtCheck = $conn->prepare($checkSql);
                    $stmtCheck->bind_param("i", $pouleID);
                    $stmtCheck->execute();
                    $resultCheck = $stmtCheck->get_result();
                    $row = $resultCheck->fetch_assoc();

                    if ($row[$kolom] === NULL) {
                        // De kolom is beschikbaar, voeg de gebruiker toe aan de poule
                        $updateSql = "UPDATE poule SET $kolom = ? WHERE pouleID = ?";

                        $stmtUpdate = $conn->prepare($updateSql);
                        $stmtUpdate->bind_param("ii", $userID, $pouleID);

                        if ($stmtUpdate->execute()) {
                            // Voeg de gebruiker toe aan de database
                            $stmtInsertUser = $conn->prepare("INSERT INTO gebruiker (voornaam, achternaam, tussenvoegsel, email, rol) VALUES (?, ?, ?, ?, ?)");
                            $stmtInsertUser->bind_param("ssssi", $voornaam, $achternaam, $tussenvoegsel, $email, $rol);

                            if ($stmtInsertUser->execute()) {
                                $userID = $stmtInsertUser->insert_id;
                                echo "Inschrijving succesvol! UserID: $userID is toegewezen aan $kolom van pouleID: $pouleID";
                            } else {
                                echo "Fout bij inschrijving: " . $stmtInsertUser->error;
                            }

                            $stmtInsertUser->close();
                            $foundPoule = true;
                            break;
                        } else {
                            echo "Fout bij toewijzen van speler aan poule: " . $stmtUpdate->error;
                        }

                        $stmtUpdate->close();
                    }

                    $stmtCheck->close();
                }

                if (!$foundPoule) {
                    // Zoek naar beschikbare plekken in andere poules
                    $pouleCheckSql = "SELECT pouleID FROM poule WHERE Speler1 IS NULL OR Speler2 IS NULL OR Speler3 IS NULL OR Speler4 IS NULL";
                    $pouleCheckResult = $conn->query($pouleCheckSql);

                    if ($pouleCheckResult->num_rows > 0) {
                        while ($row = $pouleCheckResult->fetch_assoc()) {
                            $newPouleID = $row["pouleID"];

                            foreach ($spelerKolommen as $kolom) {
                                $checkSql = "SELECT $kolom FROM poule WHERE pouleID = ?";
                                $stmtCheck = $conn->prepare($checkSql);
                                $stmtCheck->bind_param("i", $newPouleID);
                                $stmtCheck->execute();
                                $resultCheck = $stmtCheck->get_result();
                                $rowCheck = $resultCheck->fetch_assoc();

                                if ($rowCheck[$kolom] === NULL) {
                                    // De kolom is beschikbaar, voeg de gebruiker toe aan de poule
                                    $updateSql = "UPDATE poule SET $kolom = ? WHERE pouleID = ?";

                                    $stmtUpdate = $conn->prepare($updateSql);
                                    $stmtUpdate->bind_param("ii", $userID, $newPouleID);

                                    if ($stmtUpdate->execute()) {
                                        // Voeg de gebruiker toe aan de database
                                        $stmtInsertUser = $conn->prepare("INSERT INTO gebruiker (voornaam, achternaam, tussenvoegsel, email, rol) VALUES (?, ?, ?, ?, ?)");
                                        $stmtInsertUser->bind_param("ssssi", $voornaam, $achternaam, $tussenvoegsel, $email, $rol);

                                        if ($stmtInsertUser->execute()) {
                                            $userID = $stmtInsertUser->insert_id;
                                            echo "Inschrijving succesvol! UserID: $userID is toegewezen aan $kolom van pouleID: $newPouleID";
                                        } else {
                                            echo "Fout bij inschrijving: " . $stmtInsertUser->error;
                                        }

                                        $stmtInsertUser->close();
                                        $foundPoule = true;
                                        break 2; // Breek beide lussen
                                    } else {
                                        echo "Fout bij toewijzen van speler aan poule: " . $stmtUpdate->error;
                                    }

                                    $stmtUpdate->close();
                                }

                                $stmtCheck->close();
                            }
                        }
                    }

                    if (!$foundPoule) {
                        echo "Er zijn geen beschikbare plekken meer in de poules.";
                    }
                }
            }
        }
    }
}

// Sluit de databaseverbinding
$conn->close();
?>